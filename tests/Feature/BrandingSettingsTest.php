<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BrandingSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_branding_settings(): void
    {
        $response = $this->get(route('admin.settings.branding'));
        $response->assertRedirect('/login');
    }

    public function test_admin_can_view_branding_settings_page(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.settings.branding'));

        $response->assertStatus(200);
        $response->assertSee('Desktop Header Height');
        $response->assertSee('Mobile Header Height');
        $response->assertSee('Footer Logo Height');
    }

    public function test_admin_can_update_logo_heights_and_branding(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->post(route('admin.settings.branding.update'), [
            'site_title' => 'FWB Ventures Pakistan',
            'logo_height_desktop' => 52,
            'logo_height_mobile' => 38,
            'logo_height_footer' => 46,
        ]);

        $response->assertRedirect(route('admin.settings.branding'));
        $response->assertSessionHas('success');

        $this->assertEquals(52, Setting::get('logo_height_desktop'));
        $this->assertEquals(38, Setting::get('logo_height_mobile'));
        $this->assertEquals(46, Setting::get('logo_height_footer'));
        $this->assertEquals('FWB Ventures Pakistan', Setting::get('site_title'));
    }

    public function test_admin_can_upload_custom_logo(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $dummyLogo = UploadedFile::fake()->image('custom-brand-logo.png', 300, 100);

        $response = $this->actingAs($admin)->post(route('admin.settings.branding.update'), [
            'logo_height_desktop' => 48,
            'logo_height_mobile' => 36,
            'logo_height_footer' => 40,
            'logo_file' => $dummyLogo,
        ]);

        $response->assertRedirect(route('admin.settings.branding'));
        $response->assertSessionHas('success');

        $savedLogoUrl = Setting::get('site_logo');
        $this->assertNotEmpty($savedLogoUrl);
        $this->assertStringContainsString('/storage/uploads/branding/logo-', $savedLogoUrl);
    }

    public function test_admin_can_reset_branding_to_defaults(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        Setting::set('logo_height_desktop', 60);

        $response = $this->actingAs($admin)->post(route('admin.settings.branding.reset'));

        $response->assertRedirect(route('admin.settings.branding'));
        $response->assertSessionHas('success');

        $this->assertEquals(44, Setting::get('logo_height_desktop'));
        $this->assertEquals(36, Setting::get('logo_height_mobile'));
        $this->assertEquals(40, Setting::get('logo_height_footer'));
    }

    public function test_frontend_renders_custom_logo_dimensions(): void
    {
        Setting::set('logo_height_desktop', 50);
        Setting::set('logo_height_footer', 42);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('height: 50px', false);
        $response->assertSee('height: 42px', false);
    }
}
