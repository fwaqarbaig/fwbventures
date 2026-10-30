<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

$posts = Post::where('status', 'published')->take(5)->get();
foreach ($posts as $p) {
    echo "Post ID {$p->id}: {$p->title}\n";
    // Check paragraphs in content
    if (preg_match_all('/<p>(.*?)<\/p>/is', $p->content, $matches)) {
        echo 'Found '.count($matches[1])." paragraphs.\n";
        echo 'P1: '.substr(strip_tags($matches[1][0]), 0, 150)."...\n";
        if (isset($matches[1][1])) {
            echo 'P2: '.substr(strip_tags($matches[1][1]), 0, 150)."...\n";
        }
    }
    echo "--------------------------------------------------------\n";
}
