<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

echo "====================================================\n";
echo "AUDIT: POSTS, PAGES, SERVICES IMAGES\n";
echo "====================================================\n\n";

// 1. SERVICES AUDIT
$services = Service::all();
echo '--- 1. SERVICES ('.$services->count()." total) ---\n";
$servicesWithoutFeatured = 0;
$servicesWithoutBodyImg = 0;
foreach ($services as $s) {
    $hasFeatured = ! empty($s->featured_image) && file_exists(public_path(ltrim($s->featured_image, '/')));
    $hasBodyImg = preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $s->content ?? '', $m);

    if (! $hasFeatured) {
        $servicesWithoutFeatured++;
        echo "  [SERVICE NO FEATURED] ID {$s->id} | {$s->title} | img: '{$s->featured_image}'\n";
    }
    if (! $hasBodyImg) {
        $servicesWithoutBodyImg++;
    }
}
echo "Services without valid featured image: $servicesWithoutFeatured\n";
echo "Services without image in content body: $servicesWithoutBodyImg\n\n";

// 2. PAGES AUDIT
$pages = Page::all();
echo '--- 2. PAGES ('.$pages->count()." total) ---\n";
$pagesWithoutFeatured = 0;
$pagesWithoutBodyImg = 0;
foreach ($pages as $p) {
    $hasFeatured = ! empty($p->featured_image) && file_exists(public_path(ltrim($p->featured_image, '/')));
    $hasBodyImg = preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '', $m);

    if (! $hasFeatured && ! $hasBodyImg) {
        $pagesWithoutFeatured++;
        echo "  [PAGE NO IMAGE] ID {$p->id} | slug: {$p->slug} | title: {$p->title} | feat: '{$p->featured_image}'\n";
    }
}
echo "Pages without any image (featured or body): $pagesWithoutFeatured\n\n";

// 3. POSTS AUDIT
$posts = Post::where('status', 'published')->get();
echo '--- 3. PUBLISHED POSTS ('.$posts->count()." total) ---\n";
$postsWithoutFeatured = 0;
$postsWithMissingFeaturedFile = 0;
$postsWithoutBodyImg = 0;

$imagePoolUsage = [];

foreach ($posts as $post) {
    $feat = $post->featured_image;
    $hasFeat = ! empty($feat);
    $fileExists = $hasFeat && file_exists(public_path(ltrim($feat, '/')));

    if (! $hasFeat) {
        $postsWithoutFeatured++;
    } elseif (! $fileExists) {
        $postsWithMissingFeaturedFile++;
        echo "  [POST FILE NOT FOUND] ID {$post->id} | {$post->title} | '{$feat}'\n";
    } else {
        $imagePoolUsage[$feat] = ($imagePoolUsage[$feat] ?? 0) + 1;
    }

    $hasBodyImg = preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $post->content ?? '', $m);
    if (! $hasBodyImg) {
        $postsWithoutBodyImg++;
    }
}

echo "Posts without featured_image column set: $postsWithoutFeatured\n";
echo "Posts with featured_image file missing on disk: $postsWithMissingFeaturedFile\n";
echo "Posts without <img> tag in content body: $postsWithoutBodyImg\n\n";

echo "Featured Image Pool Usage across posts:\n";
foreach ($imagePoolUsage as $img => $count) {
    echo "  $img: $count posts\n";
}
