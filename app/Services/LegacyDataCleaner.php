<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\RedirectRule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LegacyDataCleaner
{
    /**
     * Purge all leftover legacy data from the UAE Generator/Chiller template.
     *
     * @return array{redirects: int, products: int, pages: int, posts: int, categories: int}
     */
    public function run(): array
    {
        $deletedRedirects = 0;
        $deletedProducts = 0;
        $deletedPages = 0;
        $deletedPosts = 0;
        $deletedCategories = 0;

        // 1. Purge legacy generator/chiller/fleet redirect rules
        if (class_exists(RedirectRule::class)) {
            $deletedRedirects = RedirectRule::where(function ($q) {
                $q->where('source_url', 'like', '%generator%')
                    ->orWhere('source_url', 'like', '%chiller%')
                    ->orWhere('source_url', 'like', '%cooling%')
                    ->orWhere('source_url', 'like', '%wild-air%')
                    ->orWhere('source_url', 'like', '%portacabin%')
                    ->orWhere('source_url', 'like', '%rental-power%')
                    ->orWhere('source_url', 'like', '%hvac-rental%')
                    ->orWhere('source_url', 'like', '%/fleet%')
                    ->orWhere('target_url', 'like', '%/fleet%')
                    ->orWhere('group', 'seo_cannibalization_fix')
                    ->orWhere('group', 'SEO Fixes')
                    ->orWhere('source_url', '=', '/products');
            })->delete();

            RedirectRule::clearCache();
        }

        // 2. Purge legacy generator products
        if (class_exists(Product::class)) {
            $deletedProducts = Product::where(function ($q) {
                $q->where('title', 'like', '%generator%')
                    ->orWhere('title', 'like', '%chiller%')
                    ->orWhere('title', 'like', '%cooling%')
                    ->orWhere('title', 'like', '%refrigeration%')
                    ->orWhere('category', 'like', '%generator%')
                    ->orWhere('category', 'like', '%chiller%');
            })->delete();
        }

        // 3. Purge legacy generator draft pages
        if (class_exists(Page::class)) {
            $deletedPages = Page::where('status', 'draft')
                ->where(function ($q) {
                    $q->where('title', 'like', '%generator%')
                        ->orWhere('title', 'like', '%chiller%')
                        ->orWhere('title', 'like', '%cooling%')
                        ->orWhere('title', 'like', '%portacabin%')
                        ->orWhere('title', 'like', '%caravan%')
                        ->orWhere('title', 'like', '%container%')
                        ->orWhere('title', 'like', '%uae%')
                        ->orWhere('title', 'like', '%fleet%');
                })->delete();
        }

        // 4. Purge legacy generator draft posts & unused categories
        if (class_exists(Post::class)) {
            $legacyPostIds = Post::where('status', 'draft')
                ->where(function ($q) {
                    $q->where('title', 'like', '%generator%')
                        ->orWhere('title', 'like', '%chiller%')
                        ->orWhere('title', 'like', '%cooling%')
                        ->orWhere('title', 'like', '%dubai%')
                        ->orWhere('title', 'like', '%uae%')
                        ->orWhere('title', 'like', '%sharjah%')
                        ->orWhere('title', 'like', '%abu dhabi%')
                        ->orWhere('title', 'like', '%portacabin%');
                })->pluck('id');

            if ($legacyPostIds->isNotEmpty()) {
                DB::table('category_post')->whereIn('post_id', $legacyPostIds)->delete();
                DB::table('post_tag')->whereIn('post_id', $legacyPostIds)->delete();
                $deletedPosts = Post::whereIn('id', $legacyPostIds)->delete();
            }
        }

        if (class_exists(Category::class)) {
            $legacyCategoryIds = Category::where(function ($q) {
                $q->where('slug', 'like', '%generator%')
                    ->orWhere('slug', 'like', '%chiller%')
                    ->orWhere('slug', 'like', '%cooling%')
                    ->orWhere('slug', 'like', '%rental%')
                    ->orWhere('slug', 'like', '%hvac%')
                    ->orWhere('slug', 'like', '%portacabin%');
            })->pluck('id');

            if ($legacyCategoryIds->isNotEmpty()) {
                DB::table('category_post')->whereIn('category_id', $legacyCategoryIds)->delete();
                $deletedCategories = Category::whereIn('id', $legacyCategoryIds)->delete();
            }
        }

        // Clear general application caches
        try {
            Cache::forget('redirect_rules_active_cache_v3');
            Cache::forget('app_settings_map');
        } catch (\Throwable $e) {
            Log::warning('Could not clear some caches in LegacyDataCleaner: '.$e->getMessage());
        }

        return [
            'redirects' => $deletedRedirects,
            'products' => $deletedProducts,
            'pages' => $deletedPages,
            'posts' => $deletedPosts,
            'categories' => $deletedCategories,
        ];
    }
}
