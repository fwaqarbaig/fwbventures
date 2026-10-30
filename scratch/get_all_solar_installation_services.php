<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

function getDescendantUrls($parentId)
{
    $urls = [];
    $items = MenuItem::where('parent_id', $parentId)->get();
    foreach ($items as $item) {
        $urls[] = $item->url;
        $urls = array_merge($urls, getDescendantUrls($item->id));
    }

    return $urls;
}

$rootSolar = MenuItem::find(191);
$solarUrls = array_merge([$rootSolar->url], getDescendantUrls(191));
$solarSlugs = array_map(function ($url) {
    $path = parse_url($url, PHP_URL_PATH) ?: $url;

    return preg_replace('#^/?service/#', '', trim($path, '/'));
}, $solarUrls);
$solarSlugs = array_unique(array_filter($solarSlugs));

echo 'Total Solar Installation Menu Slugs: '.count($solarSlugs)."\n\n";

$services = Service::whereIn('slug', $solarSlugs)->get();
echo 'Found '.$services->count()." Services matching these slugs in DB:\n";

foreach ($services as $s) {
    $wordCount = str_word_count(strip_tags($s->content));
    echo sprintf("[%d] %s (/service/%s) -> Words: %d\n",
        $s->id, $s->title, $s->slug, $wordCount);
}

// Check which slugs in menu might not be in services table
$existingSlugs = $services->pluck('slug')->toArray();
$missingSlugs = array_diff($solarSlugs, $existingSlugs);
if (! empty($missingSlugs)) {
    echo "\nSlugs in menu but NOT found in services table (".count($missingSlugs)."):\n";
    foreach ($missingSlugs as $ms) {
        echo ' - '.$ms."\n";
    }
}
