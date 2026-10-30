<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

echo 'Total Posts: '.Post::count()."\n";
echo "Categories and Post Counts:\n";
foreach (Category::all() as $cat) {
    echo "ID {$cat->id} | {$cat->name} (slug: {$cat->slug}) | Posts: ".$cat->posts()->count()."\n";
}
