<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

$cctv = Post::published()->where('title', 'like', '%cctv%')->take(6)->get(['slug', 'title']);
$lithium = Post::published()->where('title', 'like', '%lithium%')->take(6)->get(['slug', 'title']);
$structure = Post::published()->where('title', 'like', '%structure%')->take(6)->get(['slug', 'title']);
$solar = Post::published()->where('title', 'like', '%solar%')->where('title', 'not like', '%structure%')->where('title', 'not like', '%battery%')->take(6)->get(['slug', 'title']);

echo "=== VERIFIED BLOG POST SLUGS ===\n\n";

echo "CCTV Posts:\n";
foreach ($cctv as $p) {
    echo "  /{$p->slug} => {$p->title}\n";
}

echo "\nLithium Posts:\n";
foreach ($lithium as $p) {
    echo "  /{$p->slug} => {$p->title}\n";
}

echo "\nStructure Posts:\n";
foreach ($structure as $p) {
    echo "  /{$p->slug} => {$p->title}\n";
}

echo "\nSolar Posts:\n";
foreach ($solar as $p) {
    echo "  /{$p->slug} => {$p->title}\n";
}
