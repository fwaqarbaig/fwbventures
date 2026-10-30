<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$slug = '10kwh-home-battery-storage-all-night-air-conditioning';
$req = Request::create('/'.$slug, 'GET');
$res = app()->handle($req);

echo 'Status: '.$res->getStatusCode()."\n";
echo 'Location: '.$res->headers->get('Location')."\n";
$html = $res->getContent();
echo 'Contains Title: '.(str_contains($html, '10kWh Home Battery Storage') ? 'YES' : 'NO')."\n";
echo 'Contains Phone +92 301 2118111: '.(str_contains($html, '+92 301 2118111') ? 'YES' : 'NO')."\n";
echo 'Contains Logo: '.(str_contains($html, 'fwb-logo.svg') ? 'YES' : 'NO')."\n";
echo 'Total Page Word Count: '.str_word_count(strip_tags($html))."\n";
