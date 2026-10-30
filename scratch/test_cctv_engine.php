<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/cctv_content_engine.php';

$testSlugs = [
    'cctv-services-karachi',
    'ip-cctv-cameras',
    'cctv-camera-installation',
    'cctv-camera-price-in-karachi',
    'home-cctv-camera-systems',
    'hikvision-cctv-cameras',
    '4k-cctv-cameras',
];

foreach ($testSlugs as $slug) {
    $service = Service::where('slug', $slug)->first();
    if (! $service) {
        echo "Missing: $slug\n";

        continue;
    }
    $data = generateCctvServiceData($service);
    $wc = str_word_count(strip_tags($data['content']));
    echo sprintf("[%s] Title: %s | Words: %d | Meta: %s\n",
        $slug, $data['title'], $wc, $data['meta_title']);
}
