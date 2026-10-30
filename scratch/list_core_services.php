<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

echo "=== ALL SERVICES (SLUG, TITLE, CATEGORY) ===\n";
foreach (Service::orderBy('id')->get() as $s) {
    if ($s->id <= 100 || $s->parent_id === null || in_array($s->id, [170, 358, 373])) {
        echo sprintf("ID: %3d | Parent: %4s | Slug: %-45s | Title: %s\n", $s->id, $s->parent_id ?? 'NULL', $s->slug, $s->title);
    }
}
