<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

$p = Post::find(1235);
echo "Title: {$p->title}\n";
echo 'Content length: '.strlen($p->content)."\n";
echo "First 1000 chars of content:\n";
echo substr($p->content, 0, 1000)."\n";
