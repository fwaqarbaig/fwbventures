<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use App\Services\SeoInternalLinker;
use Illuminate\Contracts\Console\Kernel;

$linker = new SeoInternalLinker;

echo "=== TESTING CURRENT matchServiceForPost ===\n";
$samples = Post::where('status', 'published')->inRandomOrder()->take(10)->get();
foreach ($samples as $p) {
    $matched = $linker->matchServiceForPost($p);
    echo sprintf("Post: %-60s => Matched: %s (slug: %s)\n", substr($p->title, 0, 58), $matched?->title ?? 'NULL', $matched?->slug ?? 'NULL');
}
