<?php

use App\Models\Product;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo 'Product count: '.Product::count().PHP_EOL;
foreach (Product::all() as $p) {
    echo $p->id.': '.$p->title.' ('.$p->slug.') - status: '.$p->status.PHP_EOL;
}
