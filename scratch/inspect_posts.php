<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "Posts columns:\n";
print_r(Schema::getColumnListing('posts'));

$cats = Schema::hasTable('categories') ? DB::table('categories')->get() : [];
echo "\nCategories count: ".count($cats)."\n";
foreach ($cats as $c) {
    echo "  [ID: {$c->id}] {$c->name} ({$c->slug})\n";
}
