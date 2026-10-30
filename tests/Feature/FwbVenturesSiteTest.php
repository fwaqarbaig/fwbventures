<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Post;
use App\Models\RedirectRule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FwbVenturesSiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create([
            'name' => 'FWB Technical Specialist',
            'email' => 'admin@fwbventures.com',
            'role' => 'admin',
        ]);

        Service::create([
            'title' => 'Solar Installation in Karachi',
            'slug' => 'solar-installation-karachi',
            'hero_badge' => 'Turnkey Solar EPC',
            'tagline' => 'Turnkey Solar Energy EPC Solutions',
            'summary' => 'Comprehensive residential, commercial, and industrial solar installations in Karachi.',
            'status' => 'published',
            'order' => 1,
        ]);

        $category = Category::create([
            'name' => 'Solar Guides',
            'slug' => 'solar-guides',
        ]);

        $post = Post::create([
            'user_id' => $user->id,
            'title' => 'Complete Karachi Net Metering Guide',
            'slug' => 'complete-karachi-net-metering-guide',
            'excerpt' => 'How to apply for K-Electric net metering in Karachi.',
            'content' => '<p>Detailed net metering solar guide in Karachi.</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);
        $post->categories()->attach($category->id);

        Page::create([
            'user_id' => $user->id,
            'title' => 'FWB Ventures Engineering',
            'slug' => 'solar-engineering-karachi',
            'content' => '<p>Premier solar engineering firm in Karachi.</p>',
            'status' => 'published',
            'template' => 'default',
        ]);
    }

    public function test_home_page_renders_with_fwb_ventures_branding(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('FWB Ventures');
    }

    public function test_about_page_renders_with_fwb_ventures_details(): void
    {
        $redirectResponse = $this->get('/about');
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/about-us');

        $response = $this->get('/about-us');
        $response->assertStatus(200);
        $response->assertSee('FWB Ventures');
    }

    public function test_blog_index_and_post_detail_render_successfully(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Complete Karachi Net Metering Guide');

        // Direct clean post slug renders 200 OK
        $postResponse = $this->get('/complete-karachi-net-metering-guide');
        $postResponse->assertStatus(200);
        $postResponse->assertSee('Complete Karachi Net Metering Guide');
        $postResponse->assertSee('Detailed net metering solar guide in Karachi.');

        // Legacy /post/ URL 301-redirects to clean /{slug}
        $legacyResponse = $this->get('/post/complete-karachi-net-metering-guide');
        $legacyResponse->assertStatus(301);
        $legacyResponse->assertRedirect('/complete-karachi-net-metering-guide');
    }

    public function test_wordpress_direct_slug_resolution(): void
    {
        // 1. Post via direct slug renders canonical 200 without /post/
        $postSlugResponse = $this->get('/complete-karachi-net-metering-guide');
        $postSlugResponse->assertStatus(200);
        $postSlugResponse->assertSee('Complete Karachi Net Metering Guide');

        // 2. Page via direct slug renders canonical 200
        $pageSlugResponse = $this->get('/solar-engineering-karachi');
        $pageSlugResponse->assertStatus(200);
        $pageSlugResponse->assertSee('FWB Ventures Engineering');
    }

    public function test_contact_inquiry_submission_stores_to_database(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Ahmed Tariq',
            'email' => 'ahmed@company.pk',
            'phone' => '+92 300 1234567',
            'subject' => '10kW Solar Installation Inquiry DHA',
            'message' => 'Need quote for 10kW hybrid solar system with 10kWh lithium battery.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', [
            'email' => 'ahmed@company.pk',
            'name' => 'Ahmed Tariq',
        ]);
    }

    public function test_login_page_renders_with_fwb_ventures_branding(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('images/fwb-logo.svg');
        $response->assertSee('CMS to manage operations');
    }

    public function test_admin_dashboard_displays_services_and_inquiries(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Services');
        $response->assertSee('Leads & Inquiries', false);
    }

    public function test_fwb_core_services_render_with_rich_content(): void
    {
        $services = [
            'solar-installation-karachi' => 'Solar Installation in Karachi',
            'solar-frame-structure-karachi' => 'Solar Frame Structure in Karachi',
            'cctv-services-karachi' => 'CCTV Services in Karachi',
            'lithium-batteries-karachi' => 'Lithium Batteries in Karachi',
        ];

        foreach ($services as $slug => $title) {
            Service::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'hero_badge' => 'FWB EPC Division',
                    'tagline' => 'Turnkey Engineering Solutions in Karachi',
                    'summary' => 'Comprehensive technical engineering service by FWB Ventures.',
                    'content' => '<h2>Frequently Asked Questions</h2><p>Common questions answered.</p>',
                    'status' => 'published',
                    'order' => 1,
                ]
            );

            $response = $this->get('/service/'.$slug);
            $response->assertStatus(200);
            $response->assertSee($title);
            $response->assertSee('+92 301 2118111');
            $response->assertSee('Frequently Asked Questions');
        }

        // Test services index page
        $indexResponse = $this->get('/services');
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('Karachi');

        foreach ($services as $slug => $title) {
            $indexResponse->assertSee($title);
        }
    }

    public function test_admin_dashboard_displays_all_services_and_pages_for_direct_editing(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Services (');
        $response->assertSee('Solar Installation in Karachi');

        $response->assertSee('Edit Page');
        $response->assertSee('Website Pages');
        $response->assertSee('FWB Ventures Engineering');
    }

    public function test_admin_can_edit_all_service_fields_and_preserves_rich_html(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $service = Service::where('slug', 'solar-installation-karachi')->first();

        $editResponse = $this->actingAs($admin)->get(route('admin.services.edit', $service));
        $editResponse->assertStatus(200);
        $editResponse->assertSee('HTML Source Code');
        $editResponse->assertSee('Core Technical Capabilities');

        $customHtml = '<div class="custom-card"><h3 class="text-xl">Net Metering Protocol</h3><table class="w-full"><tr><td>Status</td><td>Verified</td></tr></table></div>';

        $updateResponse = $this->actingAs($admin)->put(route('admin.services.update', $service), [
            'title' => 'Updated Solar EPC Service',
            'slug' => 'solar-installation-karachi',
            'tagline' => 'Updated 24/7 Turnkey Solar',
            'hero_badge' => 'Tier-1 Certified Karachi EPC',
            'benchmark_standard' => 'IEC 61215 / Tier 1 PV',
            'benchmark_evaluation' => '100% Free Site Survey',
            'benchmark_guarantee' => '25-Year Linear Performance',
            'benchmark_turnaround' => '3-Day Rapid Installation',
            'benchmark_courier' => 'Free Site Delivery Across Karachi',
            'summary' => 'Updated summary for solar installation.',
            'content' => $customHtml,
            'features_input' => "Tier-1 Solar Panels\nHybrid Multi-MPPT Inverters\nBi-Directional Green Meter",
            'benefits_input' => "90% Bill Reduction\nZero Load Shedding",
            'icon' => 'sun',
            'status' => 'published',
            'order' => 1,
            'is_featured' => 1,
            'meta_title' => 'Updated SEO Title',
            'meta_description' => 'Updated meta description.',
        ]);

        $updateResponse->assertRedirect(route('admin.services.edit', $service));

        $service->refresh();
        $this->assertEquals('Updated Solar EPC Service', $service->title);
        $this->assertEquals('Tier-1 Certified Karachi EPC', $service->hero_badge);
        $this->assertEquals('IEC 61215 / Tier 1 PV', $service->benchmarks['standard']);
        $this->assertEquals($customHtml, $service->content);
        $this->assertCount(3, $service->features);
        $this->assertCount(2, $service->benefits);

        // Verify frontend displays the updated fields
        $showResponse = $this->get('/service/solar-installation-karachi');
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Updated Solar EPC Service');
        $showResponse->assertSee('Tier-1 Solar Panels');
        $showResponse->assertSee('Zero Load Shedding');
        $showResponse->assertSee('Net Metering Protocol');
    }

    public function test_root_slug_route_prioritizes_published_service_over_legacy_page(): void
    {
        // When user visits /solar-installation-karachi root URL, it 301-redirects to official /service/solar-installation-karachi
        $response = $this->get('/solar-installation-karachi');
        $response->assertStatus(301);
        $response->assertRedirect(route('service.show', 'solar-installation-karachi'));
    }

    public function test_intake_form_creates_evaluation_inquiry(): void
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'Tariq Mehmood',
            'email' => 'tariq@enterprise.pk',
            'phone' => '+923001234567',
            'subject' => 'Evaluation Request: Solar Installation Karachi',
            'device_model' => '10kW On-Grid System',
            'pickup_requested' => 'yes',
            'message' => 'Need on-site assessment for DHA Phase 6 residence.',
        ]);

        $response->assertSessionHas('success');
        $response->assertSessionMissing('errors');

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Tariq Mehmood',
            'email' => 'tariq@enterprise.pk',
            'type' => 'evaluation',
        ]);

        $inquiry = Inquiry::where('email', 'tariq@enterprise.pk')->first();
        $this->assertStringContainsString('10kW On-Grid System', $inquiry->message);
        $this->assertStringContainsString('Priority On-Site Site Inspection Requested', $inquiry->message);
        $this->assertStringContainsString('Need on-site assessment', $inquiry->message);
    }

    public function test_dynamic_sitemap_xml_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
        $content = $response->getContent();

        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $content);
        $this->assertStringContainsString('xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"', $content);
        $this->assertStringContainsString('/service/solar-installation-karachi', $content);
    }

    public function test_cannibalizing_and_legacy_urls_return_301_redirects_to_canonical_targets(): void
    {
        RedirectRule::seedDefaults();

        // 1. Duplicate service URL redirects to canonical target
        $resp1 = $this->get('/service/solar-solutions-in-karachi');
        $resp1->assertStatus(301);
        $resp1->assertRedirect('/service/solar-solutions-karachi');

        // 2. Duplicate systems URL redirects to canonical target
        $resp2 = $this->get('/service/solar-systems-in-karachi');
        $resp2->assertStatus(301);
        $resp2->assertRedirect('/service/solar-systems-karachi');

        // 3. Generic CMS pages to clean routes
        $this->get('/page/about')->assertStatus(301)->assertRedirect(route('about'));
        $this->get('/page/contact')->assertStatus(301)->assertRedirect(route('contact'));
        $this->get('/page/services')->assertStatus(301)->assertRedirect(route('service.index'));
        $this->get('/page/home')->assertStatus(301)->assertRedirect(route('home'));
    }

    public function test_service_page_includes_faqpage_schema(): void
    {
        $service = Service::where('slug', 'solar-installation-karachi')->first();
        $service->update([
            'content' => '<h3>How much does solar panel installation cost in Karachi?</h3><p>Solar system costs depend on capacity from 3kW to 100kW.</p>',
        ]);

        $response = $this->get('/service/solar-installation-karachi');

        $response->assertStatus(200);
        $response->assertSee('"@type": "FAQPage"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
        $response->assertSee('"@type": "Service"', false);
        $response->assertSee('Solar Installation in Karachi');
    }

    public function test_blog_post_includes_contextual_commercial_service_banner_and_blogposting_schema(): void
    {
        $post = Post::published()->first();
        $this->assertNotNull($post);

        // Clean post URL renders 200 OK
        $response = $this->get('/'.$post->slug);

        $response->assertStatus(200);
        $response->assertSee('"@type": "BlogPosting"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
        $response->assertSee('KARACHI EPC SERVICES');
        $response->assertSee('Planning an Energy or Security Project in Karachi? Deploy');

        // Legacy /post/ URL 301-redirects to clean /{slug}
        $legacyResponse = $this->get('/post/'.$post->slug);
        $legacyResponse->assertStatus(301);
        $legacyResponse->assertRedirect('/'.$post->slug);
    }
}
