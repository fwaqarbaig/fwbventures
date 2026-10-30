<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use Illuminate\Contracts\Console\Kernel;

foreach ([43, 45, 46] as $catId) {
    $cat = Category::find($catId);
    echo "\n=== CATEGORY {$cat->id}: {$cat->name} ({$cat->posts()->count()} posts) ===\n";
    foreach ($cat->posts as $p) {
        echo "  [ID {$p->id}] slug: {$p->slug} | title: {$p->title}\n";
    }
}
