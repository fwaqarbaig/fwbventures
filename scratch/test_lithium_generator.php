<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/lithium_content_engine.php';

$testSlugs = [
    'lithium-battery-supplier-in-karachi',
    'lithium-battery-dealer-in-karachi',
    '12v-100ah-lithium-battery',
    '512v-100ah-solar-battery',
    '50kwh-commercial-lithium-battery',
    'lithium-battery-prices-in-karachi',
];

foreach ($testSlugs as $slug) {
    $service = Service::where('slug', $slug)->first();
    if (! $service) {
        echo "Service not found: $slug\n";

        continue;
    }

    $data = generateLithiumServiceData($service);
    $wc = str_word_count(strip_tags($data['content']));
    echo "Slug: {$service->slug}\n";
    echo "  Title: {$data['title']}\n";
    echo "  Word Count: {$wc}\n";
    echo "  Image: {$data['featured_image']}\n";
    echo "  Focus Keyword: {$data['focus_keyword']}\n";
    echo '  Features Count: '.count($data['features'])."\n";
    echo '  Benefits Count: '.count($data['benefits'])."\n";
    echo "--------------------------------------------------------\n";
}
