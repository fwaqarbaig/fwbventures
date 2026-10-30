<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

echo '=== ALL PAGES IN DATABASE ('.Page::count().") ===\n";
foreach (Page::all() as $p) {
    $hasFeat = ! empty($p->featured_image) ? $p->featured_image : 'NONE';
    $hasBody = preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '', $m) ? $m[1] : 'NONE';
    echo "ID {$p->id} | slug: '{$p->slug}' | title: '{$p->title}' | Feat: {$hasFeat} | Body: {$hasBody}\n";
}
