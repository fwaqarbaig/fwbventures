<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$urls = ['/dashboard', '/admin/dashboard', '/dev-login', '/login'];

echo "=== TESTING ROUTES ===\n";
foreach ($urls as $uri) {
    $request = Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    echo "URI: $uri -> Status: ".$response->getStatusCode();
    if ($response->isRedirection()) {
        echo ' -> Redirects to: '.$response->headers->get('Location');
    }
    echo "\n";
    $kernel->terminate($request, $response);
}
