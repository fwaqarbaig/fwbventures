<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

echo "=== CHECK EXISTING BODY IMAGES IN POSTS ===\n";
foreach (Post::where('status', 'published')->get() as $p) {
    if (preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '', $matches)) {
        echo "Post ID {$p->id}: Found ".count($matches[1]).' img(s): '.implode(', ', $matches[1])."\n";
    }
}

echo "\n=== CHECK EXISTING BODY IMAGES IN SERVICES ===\n";
foreach (Service::all() as $s) {
    if (preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $s->content ?? '', $matches)) {
        echo "Service ID {$s->id} ({$s->title}): Found ".count($matches[1]).' img(s): '.implode(', ', $matches[1])."\n";
    }
}

echo "\n=== CHECK EXISTING BODY IMAGES IN PAGES ===\n";
foreach (Page::all() as $page) {
    if (preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $page->content ?? '', $matches)) {
        echo "Page ID {$page->id} ({$page->slug}): Found ".count($matches[1]).' img(s): '.implode(', ', array_slice($matches[1], 0, 3))."\n";
    }
}
