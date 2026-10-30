<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

$p = Post::where('status', 'published')->first();
echo 'Post ID: '.$p->id."\n";
echo 'Title: '.$p->title."\n";
echo "Content preview:\n";
echo substr($p->content, 0, 500)."\n\n";

$hasImg = (bool) preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '');
echo 'Has <img> tag currently: '.($hasImg ? 'YES' : 'NO')."\n";
