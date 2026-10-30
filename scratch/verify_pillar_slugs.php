<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

echo "=== PILLAR SERVICES SLUGS ===\n";
$pillars = [
    'Solar Installation' => ['solar-panel-installation', 'solar-solutions', 'solar-systems-by-type', 'solar-systems-by-capacity', 'solar-panels-equipment', 'solar-system-prices-in-karachi', 'solar-services-karachi', 'solar-installation-areas-karachi'],
    'Solar Frame' => ['solar-frame-structure-karachi', 'elevated-solar-structure-in-karachi', 'solar-carport-structures-karachi', 'solar-pergola-structures-karachi', 'custom-solar-frame-fabrication-karachi', 'galvanized-iron-gi-solar-structure-karachi', 'solar-farm-structure-in-karachi', 'solar-structure-installation-karachi', 'solar-frame-prices-in-karachi', 'solar-frame-areas-in-karachi'],
    'CCTV' => ['cctv-services-karachi', 'cctv-cameras-karachi', 'cctv-solutions-karachi', 'cctv-services-installation-karachi', 'cctv-camera-prices-karachi', 'cctv-installation-areas-in-karachi'],
    'Lithium' => ['lithium-batteries-karachi', 'residential-lithium-batteries-karachi', 'commercial-industrial-lithium-batteries-karachi', 'lithium-battery-prices-karachi', 'lithium-battery-supply-installation-areas-in-karachi'],
];

foreach ($pillars as $category => $slugs) {
    echo "\nCategory: $category\n";
    foreach ($slugs as $slug) {
        $svc = Service::where('slug', $slug)->first();
        if ($svc) {
            echo sprintf("  [FOUND] %-45s => %s (ID: %d)\n", $slug, $svc->title, $svc->id);
        } else {
            // Try searching by like
            $like = Service::where('slug', 'like', "%{$slug}%")->first();
            if ($like) {
                echo sprintf("  [SIMILAR] %-45s => Found as '%s' - %s (ID: %d)\n", $slug, $like->slug, $like->title, $like->id);
            } else {
                echo sprintf("  [NOT FOUND] %-45s\n", $slug);
            }
        }
    }
}
