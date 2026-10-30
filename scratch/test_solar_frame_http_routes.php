<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

$testUrls = [
    '/service/solar-frame-structure-karachi',
    '/service/solar-farm-structure-manufacturer-in-karachi',
    '/service/solar-pergola-structure-in-karachi',
    '/service/solar-carport-structure-in-karachi',
    '/service/hot-dip-galvanized-solar-mounting-structure-in-karachi',
    '/service/corrosion-resistant-solar-structure-in-karachi',
    '/service/solar-structure-for-50kw-solar-system-in-karachi',
    '/service/solar-mounting-structure-per-kw-price-in-karachi',
    '/service/solar-structure-installation-in-dha-karachi',
    '/service/solar-structure-installation-in-site-industrial-area-karachi',
];

echo "Testing HTTP Responses for Core Solar Frame URLs...\n\n";

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
