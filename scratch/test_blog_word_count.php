<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

require __DIR__.'/blog_builder_lithium.php';

$post = buildLithiumBlogPost('lithium-battery-products-services', 'Lithium Battery Products & Services', [
    'focus_keyword' => 'lithium battery products and services',
    'target_audience' => 'Solar buyers and homeowners in Karachi',
    'primary_angle' => 'Comprehensive technical buyer guide and product range breakdown',
    'capacity_highlight' => '12V, 24V, 48V, and 51.2V Powerwalls and Server Racks',
    'price_range' => 'PKR 75,000 to PKR 1,550,000',
]);

$wordCount = str_word_count(strip_tags($post['content']));
echo "Blog Post Word Count: {$wordCount}\n";
