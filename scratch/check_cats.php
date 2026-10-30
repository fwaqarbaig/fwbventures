<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use Illuminate\Contracts\Console\Kernel;

foreach ([43, 44, 45, 46] as $id) {
    $c = Category::withCount('posts')->find($id);
    if ($c) {
        echo "Category [{$c->id}] {$c->name} -> Posts count: {$c->posts_count}\n";
    }
}
