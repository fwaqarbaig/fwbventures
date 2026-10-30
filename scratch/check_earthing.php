<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/solar_content_engine.php';

$s2 = Service::where('slug', 'solar-protection-and-earthing-equipment-in-karachi')->first();
$data = generateSolarServiceData($s2);
echo 'Final word count with extensions: '.str_word_count(strip_tags($data['content']))."\n";
