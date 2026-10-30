<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

echo "=== INSPECT ALL 61 PAGES ===\n";
foreach (Page::all() as $p) {
    $hasBodyImg = (bool) preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '');
    echo sprintf(
        "ID: %2d | Slug: %-35s | Feat: %-55s | BodyImg: %-3s | Title: %s\n",
        $p->id,
        $p->slug,
        $p->featured_image ?? 'NULL',
        $hasBodyImg ? 'YES' : 'NO',
        substr($p->title, 0, 40)
    );
}
