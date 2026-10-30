<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$slugsToTest = [
    // Bahria Town across all 4 divisions
    'solar-panel-installation-in-bahria-town-karachi',
    'solar-structure-installation-in-bahria-town-karachi',
    'cctv-camera-installation-in-bahria-town-karachi',
    'lithium-battery-in-bahria-town-karachi',

    // DHA across all 4 divisions
    'solar-panel-installation-in-dha-karachi',
    'solar-structure-installation-in-dha-karachi',
    'cctv-camera-installation-in-dha-karachi',
    'lithium-battery-in-dha-karachi',

    // Clifton across all 4 divisions
    'solar-panel-installation-in-clifton-karachi',
    'solar-structure-installation-in-clifton-karachi',
    'cctv-camera-installation-in-clifton-karachi',
    'lithium-battery-in-clifton-karachi',

    // SITE Industrial Area across all 4 divisions
    'solar-panel-installation-in-site-industrial-area-karachi',
    'solar-structure-installation-in-site-industrial-area-karachi',
    'cctv-camera-installation-in-site-industrial-area-karachi',
    'lithium-battery-in-site-industrial-area-karachi',

    // Parent area landing pages
    'solar-installation-areas-karachi',
    'solar-structures-by-application-karachi',
    'cctv-installation-areas-karachi',
    'lithium-battery-supply-areas-karachi',
];

echo "Testing HTTP routes for sample area services:\n";
$allPassed = true;
foreach ($slugsToTest as $slug) {
    $request = Request::create('/service/'.$slug, 'GET');
    $response = app()->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();

    $hasPhone = str_contains($content, '+92 301 2118111');
    $hasLogo = str_contains($content, 'fwb-logo.svg');
    $wordCount = str_word_count(strip_tags($content));

    if ($status === 200 && $hasPhone && $hasLogo) {
        echo "  [PASS 200] /service/{$slug} (Total HTML text words: {$wordCount})\n";
    } else {
        echo "  [FAIL {$status}] /service/{$slug} (Phone: ".($hasPhone ? 'Y' : 'N').', Logo: '.($hasLogo ? 'Y' : 'N').")\n";
        $allPassed = false;
    }
}

if ($allPassed) {
    echo "\nAll sample HTTP routes verified successfully!\n";
} else {
    echo "\nWARNING: Some routes failed verification.\n";
}
