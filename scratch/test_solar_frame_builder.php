<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

require __DIR__.'/blog_builder_solar_frame.php';

$sample = buildSolarFrameBlogPost(
    'solar-farm-structure-installation-cost-in-karachi',
    'Solar Farm Structure Installation Cost in Karachi',
    [
        'focus_keyword' => 'solar farm structure installation cost in karachi',
        'primary_angle' => 'Comprehensive capital expenditure breakdown, steel gauge requirements, and turnkey fabrication pricing in Karachi',
    ]
);

$plainText = strip_tags($sample['content']);
$wordCount = str_word_count($plainText);
echo 'Title: '.$sample['title']."\n";
echo 'Slug: '.$sample['slug']."\n";
echo 'Word count: '.$wordCount." words\n";
echo 'Featured image: '.$sample['featured_image']."\n";
