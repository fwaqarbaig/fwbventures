<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$cats = [
    '/category/solar-installation-guides',
    '/category/solar-mounting-frames',
    '/category/lithium-battery-technology',
    '/category/cctv-surveillance-guides',
];

echo "=== TESTING CATEGORY PAGES ===\n";
foreach ($cats as $uri) {
    $request = Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $len = strlen($response->getContent());
    echo sprintf("Category URI: %-40s | Status: %d | Length: %6d bytes\n", $uri, $status, $len);
    $kernel->terminate($request, $response);
}
