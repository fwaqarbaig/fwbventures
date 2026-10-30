<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

$pages = Page::whereIn('slug', ['about-us', 'contact-us', 'services', 'home'])->get();
foreach ($pages as $p) {
    echo "Page: {$p->slug} | Length: ".strlen($p->content ?? '')." bytes\n";
    echo substr(strip_tags($p->content ?? ''), 0, 150)."...\n\n";
}
