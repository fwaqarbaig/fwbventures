<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

echo "=== CHECK POST FEATURED IMAGE VS TITLE TOPIC ===\n";
$mismatchedPosts = 0;
foreach (Post::where('status', 'published')->get() as $p) {
    $t = strtolower($p->title);
    $feat = strtolower($p->featured_image ?? '');

    // Check if CCTV title has solar image
    if ((str_contains($t, 'cctv') || str_contains($t, 'camera') || str_contains($t, 'nvr') || str_contains($t, 'dvr')) && ! str_contains($feat, 'cctv')) {
        $mismatchedPosts++;
        echo "  [POST CCTV MISMATCH] ID {$p->id}: {$p->title} -> feat: {$p->featured_image}\n";
    }
    // Check if Lithium title has solar image
    if ((str_contains($t, 'lithium') || str_contains($t, 'lifepo4') || str_contains($t, 'powerwall') || str_contains($t, 'battery')) && ! str_contains($feat, 'lithium')) {
        $mismatchedPosts++;
        echo "  [POST LITHIUM MISMATCH] ID {$p->id}: {$p->title} -> feat: {$p->featured_image}\n";
    }
    // Check if Solar Structure title has non-structure image
    if ((str_contains($t, 'structure') || str_contains($t, 'frame') || str_contains($t, 'mounting') || str_contains($t, 'carport') || str_contains($t, 'pergola') || str_contains($t, 'frp')) && ! str_contains($feat, 'structures') && ! str_contains($feat, 'frp') && ! str_contains($feat, 'galvanized') && ! str_contains($feat, 'pergola') && ! str_contains($feat, 'carport')) {
        $mismatchedPosts++;
        echo "  [POST STRUCTURE MISMATCH] ID {$p->id}: {$p->title} -> feat: {$p->featured_image}\n";
    }
}
echo "Total mismatched posts: $mismatchedPosts\n";
