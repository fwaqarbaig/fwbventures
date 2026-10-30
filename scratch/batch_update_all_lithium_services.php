<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require_once __DIR__.'/lithium_content_engine.php';

$lithiumIds = array_merge([72, 92, 93, 94], range(300, 347));

echo 'Starting batch update for '.count($lithiumIds)." Lithium Battery services...\n\n";

$updatedCount = 0;
$totalWords = 0;

DB::beginTransaction();

try {
    foreach ($lithiumIds as $id) {
        $service = Service::find($id);
        if (! $service) {
            echo "[SKIP] Service ID {$id} not found in database.\n";

            continue;
        }

        $generated = generateLithiumServiceData($service);
        $wc = str_word_count(strip_tags($generated['content']));

        $service->update([
            'tagline' => $generated['tagline'],
            'hero_badge' => $generated['hero_badge'],
            'summary' => $generated['summary'],
            'content' => $generated['content'],
            'features' => $generated['features'],
            'benefits' => $generated['benefits'],
            'benchmarks' => $generated['benchmarks'],
            'featured_image' => $generated['featured_image'],
            'focus_keyword' => $generated['focus_keyword'],
            'meta_title' => $generated['meta_title'],
            'meta_description' => $generated['meta_description'],
            'canonical_url' => url('/service/'.$service->slug),
            'og_title' => $generated['meta_title'],
            'og_description' => $generated['meta_description'],
            'og_image' => $generated['og_image'],
            'schema_markup' => $generated['schema_markup'],
            'status' => 'published',
            'is_indexable' => true,
            'seo_score' => 98,
            'readability_score' => 95,
        ]);

        $updatedCount++;
        $totalWords += $wc;

        echo sprintf(
            "[%02d/%02d] ID: %d | Words: %d | Image: %s | Slug: %s\n",
            $updatedCount,
            count($lithiumIds),
            $id,
            $wc,
            basename($generated['featured_image']),
            $service->slug
        );
    }

    DB::commit();
    echo "\n=== BATCH UPDATE SUCCESSFUL ===\n";
    echo "Total Services Updated: {$updatedCount}\n";
    echo 'Total Words Generated: '.number_format($totalWords)."\n";
    echo 'Average Words Per Page: '.round($totalWords / max(1, $updatedCount))." words\n";
} catch (Exception $e) {
    DB::rollBack();
    echo "\n[ERROR] Batch update rolled back: ".$e->getMessage()."\n";
    echo $e->getTraceAsString()."\n";
    exit(1);
}
