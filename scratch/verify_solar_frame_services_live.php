<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

$frameIds = array_unique(array_merge([70, 81, 137], range(171, 248)));
$services = Service::whereIn('id', $frameIds)->get();

echo 'Verifying '.$services->count()." Solar Frame & Mounting Structure services...\n\n";

$missingImages = 0;
$shortPages = 0;
$invalidSchema = 0;

foreach ($services as $s) {
    $wc = str_word_count(strip_tags($s->content));
    $imagePath = public_path(ltrim($s->featured_image, '/'));
    $imageExists = file_exists($imagePath);
    $schemaValid = json_decode($s->schema_markup) !== null;

    if ($wc < 2000) {
        $shortPages++;
        echo "[WARNING: SHORT] ID {$s->id} ({$s->slug}): {$wc} words\n";
    }

    if (! $imageExists) {
        $missingImages++;
        echo "[ERROR: MISSING IMAGE] ID {$s->id} ({$s->slug}): {$s->featured_image}\n";
    }

    if (! $schemaValid) {
        $invalidSchema++;
        echo "[ERROR: INVALID SCHEMA] ID {$s->id} ({$s->slug})\n";
    }
}

echo "\nVerification Summary:\n";
echo 'Total Services Checked: '.$services->count()."\n";
echo 'Pages with <2000 Words: '.$shortPages."\n";
echo 'Pages with Missing Images: '.$missingImages."\n";
echo 'Pages with Invalid Schema: '.$invalidSchema."\n";

if ($shortPages === 0 && $missingImages === 0 && $invalidSchema === 0) {
    echo "STATUS: PERFECT AUDIT PASS! All 81 pages exceed 2,000 words, have valid disk assets, and valid JSON-LD schemas.\n";
}
