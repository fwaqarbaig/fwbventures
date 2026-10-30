<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\User;
use App\Services\HtmlSanitizer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SecurityHardeningTest extends TestCase
{
    use RefreshDatabase;

    public function test_security_headers_are_present_on_web_responses(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-XSS-Protection', '1; mode=block');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');
    }

    public function test_bot_honeypot_silently_discards_spam_submissions(): void
    {
        $response = $this->post('/contact', [
            '_hp_website' => 'http://spam-bot-url.com',
            'name' => 'Spam Bot',
            'email' => 'bot@spammer.com',
            'subject' => 'Buy Cheap Pharma Drugs',
            'message' => 'Spam message',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Confirm NO inquiry was saved in database
        $this->assertDatabaseMissing('inquiries', [
            'email' => 'bot@spammer.com',
        ]);
        $this->assertEquals(0, Inquiry::count());
    }

    public function test_legitimate_contact_form_submission_is_sanitized_and_stored(): void
    {
        $response = $this->post('/contact', [
            '_hp_website' => '', // Clean honeypot
            'name' => '<b>Dr. Tariq</b><script>alert("xss")</script>',
            'email' => 'tariq@client.ae',
            'subject' => 'Urgent Server RAID 5 Recovery',
            'message' => '<p>Server dropped offline after power surge.</p>',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Confirm HTML tags were stripped from database
        $this->assertDatabaseHas('inquiries', [
            'name' => 'Dr. Tariqalert("xss")',
            'email' => 'tariq@client.ae',
            'subject' => 'Urgent Server RAID 5 Recovery',
        ]);
    }

    public function test_media_upload_rejects_dangerous_executable_files(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Attempt uploading PHP webshell
        $dangerousFile = UploadedFile::fake()->create('shell.php', 10, 'text/x-php');

        $response = $this->actingAs($admin)->post('/admin/media', [
            'file' => $dangerousFile,
        ]);

        $response->assertSessionHasErrors('file');
        $this->assertDatabaseCount('media', 0);
    }

    public function test_media_upload_accepts_valid_image_files(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $validFile = UploadedFile::fake()->image('cleanroom-lab.jpg', 600, 400);

        $response = $this->actingAs($admin)->post('/admin/media', [
            'file' => $validFile,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('media', [
            'name' => 'cleanroom-lab',
        ]);
    }

    public function test_csp_and_anti_information_disclosure_headers_are_present(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $this->assertTrue($response->headers->has('Content-Security-Policy'));
        $this->assertStringContainsString("default-src 'self'", (string) $response->headers->get('Content-Security-Policy'));
        $this->assertFalse($response->headers->has('X-Powered-By'));
    }

    public function test_public_registration_is_strictly_disabled(): void
    {
        // GET registration page redirects to login
        $getResponse = $this->get('/register');
        $getResponse->assertRedirect(route('login'));

        // POST registration aborts with 403 Forbidden
        $postResponse = $this->post('/register', [
            'name' => 'Attacker User',
            'email' => 'attacker@malicious.com',
            'password' => 'HackedPassword123!',
            'password_confirmation' => 'HackedPassword123!',
        ]);
        $postResponse->assertStatus(403);
    }

    public function test_admin_portal_requires_authentication(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_users_cannot_access_user_management(): void
    {
        $author = User::factory()->create([
            'role' => 'author',
            'is_active' => true,
            'two_factor_confirmed_at' => now(),
        ]);

        $response = $this->actingAs($author)->get('/admin/users');
        $response->assertStatus(403);
    }

    public function test_html_sanitizer_neutralizes_stored_xss_vectors(): void
    {
        // Script tag removal
        $input = '<p>Welcome</p><script>alert("XSS")</script>';
        $cleaned = HtmlSanitizer::clean($input);
        $this->assertStringNotContainsString('<script', $cleaned);
        $this->assertStringContainsString('<p>Welcome</p>', $cleaned);

        // Event handler removal
        $inputWithHandler = '<img src="photo.jpg" onload="alert(1)" onerror="alert(2)">';
        $cleanedHandler = HtmlSanitizer::clean($inputWithHandler);
        $this->assertStringNotContainsString('onload', $cleanedHandler);
        $this->assertStringNotContainsString('onerror', $cleanedHandler);

        // Pseudo-protocol URLs disarmed
        $inputWithJs = '<a href="javascript:alert(document.cookie)">Click here</a>';
        $cleanedJs = HtmlSanitizer::clean($inputWithJs);
        $this->assertStringNotContainsString('javascript:', $cleanedJs);
        $this->assertStringContainsString('href="#"', $cleanedJs);

        // Untrusted iframe stripped, trusted YouTube preserved
        $untrustedIframe = '<iframe src="https://evil-site.com/exploit"></iframe>';
        $this->assertEmpty(trim(HtmlSanitizer::clean($untrustedIframe)));

        $trustedIframe = '<iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"></iframe>';
        $this->assertStringContainsString('youtube.com', HtmlSanitizer::clean($trustedIframe));
    }

    public function test_svg_security_validation_detects_malicious_payloads(): void
    {
        // Valid clean SVG
        $safeSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="orange"/></svg>';
        $this->assertTrue(HtmlSanitizer::isSafeSvg($safeSvg));

        // Malicious SVG with script
        $evilScriptSvg = '<svg xmlns="http://www.w3.org/2000/svg"><script>alert(document.domain)</script></svg>';
        $this->assertFalse(HtmlSanitizer::isSafeSvg($evilScriptSvg));

        // Malicious SVG with onload handler
        $evilOnloadSvg = '<svg xmlns="http://www.w3.org/2000/svg" onload="alert(1)"><circle cx="10" cy="10" r="5"/></svg>';
        $this->assertFalse(HtmlSanitizer::isSafeSvg($evilOnloadSvg));

        // Malicious SVG with foreignObject
        $evilForeignSvg = '<svg><foreignObject width="100" height="100"><body xmlns="http://www.w3.org/1999/xhtml"><script>alert(1)</script></body></foreignObject></svg>';
        $this->assertFalse(HtmlSanitizer::isSafeSvg($evilForeignSvg));

        // Malicious SVG with XXE entity
        $xxeSvg = '<?xml version="1.0"?><!DOCTYPE svg [<!ENTITY xxe SYSTEM "file:///etc/passwd">]><svg>&xxe;</svg>';
        $this->assertFalse(HtmlSanitizer::isSafeSvg($xxeSvg));
    }

    public function test_malicious_svg_upload_is_rejected(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $evilSvgContent = '<svg xmlns="http://www.w3.org/2000/svg"><script>alert("pwned")</script></svg>';
        $file = UploadedFile::fake()->createWithContent('malicious-icon.svg', $evilSvgContent);

        $response = $this->actingAs($admin)->post('/admin/media', [
            'file' => $file,
        ], ['Accept' => 'application/json']);

        $response->assertStatus(422);
        $this->assertDatabaseCount('media', 0);
    }

    public function test_named_rate_limiters_are_registered(): void
    {
        $limiters = ['login', 'two-factor', 'contact', 'search', 'uploads'];

        foreach ($limiters as $limiter) {
            $this->assertNotNull(
                RateLimiter::limiter($limiter),
                "Rate limiter '{$limiter}' is not registered in AppServiceProvider."
            );
        }
    }
}
