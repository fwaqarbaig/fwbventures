<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_page_loads_with_empty_query(): void
    {
        $response = $this->get(route('search'));

        $response->assertStatus(200);
        $response->assertSee('Find Solar, Structures, CCTV & Lithium Solutions', false);
        $response->assertSee('Search solar systems');
        $response->assertSee('name="q"', false);
    }

    public function test_header_contains_phone_hotline_and_blogs_tab(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        // Ensure phone hotline button is properly rendered with phone number
        $response->assertSee('+92 301 2118111');
        $response->assertSee('tel:+923012118111');
        // Ensure Blogs tab exists in header navigation
        $response->assertSee('Blogs');
        $response->assertSee(route('blog.index'));
    }

    public function test_search_finds_matching_products_and_generators(): void
    {
        Product::create([
            'title' => '10kWh LiFePO4 Lithium Energy Storage Battery',
            'slug' => '10kwh-lifepo4-battery',
            'badge' => '10 kWh',
            'category' => 'Battery',
            'status' => 'published',
            'summary' => 'High performance LiFePO4 battery for Karachi solar systems.',
            'content' => 'Deep cycle 6000 cycles lithium storage for residential villas.',
        ]);

        $response = $this->get(route('search', ['q' => 'LiFePO4']));

        $response->assertStatus(200);
        $response->assertSee('10kWh LiFePO4 Lithium Energy Storage Battery');
        $response->assertSee(route('fleet.show', '10kwh-lifepo4-battery'));
    }

    public function test_search_finds_matching_services(): void
    {
        Service::create([
            'title' => 'Residential Solar Panel Installation in Karachi',
            'slug' => 'residential-solar-panel-installation-karachi',
            'hero_badge' => 'Solar EPC',
            'status' => 'published',
            'summary' => 'Turnkey residential solar engineering across Karachi.',
            'content' => 'Comprehensive rooftop solar installations in DHA and Clifton.',
        ]);

        $response = $this->get(route('search', ['q' => 'Solar Panel Installation']));

        $response->assertStatus(200);
        $response->assertSee('Residential Solar Panel Installation in Karachi');
        $response->assertSee(route('service.show', 'residential-solar-panel-installation-karachi'));
    }

    public function test_search_finds_matching_blog_posts(): void
    {
        $user = User::factory()->create();

        Post::create([
            'user_id' => $user->id,
            'title' => 'Complete Karachi Net Metering Guide',
            'slug' => 'karachi-net-metering-guide',
            'status' => 'published',
            'excerpt' => 'How to apply for K-Electric net metering and save 80% on bills.',
            'content' => 'Step by step net metering guide for Karachi homeowners.',
            'published_at' => now(),
        ]);

        $response = $this->get(route('search', ['q' => 'Net Metering Guide']));

        $response->assertStatus(200);
        $response->assertSee('Complete Karachi Net Metering Guide');
        $response->assertSee(route('post.show', 'karachi-net-metering-guide'));
    }
}
