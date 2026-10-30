<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

echo 'Total Published Blog Posts: '.Post::where('status', 'published')->count()."\n";
echo "Sample Blog Posts:\n";
foreach (Post::where('status', 'published')->take(5)->get(['id', 'title', 'slug']) as $p) {
    echo "ID: {$p->id} | Slug: {$p->slug} | Title: {$p->title}\n";
}
