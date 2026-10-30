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
$content = $data['content'];

// Check where strip_tags cuts off
$stripped = strip_tags($content);
echo 'Stripped length: '.strlen($stripped)."\n";
echo "Last 200 chars of stripped:\n".substr($stripped, -200)."\n";
