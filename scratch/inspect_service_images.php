<?php

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$s = Service::where('slug', 'on-grid-solar-systems-in-karachi')->first();
if ($s) {
    echo 'ID: '.$s->id."\n";
    echo 'Title: '.$s->title."\n";
    echo 'featured_image: '.$s->featured_image."\n";
    echo 'featured_image_url: '.$s->featured_image_url."\n";
    echo 'file_exists raw: '.(file_exists(public_path($s->featured_image)) ? 'YES' : 'NO')."\n";
    echo 'file_exists storage: '.(file_exists(public_path('storage/'.$s->featured_image)) ? 'YES' : 'NO')."\n";
} else {
    echo "Service not found!\n";
}
