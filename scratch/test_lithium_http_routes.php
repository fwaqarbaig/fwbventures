<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

$testUrls = [
    '/service/lithium-batteries-karachi',
    '/service/lithium-battery-supplier-in-karachi',
    '/service/lithium-battery-dealer-in-karachi',
    '/service/12v-100ah-lithium-battery',
    '/service/48v-100ah-lithium-battery',
    '/service/5kwh-home-lithium-battery',
    '/service/commercial-solar-battery-storage',
    '/service/50kwh-commercial-lithium-battery',
    '/service/lithium-battery-prices-karachi',
    '/service/residential-lithium-battery-prices',
];

echo "Testing HTTP Responses for Core Lithium Battery URLs...\n\n";

foreach ($testUrls as $url) {
    $request = Request::create($url, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();

    $hasH1 = preg_match('/<h1[^>]*>(.*?)<\/h1>/si', $content, $h1Matches);
    $h1 = $hasH1 ? trim(strip_tags($h1Matches[1])) : 'NONE';
    $hasSchema = str_contains($content, 'application/ld+json');
    $hasImg = preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $imgMatches);
    $firstImg = $hasImg ? $imgMatches[1] : 'NONE';

    echo "URL: {$url}\n";
    echo "  Status: {$status}\n";
    echo "  H1: {$h1}\n";
    echo '  Has Schema: '.($hasSchema ? 'YES' : 'NO')."\n";
    echo "  Featured Image: {$firstImg}\n";
    echo "--------------------------------------------------------\n";
}
