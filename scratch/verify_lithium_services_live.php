<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

$lithiumIds = array_merge([72, 92, 93, 94], range(300, 347));
$services = Service::whereIn('id', $lithiumIds)->get();

echo 'Verifying '.$services->count()." Lithium Battery services...\n\n";

$missingImages = 0;
$shortPages = 0;

foreach ($services as $s) {
    $wc = str_word_count(strip_tags($s->content));
    $imagePath = public_path(ltrim($s->featured_image, '/'));
    $imageExists = file_exists($imagePath);

    if ($wc < 2000) {
        $shortPages++;
        echo "[WARNING: SHORT] ID {$s->id} ({$s->slug}): {$wc} words\n";
    }

    if (! $imageExists) {
        $missingImages++;
        echo "[ERROR: MISSING IMAGE] ID {$s->id} ({$s->slug}): {$s->featured_image}\n";
    }
}

echo "\nVerification Summary:\n";
echo 'Total Services Checked: '.$services->count()."\n";
echo 'Pages with <2000 Words: '.$shortPages."\n";
echo 'Pages with Missing Images: '.$missingImages."\n";

if ($shortPages === 0 && $missingImages === 0) {
    echo "STATUS: PERFECT AUDIT PASS! All 52 pages exceed 2,000 words and have valid disk assets.\n";
}
