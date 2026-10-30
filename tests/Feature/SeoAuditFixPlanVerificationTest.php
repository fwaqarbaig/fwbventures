<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class SeoAuditFixPlanVerificationTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);
    }

    public function test_uae_legacy_routes_return_410_gone(): void
    {
        $legacyRoutes = [
            '/odoo',
            '/industries',
            '/used-refurbished-generators',
            '/used-generators',
            '/buy-sell',
            '/cooling',
        ];

        foreach ($legacyRoutes as $url) {
            $response = $this->get($url);
            $response->assertStatus(410);
        }
    }

    public function test_fleet_and_product_routes_return_301_to_services(): void
    {
        $fleetRoutes = [
            '/fleet',
            '/fleet/diesel-generator',
            '/products',
            '/products/cummins-generator',
            '/product/solar-inverter',
        ];

        foreach ($fleetRoutes as $url) {
            $response = $this->get($url);
            $response->assertStatus(301);
            $response->assertRedirect('/services');
        }
    }

    public function test_location_routes_return_301_to_solar_areas(): void
    {
        $locationRoutes = [
            '/locations',
            '/locations/dubai',
            '/locations/sharjah',
        ];

        foreach ($locationRoutes as $url) {
            $response = $this->get($url);
            $response->assertStatus(301);
            $response->assertRedirect('/service/solar-installation-areas-karachi');
        }
    }

    public function test_trailing_slash_returns_301_redirect(): void
    {
        $request = Request::create('/services/', 'GET');
        $response = $this->app->handle($request);

        $this->assertEquals(301, $response->getStatusCode());
        $this->assertEquals(url('/services'), $response->headers->get('Location'));
    }

    public function test_sitemap_index_and_sub_sitemaps_valid(): void
    {
        // 1. Sitemap Index
        $indexResponse = $this->get('/sitemap-index.xml');
        $indexResponse->assertStatus(200);
        $indexContent = $indexResponse->getContent();

        $this->assertStringContainsString('sitemap-services.xml', $indexContent);
        $this->assertStringContainsString('sitemap-posts.xml', $indexContent);
        $this->assertStringContainsString('sitemap-pages.xml', $indexContent);
        $this->assertStringContainsString('sitemap-categories.xml', $indexContent);
        // Products omitted when count is 0
        $this->assertStringNotContainsString('sitemap-products.xml', $indexContent);

        // 2. Robots.txt
        $robotsResponse = $this->get('/robots.txt');
        $robotsResponse->assertStatus(200);
        $robotsContent = $robotsResponse->getContent();

        $this->assertStringContainsString('Sitemap:', $robotsContent);
        $this->assertStringContainsString('sitemap-index.xml', $robotsContent);
        $this->assertStringNotContainsString('sitemap-pages.xml', $robotsContent);

        // 3. Sitemap Pages
        Page::create([
            'title' => 'Home',
            'slug' => 'home',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        $pagesResponse = $this->get('/sitemap-pages.xml');
        $pagesResponse->assertStatus(200);
        $pagesContent = $pagesResponse->getContent();

        $this->assertStringNotContainsString('/odoo', $pagesContent);
        $this->assertStringContainsString(rtrim(url('/'), '/').'/', $pagesContent);
    }

    public function test_homepage_schema_and_branding_contains_no_uae_remnants(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $html = $response->getContent();

        $this->assertStringNotContainsString('rentalpower', strtolower($html));
        $this->assertStringNotContainsString('Rental Power', $html);
        $this->assertStringNotContainsString('en-AE', $html);
        $this->assertStringNotContainsString('+971', $html);
        $this->assertStringNotContainsString('Dubai', $html);

        $this->assertStringContainsString('Shahrah-e-Faisal', $html);
        $this->assertStringContainsString('Karachi', $html);
        $this->assertStringContainsString('PKR', $html);
    }

    public function test_silo_hub_service_renders_knowledge_hub_section(): void
    {
        $category = Category::create([
            'name' => 'Solar Installation Guides',
            'slug' => 'solar-installation-guides',
            'description' => 'Comprehensive guides for solar power installation.',
        ]);

        $service = Service::create([
            'title' => 'Solar Solutions Karachi',
            'slug' => 'solar-solutions-karachi',
            'content' => '<p>Leading solar installation and EPC company in Karachi.</p>',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        $post = Post::create([
            'user_id' => $this->admin->id,
            'title' => 'Best Solar Inverter Sizing Guide in Karachi',
            'slug' => 'solar-inverter-sizing-guide-karachi',
            'content' => '<p>Guide for sizing solar inverters in Karachi residential villas.</p>',
            'status' => 'published',
            'is_indexable' => true,
            'published_at' => now(),
        ]);
        $post->categories()->attach($category->id);

        $response = $this->get(route('service.show', $service->slug));
        $response->assertStatus(200);
        $response->assertSee('Silo Knowledge Hub', false);
        $response->assertSee('Guides &amp; Technical Sizing Resources', false);
    }

    public function test_area_service_renders_nearby_karachi_areas_block(): void
    {
        $dhaService = Service::create([
            'title' => 'Solar Panel Installation in DHA Karachi',
            'slug' => 'solar-panel-installation-in-dha-karachi',
            'content' => '<p>Turnkey solar installation services in DHA Karachi.</p>',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        $cliftonService = Service::create([
            'title' => 'Solar Panel Installation in Clifton Karachi',
            'slug' => 'solar-panel-installation-in-clifton-karachi',
            'content' => '<p>Turnkey solar installation services in Clifton Karachi.</p>',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        $response = $this->get(route('service.show', $dhaService->slug));
        $response->assertStatus(200);
        $response->assertSee('Nearby Karachi Areas for This Service', false);
        $response->assertSee('/service/solar-panel-installation-in-clifton-karachi', false);
    }

    public function test_category_page_renders_custom_intro_paragraph_and_silo_hub_link(): void
    {
        $category = Category::create([
            'name' => 'Solar Installation Guides',
            'slug' => 'solar-installation-guides',
            'description' => 'Solar guides category.',
        ]);

        $response = $this->get(route('category.show', $category->slug));
        $response->assertStatus(200);
        $response->assertSee('/service/solar-solutions-karachi', false);
    }

    public function test_admin_check_keyword_cannibalization_api(): void
    {
        Service::create([
            'title' => 'Lithium Battery Price Karachi',
            'slug' => 'lithium-battery-price-in-karachi',
            'focus_keyword' => 'lithium battery price karachi',
            'content' => '<p>Grade-A LiFePO4 batteries.</p>',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        // Unauthenticated -> 302 to login
        $guestResponse = $this->getJson('/admin/seo/check-keyword?keyword=lithium+battery+price+karachi');
        $guestResponse->assertStatus(401);

        // Authenticated admin -> 200 with duplicate flag
        $authResponse = $this->actingAs($this->admin)->getJson('/admin/seo/check-keyword?keyword=lithium+battery+price+karachi');
        $authResponse->assertStatus(200);
        $authResponse->assertJson([
            'is_duplicate' => true,
        ]);

        // Different keyword -> is_duplicate false
        $uniqueResponse = $this->actingAs($this->admin)->getJson('/admin/seo/check-keyword?keyword=unique+solar+brand+xyz');
        $uniqueResponse->assertStatus(200);
        $uniqueResponse->assertJson([
            'is_duplicate' => false,
            'used_in' => [],
        ]);
    }
}
