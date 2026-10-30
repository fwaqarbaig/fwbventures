<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/solar_builders_grid.php';

$s1 = Service::where('slug', 'solar-systems-for-load-shedding-in-karachi')->first();
$data = buildGridTypeContent($s1);
echo 'Raw content length from buildGridTypeContent: '.strlen($data['content'])."\n";
echo 'Raw word count: '.str_word_count(strip_tags($data['content']))."\n";
echo substr($data['content'], 0, 800)."\n";
