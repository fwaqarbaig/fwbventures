<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

echo "Services columns:\n";
print_r(Schema::getColumnListing('services'));

echo "\n=== ALL SERVICES MATCHING LITHIUM OR BATTERY ===\n";
$services = Service::where('title', 'like', '%Lithium%')
    ->orWhere('title', 'like', '%Battery%')
    ->orWhere('slug', 'like', '%lithium%')
    ->orWhere('slug', 'like', '%battery%')
    ->orWhere('slug', 'like', '%lifepo4%')
    ->get();

echo 'Total matching services: '.$services->count()."\n";
foreach ($services as $s) {
    $wc = str_word_count(strip_tags($s->content ?? ''));
    echo "ID: {$s->id} | Slug: {$s->slug} | Words: {$wc} | Title: {$s->title}\n";
}

echo "\n=== ALL PRODUCTS ===\n";
$products = Product::all();
echo 'Total products: '.$products->count()."\n";
foreach ($products as $p) {
    $wc = str_word_count(strip_tags($p->description ?? ''));
    echo "Prod ID: {$p->id} | Slug: {$p->slug} | Words: {$wc} | Name: {$p->name}\n";
}
