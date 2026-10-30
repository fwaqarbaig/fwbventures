<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

$allLithium = Service::whereBetween('id', [300, 360])->get(['id', 'slug', 'title', 'featured_image']);
foreach ($allLithium as $s) {
    echo "ID: {$s->id} | {$s->slug} | Image: {$s->featured_image} | {$s->title}\n";
}
