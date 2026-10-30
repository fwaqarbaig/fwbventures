<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

require __DIR__.'/blog_builder_cctv.php';

$sample = buildCctvBlogPost(
    'how-to-choose-the-best-cctv-camera-for-your-home-in-karachi',
    'How to Choose the Best CCTV Camera for Your Home in Karachi',
    [
        'focus_keyword' => 'how to choose the best cctv camera for your home in karachi',
        'primary_angle' => 'Residential surveillance guide, ColorVu night vision, DORI compliance, and load-shedding UPS power backup',
    ]
);

$plainText = strip_tags($sample['content']);
$wordCount = str_word_count($plainText);
echo 'Title: '.$sample['title']."\n";
echo 'Slug: '.$sample['slug']."\n";
echo 'Word count: '.$wordCount." words\n";
echo 'Featured image: '.$sample['featured_image']."\n";
