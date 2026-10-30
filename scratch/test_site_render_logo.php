<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$response = app()->handle(Request::create('/', 'GET'));
$html = $response->getContent();

// Check if logo is referenced properly
echo 'Status code: '.$response->getStatusCode()."\n";
if (strpos($html, 'fwb-logo.svg') !== false) {
    echo "Header references fwb-logo.svg: YES\n";
}
if (strpos($html, 'fwb-logo-white.svg') !== false) {
    echo "Footer references fwb-logo-white.svg: YES\n";
}
if (strpos($html, '+92 301 2118111') !== false) {
    echo "Phone +92 301 2118111 is present: YES\n";
}
if (strpos($html, '3000000000') !== false || strpos($html, '+92 300') !== false) {
    echo "WARNING: Old phone number still present!\n";
} else {
    echo "Old phone number removed completely: YES\n";
}
