<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$testUrls = [
    '/service/solar-installation-karachi',
    '/service/solar-panel-installation-karachi',
    '/service/solar-solutions-karachi',
    '/service/solar-systems-by-type-karachi',
    '/service/solar-system-prices-karachi',
    '/service/solar-frame-structure-karachi',
    '/service/solar-mounting-structures-karachi',
    '/service/solar-structure-types-karachi',
    '/service/solar-structure-materials-karachi',
    '/service/solar-farm-structure-in-karachi',
    '/service/cctv-services-karachi',
    '/service/cctv-cameras-karachi',
    '/service/cctv-solutions-karachi',
    '/service/cctv-services-installation-karachi',
    '/service/cctv-camera-prices-karachi',
    '/service/cctv-installation-areas-karachi',
    '/service/lithium-batteries-karachi',
    '/service/residential-lithium-batteries-karachi',
    '/service/commercial-industrial-lithium-batteries-karachi',
    '/service/lithium-battery-prices-karachi',
    '/service/lithium-battery-supply-areas-karachi',
    '/k-electric-net-metering-complete-guide-karachi',
    '/on-grid-vs-hybrid-vs-off-grid-solar-karachi',
    '/solar-panel-system-cost-prices-karachi-guide',
    '/tier-1-solar-panels-efficiency-guide-karachi',
    '/elevated-vs-non-elevated-solar-panel-structures-in-karachi',
    '/astm-a123-hot-dip-galvanized-solar-structure-karachi',
    '/how-to-choose-a-solar-mounting-structure-for-karachi-weather',
    '/solar-frame-fabrication-process-cost-karachi',
    '/how-to-choose-the-best-cctv-camera-for-your-home-in-karachi',
    '/ip-camera-vs-hd-cctv-camera-which-is-better-in-karachi',
    '/dvr-vs-nvr-which-cctv-recording-system-should-you-choose-in-karachi',
    '/cctv-camera-price-in-karachi-complete-buying-guide',
    '/lithium-battery-in-karachi-complete-buying-guide',
    '/lifepo4-battery-in-karachi-advantages-cost',
    '/lithium-battery-price-in-karachi-complete-guide',
    '/lithium-battery-vs-lead-acid-battery-for-solar-systems-in-karachi',
    '/blog',
    '/contact-us',
    '/about-us',
];

echo "=== TESTING ALL CORE INTERNAL LINK TARGETS ===\n";
$errors = 0;
foreach ($testUrls as $url) {
    $request = Request::create($url, 'GET');
    $response = $app->handle($request);
    $status = $response->getStatusCode();
    if ($status === 404 || $status >= 500) {
        $errors++;
        echo "  [ERROR $status] $url\n";
    } else {
        echo sprintf("  [OK %d] %s\n", $status, $url);
    }
}

echo "\nTotal Errors: $errors\n";
