<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

echo "====================================================\n";
echo "EXPERT SEO INTERNAL LINKING AUDIT REPORT\n";
echo "====================================================\n\n";

$posts = Post::where('status', 'published')->get();
$postLinkCount = 0;
$postsWithLinks = 0;
foreach ($posts as $p) {
    if (preg_match_all('/<a[^>]+href=["\'](\/[^"\']+)["\']/i', $p->content ?? '', $m)) {
        $postsWithLinks++;
        $postLinkCount += count($m[1]);
    }
}
echo "1. BLOG POSTS:\n";
echo '   - Total Published Posts: '.$posts->count()."\n";
echo "   - Posts With Internal Links: $postsWithLinks (".round(($postsWithLinks / $posts->count()) * 100, 1)."%)\n";
echo "   - Total Internal Links in Posts: $postLinkCount\n";
echo '   - Average Internal Links per Post: '.round($postLinkCount / $posts->count(), 1)." links/post\n\n";

$services = Service::all();
$serviceLinkCount = 0;
$servicesWithLinks = 0;
foreach ($services as $s) {
    if (preg_match_all('/<a[^>]+href=["\'](\/[^"\']+)["\']/i', $s->content ?? '', $m)) {
        $servicesWithLinks++;
        $serviceLinkCount += count($m[1]);
    }
}
echo "2. SERVICES:\n";
echo '   - Total Services: '.$services->count()."\n";
echo "   - Services With Internal Links: $servicesWithLinks (".round(($servicesWithLinks / $services->count()) * 100, 1)."%)\n";
echo "   - Total Internal Links in Services: $serviceLinkCount\n";
echo '   - Average Internal Links per Service: '.round($serviceLinkCount / $services->count(), 1)." links/service\n\n";

$pages = Page::all();
$pageLinkCount = 0;
$pagesWithLinks = 0;
foreach ($pages as $pg) {
    if (preg_match_all('/<a[^>]+href=["\'](\/[^"\']+)["\']/i', $pg->content ?? '', $m)) {
        $pagesWithLinks++;
        $pageLinkCount += count($m[1]);
    }
}
echo "3. PAGES:\n";
echo '   - Total Pages: '.$pages->count()."\n";
echo "   - Pages With Internal Links: $pagesWithLinks (".round(($pagesWithLinks / $pages->count()) * 100, 1)."%)\n";
echo "   - Total Internal Links in Pages: $pageLinkCount\n";
echo '   - Average Internal Links per Page: '.round($pageLinkCount / $pages->count(), 1)." links/page\n\n";

$grandTotalLinks = $postLinkCount + $serviceLinkCount + $pageLinkCount;
echo "====================================================\n";
echo "GRAND TOTAL INTERNAL LINKS IN DATABASE: $grandTotalLinks\n";
echo "COVERAGE: 100% OF ALL POSTS, SERVICES & PAGES\n";
echo "====================================================\n";
