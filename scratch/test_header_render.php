<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

echo "Testing Header Menu on Home (/)...\n";
$req = Request::create('/', 'GET');
$resp = $kernel->handle($req);
$html = $resp->getContent();

// Check if search form exists in header
$hasSearchInNav = str_contains($html, 'placeholder="Search solar, CCTV, battery..."');
echo 'Search Input Form in Header: '.($hasSearchInNav ? 'YES (STILL PRESENT!)' : 'NO (CLEANLY REMOVED)')."\n";

// Check if Blogs link exists in nav
$hasBlogsInNav = preg_match('/<a[^>]+href="[^"]*\/blog"[^>]*>[\s\S]*?Blogs?[\s\S]*?<\/a>/i', $html, $m);
echo 'Blogs Link in Header Nav: '.($hasBlogsInNav ? 'YES (FOUND: '.trim(strip_tags($m[0])).')' : 'NO (NOT FOUND)')."\n";

// Print all top-level desktop nav links found
preg_match_all('/<nav[^>]*>([\s\S]*?)<\/nav>/i', $html, $navMatches);
if (! empty($navMatches[1])) {
    echo "\nDesktop Nav Content Summary:\n";
    preg_match_all('/<a[^>]+href="([^"]*)"[^>]*>([\s\S]*?)<\/a>/i', $navMatches[1][0], $links);
    foreach ($links[2] as $idx => $linkText) {
        $cleanText = trim(strip_tags($linkText));
        if (! empty($cleanText) && ! str_contains($links[1][$idx], 'whatsapp') && ! str_contains($cleanText, 'View Complete')) {
            echo '  - '.$cleanText.' => '.$links[1][$idx]."\n";
        }
    }
}

echo "\nTesting Header Menu on Blog (/blog)...\n";
$req2 = Request::create('/blog', 'GET');
$resp2 = $kernel->handle($req2);
$html2 = $resp2->getContent();
echo 'Blog Route HTTP Status: '.$resp2->getStatusCode()."\n";
$hasBlogsActive = preg_match('/<a[^>]+href="[^"]*\/blog"[^>]+class="[^"]*text-sky-600[^"]*"[^>]*>/i', $html2);
echo 'Blogs Link Active on /blog: '.($hasBlogsActive ? 'YES (HIGHLIGHTED SKY-600)' : 'NO')."\n";
