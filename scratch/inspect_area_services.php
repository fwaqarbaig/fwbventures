<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$areaParents = DB::table('menu_items')
    ->where('title', 'like', '%Area%')
    ->orWhere('title', 'like', '%Location%')
    ->orWhere('title', 'like', '%Installation in%')
    ->get();

foreach ($areaParents as $ap) {
    echo "Parent [ID: {$ap->id}] Title: {$ap->title} | URL: {$ap->url}\n";
    $children = DB::table('menu_items')->where('parent_id', $ap->id)->get();
    echo '   Children count: '.$children->count()."\n";
    foreach ($children as $ch) {
        echo "     * [ID: {$ch->id}] {$ch->title} -> {$ch->url}\n";
    }
}
