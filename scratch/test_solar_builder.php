<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

require __DIR__.'/blog_builder_solar.php';

$sample = buildSolarInstallationBlogPost(
    'how-to-choose-the-best-solar-panel-installation-company-in-karachi',
    'How to Choose the Best Solar Panel Installation Company in Karachi',
    [
        'focus_keyword' => 'how to choose the best solar panel installation company in karachi',
        'primary_angle' => 'Comprehensive vetting criteria, EPC certifications, equipment verification, and turnkey warranty analysis',
    ]
);

$plainText = strip_tags($sample['content']);
$wordCount = str_word_count($plainText);
echo 'Title: '.$sample['title']."\n";
echo 'Slug: '.$sample['slug']."\n";
echo 'Word count: '.$wordCount." words\n";
echo 'Featured image: '.$sample['featured_image']."\n";
