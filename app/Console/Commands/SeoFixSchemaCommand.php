<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Console\Command;

class SeoFixSchemaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:fix-schema {--dry-run : Only show what would be updated without saving}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sanitize schema_markup and clear local canonical URLs across services, posts, and pages';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $isDryRun = (bool) $this->option('dry-run');
        $baseUrl = rtrim(config('app.url', 'https://www.fwbventures.com'), '/');

        $this->info("Sanitizing Schema & Canonicals (Base URL: {$baseUrl})");

        // 1. Services
        $services = Service::all();
        $updatedServices = 0;
        foreach ($services as $service) {
            $changed = false;

            // Clear localhost / 127.0.0.1 / rentalpower canonicals
            if (! empty($service->canonical_url) && (
                str_contains($service->canonical_url, 'localhost') ||
                str_contains($service->canonical_url, '127.0.0.1') ||
                str_contains($service->canonical_url, 'rentalpower')
            )) {
                if (! $isDryRun) {
                    $service->canonical_url = null;
                }
                $changed = true;
            }

            // Sanitize schema_markup
            if (! empty($service->schema_markup)) {
                $sanitized = $this->sanitizeSchemaString($service->schema_markup, $baseUrl);
                if ($sanitized !== $service->schema_markup) {
                    if (! $isDryRun) {
                        $service->schema_markup = $sanitized;
                    }
                    $changed = true;
                }
            }

            if ($changed) {
                if (! $isDryRun) {
                    $service->save();
                }
                $updatedServices++;
            }
        }
        $this->line("Services updated: {$updatedServices} / {$services->count()}");

        // 2. Posts
        $posts = Post::all();
        $updatedPosts = 0;
        foreach ($posts as $post) {
            $changed = false;

            if (! empty($post->canonical_url) && (
                str_contains($post->canonical_url, 'localhost') ||
                str_contains($post->canonical_url, '127.0.0.1') ||
                str_contains($post->canonical_url, 'rentalpower')
            )) {
                if (! $isDryRun) {
                    $post->canonical_url = null;
                }
                $changed = true;
            }

            if (! empty($post->schema_markup)) {
                $sanitized = $this->sanitizeSchemaString($post->schema_markup, $baseUrl);
                if ($sanitized !== $post->schema_markup) {
                    if (! $isDryRun) {
                        $post->schema_markup = $sanitized;
                    }
                    $changed = true;
                }
            }

            if ($changed) {
                if (! $isDryRun) {
                    $post->save();
                }
                $updatedPosts++;
            }
        }
        $this->line("Posts updated: {$updatedPosts} / {$posts->count()}");

        // 3. Pages
        $pages = Page::all();
        $updatedPages = 0;
        foreach ($pages as $page) {
            $changed = false;

            if (! empty($page->canonical_url) && (
                str_contains($page->canonical_url, 'localhost') ||
                str_contains($page->canonical_url, '127.0.0.1') ||
                str_contains($page->canonical_url, 'rentalpower')
            )) {
                if (! $isDryRun) {
                    $page->canonical_url = null;
                }
                $changed = true;
            }

            if (! empty($page->schema_markup)) {
                $sanitized = $this->sanitizeSchemaString($page->schema_markup, $baseUrl);
                if ($sanitized !== $page->schema_markup) {
                    if (! $isDryRun) {
                        $page->schema_markup = $sanitized;
                    }
                    $changed = true;
                }
            }

            if ($changed) {
                if (! $isDryRun) {
                    $page->save();
                }
                $updatedPages++;
            }
        }
        $this->line("Pages updated: {$updatedPages} / {$pages->count()}");

        $this->info('Schema and Canonical URL sanitization completed successfully!');

        return Command::SUCCESS;
    }

    /**
     * Sanitize a schema JSON string.
     */
    protected function sanitizeSchemaString(string $schema, string $baseUrl): string
    {
        // Replace localhost / 127.0.0.1 / rentalpower URLs
        $cleaned = str_replace(
            ['http://localhost:8000', 'http://127.0.0.1:8000', 'https://rentalpower.ae', 'http://rentalpower.ae'],
            $baseUrl,
            $schema
        );

        // Fix language
        $cleaned = str_replace('"inLanguage": "en-AE"', '"inLanguage": "en-PK"', $cleaned);
        $cleaned = str_replace('"inLanguage":"en-AE"', '"inLanguage":"en-PK"', $cleaned);

        // Fix logo and team
        $cleaned = str_replace('rentalpower-logo.png', 'fwb-logo.svg', $cleaned);
        $cleaned = str_replace('Rental Power Engineering Team', 'FWB Ventures Engineering Team', $cleaned);
        $cleaned = str_replace('Rental Power UAE', 'FWB Ventures', $cleaned);

        // Strip Q1:, Q2: prefixes from FAQ questions
        $cleaned = preg_replace('/"name":\s*"Q[0-9]+:\s*/i', '"name": "', $cleaned);

        return $cleaned;
    }
}
