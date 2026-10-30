<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

// Find CCTV Menu items
$cctvMenuItems = MenuItem::where('title', 'like', '%CCTV%')
    ->orWhere('url', 'like', '%cctv%')
    ->orWhere('title', 'like', '%Camera%')
    ->get();

echo 'Total CCTV Menu Items: '.$cctvMenuItems->count()."\n";
foreach ($cctvMenuItems as $m) {
    echo sprintf("[%d] (Parent: %s) %s -> %s\n", $m->id, $m->parent_id ?? 'root', $m->title, $m->url);
}

// Find CCTV Services in DB
$cctvServices = Service::where('title', 'like', '%CCTV%')
    ->orWhere('slug', 'like', '%cctv%')
    ->orWhere('title', 'like', '%Camera%')
    ->orWhere('focus_keyword', 'like', '%cctv%')
    ->get();

echo "\nTotal CCTV Services in DB: ".$cctvServices->count()."\n";
foreach ($cctvServices as $s) {
    $wc = str_word_count(strip_tags($s->content));
    echo sprintf(" - [%d] %s (/service/%s) -> Words: %d\n", $s->id, $s->title, $s->slug, $wc);
}
