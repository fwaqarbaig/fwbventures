<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

echo "=== PAGES WITH SOLAR IMAGES ON NON-SOLAR TOPICS ===\n";
foreach (Page::all() as $p) {
    if (preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '', $matches)) {
        foreach ($matches[1] as $src) {
            if (str_contains($src, '/images/services/solar/')) {
                echo sprintf("Page ID %2d | Slug: %-35s | Img in body: %s\n", $p->id, $p->slug, $src);
            }
        }
    }
}
