<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$urlsToTest = [
    '/blog',
    '/solar-farm-structure-installation-cost-in-karachi',
    '/how-to-choose-the-best-solar-panel-installation-company-in-karachi',
    '/how-to-choose-the-best-cctv-camera-for-your-home-in-karachi',
    '/lithium-battery-products-and-services-guide',
];

echo "=== TESTING HTTP ROUTES ===\n";
foreach ($urlsToTest as $uri) {
    $request = Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    $hasPhone = strpos($content, '+92 301 2118111') !== false ? 'YES' : 'NO';
    $hasFwb = strpos($content, 'FWB Ventures') !== false ? 'YES' : 'NO';
    $len = strlen($content);

    echo sprintf("URI: %-65s | Status: %d | Len: %6d bytes | Phone: %s | FWB: %s\n", $uri, $status, $len, $hasPhone, $hasFwb);
    $kernel->terminate($request, $response);
}
