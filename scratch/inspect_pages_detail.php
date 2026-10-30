<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

$pages = Page::all();
echo 'Total pages: '.$pages->count()."\n\n";

foreach ($pages as $p) {
    $hasBodyImg = preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->content ?? '', $m);
    $feat = $p->featured_image;
    echo sprintf("ID: %3d | Slug: %-45s | Title: %-40s | Feat: %-45s | BodyImg: %s\n",
        $p->id,
        substr($p->slug, 0, 45),
        substr($p->title, 0, 40),
        substr($feat ?? 'NONE', 0, 45),
        $hasBodyImg ? 'YES ('.substr($m[1], 0, 30).')' : 'NO'
    );
}
