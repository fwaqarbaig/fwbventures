<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

$services = Service::where('meta_title', 'like', '%|%')->get();
foreach ($services as $s) {
    $s->meta_title = preg_replace('/\s*\|\s*/', ' | ', $s->meta_title);
    $s->og_title = $s->meta_title;
    $s->save();
}
echo 'Normalized pipe spaces in '.$services->count()." services.\n";
