<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

echo "=== SOLAR FRAME / STRUCTURE MENU ITEMS ===\n";
$menuItems = MenuItem::where('title', 'like', '%Frame%')
    ->orWhere('title', 'like', '%Structure%')
    ->orWhere('title', 'like', '%Mounting%')
    ->orWhere('title', 'like', '%Pergola%')
    ->orWhere('title', 'like', '%Elevated%')
    ->orWhere('title', 'like', '%FRP%')
    ->orWhere('url', 'like', '%frame%')
    ->orWhere('url', 'like', '%structure%')
    ->orWhere('url', 'like', '%mounting%')
    ->get();

foreach ($menuItems as $m) {
    echo "Menu ID: {$m->id} | Title: {$m->title} | URL: {$m->url} | Parent: {$m->parent_id}\n";
}

echo "\n=== ALL SERVICES MATCHING FRAME / STRUCTURE / MOUNTING ===\n";
$services = Service::where('title', 'like', '%Frame%')
    ->orWhere('title', 'like', '%Structure%')
    ->orWhere('title', 'like', '%Mounting%')
    ->orWhere('title', 'like', '%Pergola%')
    ->orWhere('title', 'like', '%Elevated%')
    ->orWhere('title', 'like', '%Carport%')
    ->orWhere('title', 'like', '%FRP%')
    ->orWhere('slug', 'like', '%frame%')
    ->orWhere('slug', 'like', '%structure%')
    ->orWhere('slug', 'like', '%mounting%')
    ->orWhere('slug', 'like', '%pergola%')
    ->orWhere('slug', 'like', '%carport%')
    ->get();

echo 'Total matching services: '.$services->count()."\n";
foreach ($services as $s) {
    $wc = str_word_count(strip_tags($s->content ?? ''));
    echo "ID: {$s->id} | Slug: {$s->slug} | Words: {$wc} | Image: {$s->featured_image} | Title: {$s->title}\n";
}
