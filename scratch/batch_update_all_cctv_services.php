<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require_once __DIR__.'/cctv_content_engine.php';

// Find all CCTV Services in DB
$cctvServices = Service::where('title', 'like', '%CCTV%')
    ->orWhere('slug', 'like', '%cctv%')
    ->orWhere('title', 'like', '%Camera%')
    ->orWhere('focus_keyword', 'like', '%cctv%')
    ->get();

echo 'Starting Batch Update for '.$cctvServices->count()." CCTV Services...\n\n";

$updatedCount = 0;
$totalWords = 0;
$minWords = 999999;
$maxWords = 0;

foreach ($cctvServices as $service) {
    $data = generateCctvServiceData($service);
    $wc = str_word_count(strip_tags($data['content']));

    $service->title = $data['title'];
    $service->tagline = $data['tagline'];
    $service->hero_badge = $data['hero_badge'];
    $service->summary = $data['summary'];
    $service->content = $data['content'];
    $service->features = $data['features'];
    $service->benefits = $data['benefits'];
    $service->benchmarks = $data['benchmarks'];
    $service->focus_keyword = $data['focus_keyword'];
    $service->meta_title = $data['meta_title'];
    $service->meta_description = $data['meta_description'];
    $service->meta_keywords = $data['meta_keywords'];
    $service->og_title = $data['meta_title'];
    $service->og_description = $data['meta_description'];
    $service->canonical_url = $data['canonical_url'];
    $service->seo_score = $data['seo_score'];
    $service->readability_score = $data['readability_score'];
    $service->is_indexable = true;
    $service->status = 'published';

    $service->save();

    $updatedCount++;
    $totalWords += $wc;
    if ($wc < $minWords) {
        $minWords = $wc;
    }
    if ($wc > $maxWords) {
        $maxWords = $wc;
    }

    echo sprintf("[%02d/%02d] Updated [%d] %s -> %d words (Meta: %s)\n",
        $updatedCount, $cctvServices->count(), $service->id, $service->slug, $wc, $service->meta_title);
}

$avgWords = $updatedCount > 0 ? round($totalWords / $updatedCount) : 0;
echo "\n=======================================================\n";
echo "SUCCESSFULLY UPDATED $updatedCount CCTV SERVICES!\n";
echo 'Total Content Words Written: '.number_format($totalWords)."\n";
echo 'Average Words per Page: '.number_format($avgWords)."\n";
echo 'Min Words: '.number_format($minWords).' | Max Words: '.number_format($maxWords)."\n";
echo "=======================================================\n";
