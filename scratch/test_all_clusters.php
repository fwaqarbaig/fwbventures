<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/solar_content_engine.php';

$testSlugs = [
    '10kw-solar-system-in-karachi',
    '10kw-solar-system-price-in-karachi',
    'solar-mounting-structures-karachi',
    'home-solar-systems-in-karachi',
    'solar-panel-cleaning-in-karachi',
    'solar-panel-installation-in-dha-karachi',
    'solar-installation-karachi',
];

foreach ($testSlugs as $slug) {
    $service = Service::where('slug', $slug)->first();
    if (! $service) {
        echo "Missing: $slug\n";

        continue;
    }
    $gen = generateSolarServiceData($service);
    $wc = str_word_count(strip_tags($gen['content']));
    echo sprintf("[%s] Title: %s | Words: %d | Meta Title: %s\n",
        $slug, $gen['title'], $wc, $gen['meta_title']);
}
