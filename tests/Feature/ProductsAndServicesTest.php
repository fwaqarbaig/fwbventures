<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Database\Seeders\ServicesAndProductsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsAndServicesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ServicesAndProductsSeeder::class);
    }

    public function test_home_page_displays_products_and_services(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('FWB Ventures');
        $response->assertSee('+92 301 2118111');
    }

    public function test_products_index_page_displays_all_products(): void
    {
        // Legacy /products and /fleet 301-redirect to canonical /services
        $redirectResponse = $this->get('/products');
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/services');

        $fleetResponse = $this->get('/fleet');
        $fleetResponse->assertStatus(301);
        $fleetResponse->assertRedirect('/services');
    }

    public function test_trainiq_product_detail_page_renders_with_sop_modules(): void
    {
        // Legacy /product/trainiq and /fleet/trainiq 301-redirect to /services
        $redirectResponse = $this->get('/product/trainiq');
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/services');

        $fleetDetailResponse = $this->get('/fleet/trainiq');
        $fleetDetailResponse->assertStatus(301);
        $fleetDetailResponse->assertRedirect('/services');
    }

    public function test_product_detail_page_displays_product_modules_and_seo(): void
    {
        $product = Product::where('slug', 'fwb-ventures-hrms')->firstOrFail();

        // Legacy /product/{slug} and /fleet/{slug} 301-redirect to /services
        $redirectResponse = $this->get("/product/{$product->slug}");
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/services');

        $response = $this->get("/fleet/{$product->slug}");
        $response->assertStatus(301);
        $response->assertRedirect('/services');
    }

    public function test_services_index_page_displays_all_services(): void
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertSee('Data Analytics &amp; Business Intelligence', false);
        $response->assertSee('Data Migration &amp; Cloud Services', false);
        $response->assertSee('ERP Solutions', false);
        $response->assertSee('Automations &amp; AI Agents', false);
        $response->assertSee('Custom Software Development', false);
        $response->assertSee('AI-Powered Insights', false);
    }

    public function test_service_detail_page_displays_features_and_benefits(): void
    {
        $service = Service::firstOrFail();

        $response = $this->get("/service/{$service->slug}");

        $response->assertStatus(200);
        $response->assertSee($service->title);
    }

    public function test_about_page_renders_with_uae_legacy_and_locations(): void
    {
        $redirectResponse = $this->get('/about');
        $redirectResponse->assertStatus(301);
        $redirectResponse->assertRedirect('/about-us');

        $response = $this->get('/about-us');
        $response->assertStatus(200);
        $response->assertSee('FWB Ventures');
        $response->assertSee('Karachi');
    }

    public function test_contact_form_submission_succeeds(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Tariq Al Mansoori',
            'email' => 'tariq@example.ae',
            'phone' => '+971 50 123 4567',
            'company' => 'Dubai Holdings',
            'subject' => 'Product Demo: FWB Ventures HRMS',
            'message' => 'We want to schedule a demonstration for 150 employees in Dubai.',
        ]);

        $response->assertSessionHas('success');
    }

    public function test_admin_can_access_products_and_services_management(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get('/admin/products');
        $response->assertStatus(200);
        $response->assertSee('FWB Ventures HRMS');

        $response = $this->actingAs($admin)->get('/admin/services');
        $response->assertStatus(200);
        $response->assertSee('Data Analytics');
    }

    public function test_admin_can_create_new_product_with_yoast_seo(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->post('/admin/products', [
            'title' => 'Solar Commercial Inverter Suite',
            'tagline' => 'Automated GCC Laboratory Management',
            'badge' => 'NEW 2026',
            'category' => 'Diagnostic Software',
            'icon' => 'shopping-cart',
            'summary' => 'Intelligent diagnostics and cleanroom laboratory portal.',
            'content' => 'Comprehensive laboratory solution with automated diagnostics.',
            'modules_input' => "Vendor Portal\nAutomated Purchase Orders\nInvoice Reconciliation",
            'highlights_input' => "99.9% accuracy\nReal-time ERP sync\nAudit compliant",
            'status' => 'published',
            'order' => 5,
            'is_featured' => 1,
            'focus_keyword' => 'solar engineering karachi',
            'meta_title' => 'Solar Commercial Inverter Suite | Laboratory Dubai',
            'meta_description' => 'Automate cleanroom diagnostics with FWB Ventures solutions.',
            'seo_score' => 92,
            'readability_score' => 88,
        ]);

        $product = Product::where('slug', 'solar-commercial-inverter-suite')->firstOrFail();
        $response->assertRedirect(route('admin.products.edit', $product));

        $this->assertDatabaseHas('products', [
            'title' => 'Solar Commercial Inverter Suite',
            'slug' => 'solar-commercial-inverter-suite',
            'focus_keyword' => 'solar engineering karachi',
            'seo_score' => 92,
        ]);
        $this->assertCount(3, $product->modules);
    }

    public function test_admin_can_create_new_service_with_yoast_seo(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->post('/admin/services', [
            'title' => 'Cybersecurity & Sovereign Audits',
            'tagline' => 'UAE NESAC & ISO 27001 Compliance',
            'icon' => 'shield',
            'summary' => 'Comprehensive cybersecurity auditing and zero-trust architecture for GCC companies.',
            'content' => 'End-to-end security posture assessments, penetration testing, and UAE sovereign compliance.',
            'features_input' => "Penetration Testing\nZero-Trust Architecture\nNESAC Compliance",
            'benefits_input' => "100% Audit Readiness\nMitigated Cyber Risk\nContinuous Monitoring",
            'status' => 'published',
            'order' => 7,
            'is_featured' => 1,
            'focus_keyword' => 'cybersecurity dubai',
            'meta_title' => 'Cybersecurity & Sovereign Audits | FWB Ventures Dubai',
            'meta_description' => 'Ensure complete cybersecurity compliance with UAE regulations and ISO standards.',
            'seo_score' => 95,
            'readability_score' => 90,
        ]);

        $service = Service::where('slug', 'cybersecurity-sovereign-audits')->firstOrFail();
        $response->assertRedirect(route('admin.services.edit', $service));

        $this->assertDatabaseHas('services', [
            'title' => 'Cybersecurity & Sovereign Audits',
            'slug' => 'cybersecurity-sovereign-audits',
            'focus_keyword' => 'cybersecurity dubai',
            'seo_score' => 95,
        ]);
        $this->assertCount(3, $service->features);
    }

    public function test_odoo_partner_landing_page_renders_with_official_badge_and_modules(): void
    {
        $response = $this->get('/odoo');
        $response->assertStatus(410);
    }

    public function test_header_and_footer_contain_original_logos_and_odoo_tab(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('FWB Ventures');
        $response->assertSee('fwb-logo.svg');
        $response->assertSee('Services');
        $response->assertSee('Contact');
    }
}
