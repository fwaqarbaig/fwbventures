<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

$services = Service::where('slug', 'like', '%solar%')
    ->orWhere('title', 'like', '%solar%')
    ->get();

$count = 0;
foreach ($services as $s) {
    $cleanTitle = preg_replace('/(\s*in Karachi\s*)+/i', ' in Karachi', $s->title);
    $cleanTitle = trim(preg_replace('/(\s*Karachi\s*)+/i', ' Karachi', $cleanTitle));

    $cleanMetaTitle = preg_replace('/(\s*in Karachi\s*)+/i', ' in Karachi', $s->meta_title ?? '');
    $cleanMetaTitle = trim(preg_replace('/(\s*Karachi\s*)+/i', ' Karachi', $cleanMetaTitle));

    $s->title = $cleanTitle;
    $s->meta_title = $cleanMetaTitle ?: "{$cleanTitle} | FWB Ventures";
    $s->og_title = $s->meta_title;
    $s->og_description = $s->meta_description;
    $s->save();
    $count++;
}

echo "Cleaned og_title and titles for $count solar services.\n";
