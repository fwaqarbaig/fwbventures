<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$urls = [
    '/',
    '/about',
    '/products/portable-generator',
    '/services/solar-panel-installation',
    '/services/cctv-installation-in-dha-karachi',
    '/services/lithium-battery-in-clifton-karachi',
    '/services/elevated-solar-structure-in-bahria-town-karachi',
    '/blog/solar-export-and-net-billing-in-karachi-k-electric-and-nepra-guide',
    '/blog/ptz-dome-camera-installation-in-karachi',
    '/blog/12v-100ah-lithium-battery-karachi',
];

echo "=== TESTING HTTP RENDER & IMAGE PRESENCE ON SAMPLE ROUTES ===\n";
foreach ($urls as $url) {
    $request = Request::create($url, 'GET');
    $response = $app->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    $imgCount = preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $matches);
    echo sprintf(
        "Status: %d | Imgs: %2d | %s\n",
        $status,
        $imgCount,
        $url
    );
}
