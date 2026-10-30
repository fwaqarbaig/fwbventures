<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use Illuminate\Contracts\Console\Kernel;

$items = MenuItem::whereNull('parent_id')->orderBy('order')->get();
echo "Root Menu Items:\n";
foreach ($items as $item) {
    echo "ID: {$item->id} | Title: '{$item->title}' | URL: '{$item->url}' | Order: {$item->order} | Children: ".$item->children()->count()."\n";
}
