<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$urls = ['/', '/login', '/contact-us'];

foreach ($urls as $uri) {
    $request = Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $html = $response->getContent();
    $hasLogo = str_contains($html, 'fwb-logo.svg') ? 'YES' : 'NO';
    echo "URI: $uri -> Status: ".$response->getStatusCode()." | Has Logo SVG: $hasLogo\n";
    $kernel->terminate($request, $response);
}
