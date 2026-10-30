<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$patterns = ['%3000000000%', '%300 0000000%', '%92 300%', '%301 2118111%', '%3012118111%'];
foreach ($patterns as $p) {
    $sCount = DB::table('services')->where('content', 'like', $p)->count();
    $pCount = DB::table('posts')->where('content', 'like', $p)->count();
    $pageCount = DB::table('pages')->where('content', 'like', $p)->count();
    $prodCount = DB::table('products')->where('content', 'like', $p)->count();
    echo "Pattern {$p}: Services={$sCount}, Posts={$pCount}, Pages={$pageCount}, Products={$prodCount}\n";
}
