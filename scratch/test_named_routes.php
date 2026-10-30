<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$samplePost = Post::where('status', 'published')->first();
$sampleService = Service::first();
$samplePage = Page::where('slug', 'about-us')->first();

$urls = [
    '/',
    route('post.show', $samplePost->slug),
    route('service.show', $sampleService->slug),
    route('page.show', $samplePage->slug),
];

echo "=== TESTING EXACT NAMED ROUTES ===\n";
foreach ($urls as $url) {
    $request = Request::create($url, 'GET');
    $response = $app->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    $imgCount = preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $matches);
    echo sprintf(
        "Status: %d | Imgs: %2d | %s\n",
        $status,
        $imgCount,
        $url
    );
}
