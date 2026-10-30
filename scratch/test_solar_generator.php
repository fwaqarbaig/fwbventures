<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

// Let's create a prototype generator for one service and verify word count
require_once __DIR__.'/solar_content_engine.php';

$testSlug = 'on-grid-solar-systems-in-karachi';
$service = Service::where('slug', $testSlug)->first();

if (! $service) {
    exit("Service not found: $testSlug\n");
}

$generated = generateSolarServiceData($service);
$wordCount = str_word_count(strip_tags($generated['content']));

echo 'Generated Service: '.$generated['title']."\n";
echo 'Word Count: '.$wordCount."\n";
echo 'Meta Title: '.$generated['meta_title'].' ('.strlen($generated['meta_title'])." chars)\n";
echo 'Meta Desc: '.$generated['meta_description'].' ('.strlen($generated['meta_description'])." chars)\n";
echo 'Features Count: '.count($generated['features'])."\n";
echo 'Benefits Count: '.count($generated['benefits'])."\n";
echo 'Benchmarks Count: '.count($generated['benchmarks'])."\n";
echo "\n--- First 600 characters of Content ---\n";
echo substr($generated['content'], 0, 600)."\n...\n";
echo "\n--- Headings Found in Content ---\n";
preg_match_all('/<h[234][^>]*>(.*?)<\/h[234]>/i', $generated['content'], $headings);
foreach ($headings[0] as $h) {
    echo ' '.strip_tags($h)."\n";
}
