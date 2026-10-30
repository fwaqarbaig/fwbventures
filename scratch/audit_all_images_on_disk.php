<?php

use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$services = Service::all();
$total = $services->count();
$missing = 0;
$valid = 0;

foreach ($services as $s) {
    $url = $s->featured_image_url;
    if (! $url) {
        $missing++;

        continue;
    }
    // Parse path
    $path = parse_url($url, PHP_URL_PATH);
    $diskPath = public_path(ltrim($path, '/'));
    if (! file_exists($diskPath)) {
        echo "Missing on disk: {$s->slug} -> $url (checked: $diskPath)\n";
        $missing++;
    } else {
        $valid++;
    }
}

echo "Total Services: $total | Valid Existing Images: $valid | Missing: $missing\n";

$posts = Post::all();
$postValid = 0;
$postMissing = 0;
foreach ($posts as $p) {
    $url = $p->featured_image_url;
    if (! $url) {
        $postMissing++;

        continue;
    }
    $path = parse_url($url, PHP_URL_PATH);
    $diskPath = public_path(ltrim($path, '/'));
    if (! file_exists($diskPath)) {
        echo "Missing on disk: {$p->slug} -> $url\n";
        $postMissing++;
    } else {
        $postValid++;
    }
}
echo 'Total Posts: '.$posts->count()." | Valid Existing Images: $postValid | Missing: $postMissing\n";
