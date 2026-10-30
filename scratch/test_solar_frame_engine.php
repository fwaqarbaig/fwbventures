<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/solar_frame_content_engine.php';

$testSlugs = [
    'solar-farm-structure-manufacturer-in-karachi',
    'solar-pergola-structure-in-karachi',
    'solar-carport-structure-in-karachi',
    'hot-dip-galvanized-solar-mounting-structure-in-karachi',
    'corrosion-resistant-solar-structure-in-karachi',
    'solar-structure-for-50kw-solar-system-in-karachi',
    'solar-mounting-structure-per-kw-price-in-karachi',
    'solar-structure-installation-in-dha-karachi',
];

echo "Testing Solar Frame Generation Engine...\n\n";

foreach ($testSlugs as $slug) {
    $service = Service::where('slug', $slug)->first();
    if (! $service) {
        echo "Service not found: $slug\n";

        continue;
    }

    $data = generateSolarFrameServiceData($service);
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
