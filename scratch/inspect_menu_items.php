<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use Illuminate\Contracts\Console\Kernel;

$rootMenus = MenuItem::whereNull('parent_id')->orWhere('parent_id', 0)->orderBy('order')->get();
echo 'Root Menu Items Count: '.$rootMenus->count()."\n";
foreach ($rootMenus as $m) {
    echo "ID: {$m->id} | Order: {$m->order} | Route: {$m->route_name} | URL: {$m->url} | Title: {$m->title}\n";
}

$blogMenu = MenuItem::where('title', 'like', '%Blog%')->orWhere('url', 'like', '%blog%')->get();
echo "\nBlog Menu Items: ".$blogMenu->count()."\n";
foreach ($blogMenu as $b) {
    echo "Blog ID: {$b->id} | Parent: {$b->parent_id} | Title: {$b->title} | URL: {$b->url}\n";
}
