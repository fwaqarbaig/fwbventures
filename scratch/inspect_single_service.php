<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$s = DB::table('services')->where('slug', 'solar-panel-installation-in-dha-karachi')->first();
if ($s) {
    foreach ($s as $k => $v) {
        if ($k === 'content') {
            echo "{$k}: ".strlen($v).' chars, '.str_word_count(strip_tags($v))." words\n";
        } else {
            echo "{$k}: ".substr((string) $v, 0, 80)."\n";
        }
    }
}
