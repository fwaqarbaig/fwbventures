<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

function getClusterKeywords(string $cluster): array
{
    if ($cluster === 'cctv') {
        return [
            'CCTV camera installation' => ['url' => '/service/cctv-services-installation-karachi', 'title' => 'CCTV Installation Services in Karachi', 'used' => false],
            'IP security cameras' => ['url' => '/service/cctv-cameras-karachi', 'title' => 'Commercial & Residential IP Security Cameras', 'used' => false],
            'IP camera' => ['url' => '/service/cctv-cameras-karachi', 'title' => 'IP Security Cameras in Karachi', 'used' => false],
            'security cameras' => ['url' => '/service/cctv-cameras-karachi', 'title' => 'Security Cameras in Karachi', 'used' => false],
            'CCTV camera price' => ['url' => '/service/cctv-camera-prices-karachi', 'title' => 'CCTV Camera Prices in Karachi', 'used' => false],
            'CCTV surveillance' => ['url' => '/service/cctv-services-karachi', 'title' => 'Turnkey CCTV Surveillance Services', 'used' => false],
            'video surveillance' => ['url' => '/service/cctv-services-karachi', 'title' => 'Video Surveillance Services Karachi', 'used' => false],
            'load shedding' => ['url' => '/service/residential-lithium-batteries-karachi', 'title' => 'LiFePO4 Lithium Battery Backup for CCTV & UPS', 'used' => false],
            'solar power' => ['url' => '/service/solar-installation-karachi', 'title' => 'Turnkey Solar Installation in Karachi', 'used' => false],
            'site survey' => ['url' => '/contact-us', 'title' => 'Request Free Karachi Security Site Survey', 'used' => false],
        ];
    }

    if ($cluster === 'lithium') {
        return [
            'lithium batteries in Karachi' => ['url' => '/service/lithium-batteries-karachi', 'title' => 'Grade-A LiFePO4 Lithium Batteries in Karachi', 'used' => false],
            'lithium battery' => ['url' => '/service/lithium-batteries-karachi', 'title' => 'Grade-A LiFePO4 Lithium Batteries in Karachi', 'used' => false],
            'LiFePO4 battery' => ['url' => '/service/lithium-batteries-karachi', 'title' => 'Grade-A LiFePO4 Battery Cells', 'used' => false],
            'residential lithium' => ['url' => '/service/residential-lithium-batteries-karachi', 'title' => 'Residential LiFePO4 Battery Storage', 'used' => false],
            'Powerwall' => ['url' => '/service/residential-lithium-batteries-karachi', 'title' => 'Wall-Mounted Solar Powerwall Batteries', 'used' => false],
            'commercial lithium' => ['url' => '/service/commercial-industrial-lithium-batteries-karachi', 'title' => 'Commercial & Industrial Lithium Energy Storage', 'used' => false],
            'energy storage system' => ['url' => '/service/commercial-industrial-lithium-batteries-karachi', 'title' => 'Commercial Battery Energy Storage Systems (BESS)', 'used' => false],
            'lithium battery price' => ['url' => '/service/lithium-battery-prices-karachi', 'title' => 'Lithium Battery Prices in Karachi', 'used' => false],
            'solar system' => ['url' => '/service/solar-panel-installation-karachi', 'title' => 'Turnkey Solar Panel Installation Karachi', 'used' => false],
            'hybrid inverter' => ['url' => '/service/solar-installation-karachi', 'title' => 'Smart Hybrid Solar Inverters', 'used' => false],
            'mounting structure' => ['url' => '/service/solar-frame-structure-karachi', 'title' => 'Hot-Dip Galvanized Solar Mounting Structures', 'used' => false],
            'site survey' => ['url' => '/contact-us', 'title' => 'Request Free Energy Storage Sizing Audit', 'used' => false],
        ];
    }

    if ($cluster === 'structure') {
        return [
            'solar frame structure' => ['url' => '/service/solar-frame-structure-karachi', 'title' => 'Solar Frame Structures in Karachi', 'used' => false],
            'solar mounting structures' => ['url' => '/service/solar-mounting-structures-karachi', 'title' => 'Rooftop & Ground Solar Mounting Structures', 'used' => false],
            'mounting structure' => ['url' => '/service/solar-frame-structure-karachi', 'title' => 'Hot-Dip Galvanized Solar Mounting Structures', 'used' => false],
            'hot-dip galvanized' => ['url' => '/service/solar-structure-materials-karachi', 'title' => 'ASTM A123 Hot-Dip Galvanizing Standards', 'used' => false],
            'ASTM A123' => ['url' => '/service/solar-structure-materials-karachi', 'title' => 'ASTM A123 Anti-Corrosion Galvanized Steel', 'used' => false],
            'solar pergola' => ['url' => '/service/solar-structure-types-karachi', 'title' => 'Elevated Rooftop Solar Pergola Structures', 'used' => false],
            'elevated structure' => ['url' => '/service/solar-structure-types-karachi', 'title' => 'Elevated L2 & L3 Solar Structures', 'used' => false],
            'solar carport' => ['url' => '/service/solar-mounting-structures-karachi', 'title' => 'Commercial Solar Carport Parking Structures', 'used' => false],
            'solar farm structure' => ['url' => '/service/solar-farm-structure-in-karachi', 'title' => 'Ground-Mounted Solar Farm Structures', 'used' => false],
            'solar panel installation' => ['url' => '/service/solar-panel-installation-karachi', 'title' => 'Turnkey Rooftop Solar Panel Installation', 'used' => false],
            'rooftop solar' => ['url' => '/service/solar-installation-karachi', 'title' => 'Rooftop Solar PV Systems Karachi', 'used' => false],
            'lithium battery' => ['url' => '/service/lithium-batteries-karachi', 'title' => 'LiFePO4 Lithium Battery Storage Systems', 'used' => false],
            'site survey' => ['url' => '/contact-us', 'title' => 'Request Free On-Site Roof Load & Shading Survey', 'used' => false],
        ];
    }

    // Default: Solar Installation
    return [
        'solar panel installation' => ['url' => '/service/solar-panel-installation-karachi', 'title' => 'Turnkey Solar Panel Installation in Karachi', 'used' => false],
        'solar installation' => ['url' => '/service/solar-installation-karachi', 'title' => 'Solar Installation in Karachi', 'used' => false],
        'net-metering' => ['url' => '/service/solar-solutions-karachi', 'title' => 'K-Electric Net-Metering Turnkey Solutions', 'used' => false],
        'net metering' => ['url' => '/service/solar-solutions-karachi', 'title' => 'K-Electric Net-Metering Turnkey Solutions', 'used' => false],
        'K-Electric' => ['url' => '/service/solar-solutions-karachi', 'title' => 'K-Electric Grid Connection & Net-Metering', 'used' => false],
        'on-grid' => ['url' => '/service/solar-systems-by-type-karachi', 'title' => 'On-Grid Solar Systems in Karachi', 'used' => false],
        'hybrid solar' => ['url' => '/service/solar-systems-by-type-karachi', 'title' => 'Hybrid Solar Systems with Battery Storage', 'used' => false],
        'solar system price' => ['url' => '/service/solar-system-prices-karachi', 'title' => 'Solar System Prices & ROI in Karachi', 'used' => false],
        'solar mounting structure' => ['url' => '/service/solar-frame-structure-karachi', 'title' => 'Hot-Dip Galvanized Solar Mounting Structures', 'used' => false],
        'mounting structure' => ['url' => '/service/solar-frame-structure-karachi', 'title' => 'Hot-Dip Galvanized Solar Mounting Structures', 'used' => false],
        'lithium battery' => ['url' => '/service/lithium-batteries-karachi', 'title' => 'LiFePO4 Solar Lithium Battery Storage', 'used' => false],
        'site survey' => ['url' => '/contact-us', 'title' => 'Request Free Karachi Solar Roof & Load Survey', 'used' => false],
    ];
}

function injectInParagraphLinks(string $html, array &$keywordsToLinks): string
{
    return preg_replace_callback('/<p>(.*?)<\/p>/is', function ($pMatch) use (&$keywordsToLinks) {
        $pContent = $pMatch[1];

        if (substr_count($pContent, '<a ') >= 2) {
            return $pMatch[0];
        }

        foreach ($keywordsToLinks as $kw => $linkData) {
            if ($linkData['used']) {
                continue;
            }

            $parts = preg_split('/(<[^>]+>)/i', $pContent, -1, PREG_SPLIT_DELIM_CAPTURE);
            $replaced = false;

            for ($i = 0; $i < count($parts); $i++) {
                if (preg_match('/^<a\b/i', $parts[$i])) {
                    while ($i < count($parts) && ! preg_match('/^<\/a>/i', $parts[$i])) {
                        $i++;
                    }

                    continue;
                }

                if (preg_match('/^<[^>]+>$/', $parts[$i])) {
                    continue;
                }

                $pattern = '/\b('.preg_quote($kw, '/').')\b/i';
                if (preg_match($pattern, $parts[$i])) {
                    $replacement = sprintf(
                        '<a href="%s" class="text-sky-600 hover:text-sky-800 font-semibold underline" title="%s">$1</a>',
                        htmlspecialchars($linkData['url']),
                        htmlspecialchars($linkData['title'])
                    );
                    $parts[$i] = preg_replace($pattern, $replacement, $parts[$i], 1);
                    $keywordsToLinks[$kw]['used'] = true;
                    $replaced = true;
                    break;
                }
            }

            if ($replaced) {
                $pContent = implode('', $parts);
            }
        }

        return "<p>{$pContent}</p>";
    }, $html);
}

echo "====================================================================\n";
echo "EXPERT SEO INTERNAL LINKING: IN-PARAGRAPH & CLUSTER SILOS\n";
echo "====================================================================\n\n";

// 1. UPDATE POSTS (320 published)
echo "1. Processing 320 published Posts...\n";
$posts = Post::where('status', 'published')->get();
$totalPostLinksInjected = 0;
foreach ($posts as $post) {
    $t = strtolower($post->title.' '.$post->slug);
    $cat = strtolower($post->categories->first()?->name ?? '');

    $cluster = 'solar';
    if (str_contains($t, 'cctv') || str_contains($t, 'camera') || str_contains($t, 'nvr') || str_contains($t, 'dvr') || str_contains($cat, 'cctv')) {
        $cluster = 'cctv';
    } elseif (str_contains($t, 'lithium') || str_contains($t, 'battery') || str_contains($t, 'lifepo4') || str_contains($cat, 'lithium')) {
        $cluster = 'lithium';
    } elseif (str_contains($t, 'structure') || str_contains($t, 'frame') || str_contains($t, 'mounting') || str_contains($t, 'carport') || str_contains($t, 'pergola') || str_contains($cat, 'frame')) {
        $cluster = 'structure';
    }

    $kws = getClusterKeywords($cluster);
    $post->content = injectInParagraphLinks($post->content ?? '', $kws);

    foreach ($kws as $kw => $kd) {
        if ($kd['used']) {
            $totalPostLinksInjected++;
        }
    }

    $post->timestamps = false;
    $post->save();
}
echo "   Successfully injected $totalPostLinksInjected in-paragraph contextual links into 320 Posts!\n\n";

// 2. UPDATE SERVICES (319 total)
echo "2. Processing 319 Services...\n";
$services = Service::all();
$totalServiceLinksInjected = 0;
foreach ($services as $service) {
    $t = strtolower($service->title.' '.$service->slug);

    $cluster = 'solar';
    if ($service->isCctv()) {
        $cluster = 'cctv';
    } elseif ($service->isLithiumBattery()) {
        $cluster = 'lithium';
    } elseif ($service->isSolarFrame()) {
        $cluster = 'structure';
    }

    $kws = getClusterKeywords($cluster);
    $service->content = injectInParagraphLinks($service->content ?? '', $kws);

    foreach ($kws as $kw => $kd) {
        if ($kd['used']) {
            $totalServiceLinksInjected++;
        }
    }

    $service->timestamps = false;
    $service->save();
}
echo "   Successfully injected $totalServiceLinksInjected in-paragraph contextual links into 319 Services!\n\n";

// 3. UPDATE PAGES (61 total)
echo "3. Processing 61 Pages...\n";
$pages = Page::all();
$totalPagesLinksInjected = 0;
foreach ($pages as $page) {
    $t = strtolower($page->title.' '.$page->slug);
    $cluster = 'solar';
    if (str_contains($t, 'cctv') || str_contains($t, 'camera')) {
        $cluster = 'cctv';
    } elseif (str_contains($t, 'generator') || str_contains($t, 'power')) {
        $cluster = 'solar';
    }

    $kws = getClusterKeywords($cluster);
    $page->content = injectInParagraphLinks($page->content ?? '', $kws);

    foreach ($kws as $kw => $kd) {
        if ($kd['used']) {
            $totalPagesLinksInjected++;
        }
    }

    $page->timestamps = false;
    $page->save();
}
echo "   Successfully injected $totalPagesLinksInjected in-paragraph contextual links into 61 Pages!\n\n";

echo "=== EXPERT SEO INTERNAL LINKING COMPLETED SUCCESSFULLY ===\n";
