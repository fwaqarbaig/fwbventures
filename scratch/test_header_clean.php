<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$request = Request::create('/', 'GET');
$response = $kernel->handle($request);
echo 'Status: '.$response->getStatusCode()."\n";
$html = $response->getContent();

// Check if phone number is in header
echo 'Contains +92 301 2118111: '.(str_contains($html, '+92 301 2118111') ? 'YES' : 'NO')."\n";
echo 'Contains tel:+923012118111: '.(str_contains($html, 'tel:+923012118111') ? 'YES' : 'NO')."\n";
echo 'Contains Contact Us: '.(str_contains($html, 'Contact Us') ? 'YES' : 'NO')."\n";
echo 'Contains Hotline Button with gradient: '.(str_contains($html, 'from-sky-600 to-blue-700') ? 'YES' : 'NO')."\n";
