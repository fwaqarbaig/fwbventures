<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

$searches = [
    'on-grid',
    'net-metering',
    'tier-1',
    'cost',
    'astm',
    'fabricat',
    'lifepo4',
    'lithium-battery-price',
    'lithium-battery-in-karachi',
];

echo "=== FIND EXACT BLOG SLUGS ===\n";
foreach ($searches as $s) {
    $p = Post::where('slug', 'like', "%{$s}%")->first();
    if ($p) {
        echo sprintf("%-25s => slug: /%-55s (title: %s)\n", $s, $p->slug, $p->title);
    } else {
        echo sprintf("%-25s => NOT FOUND\n", $s);
    }
}
