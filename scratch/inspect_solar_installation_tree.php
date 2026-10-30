<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use Illuminate\Contracts\Console\Kernel;

// Find the Solar Installation menu parent item
$solarInstallationMenu = MenuItem::where('title', 'Solar Installation')
    ->orWhere('title', 'like', '%Solar Installation%')
    ->get();

echo "Solar Installation Menu Items found:\n";
foreach ($solarInstallationMenu as $m) {
    echo "ID: {$m->id}, Parent: {$m->parent_id}, Title: {$m->title}, URL: {$m->url}\n";
}

// Let's list all child menu items under Solar Installation
if ($solarInstallationMenu->isNotEmpty()) {
    $parentIds = $solarInstallationMenu->pluck('id')->toArray();
    $subItems = MenuItem::whereIn('parent_id', $parentIds)->get();
    echo "\nDirect Sub-categories under Solar Installation (".$subItems->count()."):\n";
    foreach ($subItems as $sub) {
        echo " - [{$sub->id}] {$sub->title} -> {$sub->url}\n";
        $childItems = MenuItem::where('parent_id', $sub->id)->get();
        echo '    Children: '.$childItems->count()."\n";
    }
}
