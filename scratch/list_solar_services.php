<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

$solarServices = Service::where('title', 'like', '%solar%')
    ->orWhere('focus_keyword', 'like', '%solar%')
    ->get(['id', 'title', 'slug', 'focus_keyword', 'meta_title']);

echo 'Total Solar Services: '.$solarServices->count()."\n";
foreach ($solarServices as $s) {
    echo sprintf(" - [%d] %s -> /service/%s (Keyword: %s)\n", $s->id, $s->title, $s->slug, $s->focus_keyword);
}

echo "\n--- MENU STRUCTURE FOR SOLAR INSTALLATION ---\n";
$solarMenuItems = MenuItem::where('title', 'like', '%solar%')
    ->orWhere('url', 'like', '%solar%')
    ->get();

foreach ($solarMenuItems as $mi) {
    echo sprintf(" - Menu Item [%d] Parent [%s] Title: %s -> URL: %s\n", $mi->id, $mi->parent_id ?? 'None', $mi->title, $mi->url);
}
