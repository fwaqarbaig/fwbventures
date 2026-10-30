<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

echo "====================================================\n";
echo "COMPLETE BLOG ARCHITECTURE AUDIT — FWB VENTURES\n";
echo "====================================================\n";
echo 'Total Published Posts: '.Post::where('status', 'published')->count()."\n\n";

$categories = [
    43 => 'Solar Installation Guides',
    45 => 'Solar Frame Structures',
    44 => 'Lithium Battery Technology',
    46 => 'CCTV & Electronic Security',
];

$grandTotalWords = 0;

foreach ($categories as $catId => $expectedName) {
    $cat = Category::find($catId);
    $posts = $cat->posts()->where('status', 'published')->get();
    $catWords = 0;
    foreach ($posts as $p) {
        $catWords += str_word_count(strip_tags($p->content));
    }
    $grandTotalWords += $catWords;
    $avgWords = $posts->count() > 0 ? round($catWords / $posts->count()) : 0;

    echo sprintf("Category [%d] %-30s | Posts: %3d | Total Words: %10s | Avg Words/Post: %5d\n",
        $catId,
        $cat->name,
        $posts->count(),
        number_format($catWords),
        $avgWords
    );
}

echo "----------------------------------------------------\n";
echo 'GRAND TOTAL BLOG WORDS ACROSS ALL 4 CORE DIVISIONS: '.number_format($grandTotalWords)." words!\n";
echo "====================================================\n";
