<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$services = DB::table('services')->get();

$areaKeywords = [
    'dha', 'clifton', 'gulshan', 'johar', 'nazimabad', 'pechs', 'scheme-33',
    'korangi', 'site', 'port-qasim', 'landhi', 'malir', 'shahrah-e-faisal',
    'north-karachi', 'bahria', 'hyderabad', 'hub', 'federal-b',
];

echo "Checking existing services matching area keywords:\n";
$found = [];
foreach ($services as $s) {
    foreach ($areaKeywords as $kw) {
        if (str_contains(strtolower($s->slug), $kw) || str_contains(strtolower($s->title), $kw)) {
            $found[$s->id] = "ID: {$s->id} | {$s->slug} | {$s->title}";
            break;
        }
    }
}

echo 'Found '.count($found)." area-related services:\n";
foreach ($found as $f) {
    echo "  $f\n";
}
