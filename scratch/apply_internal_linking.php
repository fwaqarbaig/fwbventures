<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

function buildPostLinkingHub(Post $post): string
{
    $t = strtolower($post->title.' '.$post->slug);
    $category = $post->categories->first()?->name ?? '';
    $cat = strtolower($category);

    if (str_contains($t, 'cctv') || str_contains($t, 'camera') || str_contains($t, 'nvr') || str_contains($t, 'dvr') || str_contains($cat, 'cctv') || str_contains($cat, 'security')) {
        $pillar = [
            'title' => 'CCTV Security Surveillance Services in Karachi',
            'url' => '/service/cctv-services-karachi',
            'desc' => 'Turnkey commercial and residential CCTV surveillance, IP cameras, NVR storage & AMC.',
        ];
        $relatedServices = [
            ['title' => 'CCTV Installation Services in Karachi', 'url' => '/service/cctv-services-installation-karachi'],
            ['title' => 'CCTV Cameras & 4K IP Systems', 'url' => '/service/cctv-cameras-karachi'],
            ['title' => 'CCTV Camera Prices & Packages Karachi', 'url' => '/service/cctv-camera-prices-karachi'],
            ['title' => 'Home & Commercial Security Solutions', 'url' => '/service/cctv-solutions-karachi'],
            ['title' => 'CCTV Installation Areas across Karachi', 'url' => '/service/cctv-installation-areas-karachi'],
            ['title' => 'LiFePO4 Lithium Battery Backup for CCTV & UPS', 'url' => '/service/lithium-batteries-karachi'],
        ];
        $relatedGuides = [
            ['title' => 'CCTV DORI Standard Explained: Face & License Plate ID', 'url' => '/cctv-dori-standard-explained-megapixels-face-identification-karachi'],
            ['title' => 'ColorVu vs Traditional IR Night Vision Comparison', 'url' => '/full-color-night-vision-cctv-colorvu-vs-traditional-ir-karachi'],
            ['title' => 'IP CCTV Cameras vs Analog HD Systems in Pakistan', 'url' => '/ip-cctv-cameras-vs-analog-hd-pakistan-comparison'],
            ['title' => 'Complete CCTV Camera Buying Guide for Karachi Homes', 'url' => '/cctv-camera-price-in-karachi-complete-buying-guide'],
        ];
    } elseif (str_contains($t, 'lithium') || str_contains($t, 'battery') || str_contains($t, 'lifepo4') || str_contains($t, 'powerwall') || str_contains($t, 'ess') || str_contains($cat, 'lithium') || str_contains($cat, 'battery')) {
        $pillar = [
            'title' => 'Grade-A LiFePO4 Lithium Batteries in Karachi',
            'url' => '/service/lithium-batteries-karachi',
            'desc' => 'High-cycle 12V, 24V, 48V Powerwalls, server racks & commercial BESS systems with smart BMS.',
        ];
        $relatedServices = [
            ['title' => 'Residential Lithium Batteries in Karachi (5kWh - 10kWh)', 'url' => '/service/residential-lithium-batteries-karachi'],
            ['title' => 'Commercial & Industrial Lithium Energy Storage (10kWh - 200kWh)', 'url' => '/service/commercial-industrial-lithium-batteries-karachi'],
            ['title' => 'Lithium Battery Prices & Wholesale Rates Karachi', 'url' => '/service/lithium-battery-prices-karachi'],
            ['title' => 'Lithium Battery Supply & Installation Areas in Karachi', 'url' => '/service/lithium-battery-supply-areas-karachi'],
            ['title' => 'Turnkey Solar Panel Installation in Karachi', 'url' => '/service/solar-installation-karachi'],
            ['title' => 'ASTM A123 Hot-Dip Galvanized Solar Frames', 'url' => '/service/solar-frame-structure-karachi'],
        ];
        $relatedGuides = [
            ['title' => 'LiFePO4 Lithium vs Tubular Lead-Acid 10-Year Lifecycle ROI', 'url' => '/lifepo4-lithium-vs-tubular-batteries-karachi-comparison'],
            ['title' => 'Smart BMS & Active Cell Balancing for Energy Storage in Karachi', 'url' => '/smart-bms-explained-active-cell-balancing-lithium-batteries-karachi'],
            ['title' => 'Complete LiFePO4 Lithium Battery Buyer\'s Guide Karachi', 'url' => '/lithium-battery-in-karachi-complete-buyers-guide'],
            ['title' => 'Solar Lithium Battery Integration Guide in Pakistan', 'url' => '/solar-lithium-battery-integration-guide-pakistan'],
        ];
    } elseif (str_contains($t, 'structure') || str_contains($t, 'frame') || str_contains($t, 'mounting') || str_contains($t, 'carport') || str_contains($t, 'canopy') || str_contains($t, 'pergola') || str_contains($t, 'frp') || str_contains($cat, 'frame') || str_contains($cat, 'structure')) {
        $pillar = [
            'title' => 'Solar Frame & Mounting Structures in Karachi',
            'url' => '/service/solar-frame-structure-karachi',
            'desc' => 'Custom engineered hot-dip galvanized ASTM A123 elevated pergolas, carports & coastal ground mounts.',
        ];
        $relatedServices = [
            ['title' => 'Solar Mounting Structures in Karachi (Rooftop & Ground)', 'url' => '/service/solar-mounting-structures-karachi'],
            ['title' => 'Solar Structure Types (L2, L3, Elevated Pergolas)', 'url' => '/service/solar-structure-types-karachi'],
            ['title' => 'Solar Structure Materials & ASTM A123 Galvanizing', 'url' => '/service/solar-structure-materials-karachi'],
            ['title' => 'Solar Farm Structure in Karachi', 'url' => '/service/solar-farm-structure-in-karachi'],
            ['title' => 'Commercial & Rooftop Solar Panel Installation', 'url' => '/service/solar-installation-karachi'],
            ['title' => 'Grade-A LiFePO4 Lithium Battery Storage Systems', 'url' => '/service/lithium-batteries-karachi'],
        ];
        $relatedGuides = [
            ['title' => 'Solar Pergola vs Ground-Mount Structures for Karachi Rooftops', 'url' => '/solar-pergola-vs-ground-mount-structures-karachi-rooftop'],
            ['title' => 'Elevated vs Non-Elevated Solar Panel Structures in Karachi', 'url' => '/elevated-vs-non-elevated-solar-panel-structures-in-karachi'],
            ['title' => 'How to Choose a Solar Mounting Structure for Karachi Coastal Weather', 'url' => '/how-to-choose-a-solar-mounting-structure-for-karachi-weather'],
            ['title' => 'Rooftop Solar Mounting Structures for Commercial Buildings', 'url' => '/rooftop-solar-mounting-structures-for-commercial-buildings-in-karachi'],
        ];
    } else {
        $pillar = [
            'title' => 'Turnkey Solar Panel Installation in Karachi',
            'url' => '/service/solar-installation-karachi',
            'desc' => 'Certified EPC on-grid, hybrid, and commercial solar systems with K-Electric net-metering approval.',
        ];
        $relatedServices = [
            ['title' => 'Solar Panel Installation Services in Karachi', 'url' => '/service/solar-panel-installation-karachi'],
            ['title' => 'Solar Solutions & K-Electric Net-Metering Turnkey', 'url' => '/service/solar-solutions-karachi'],
            ['title' => 'Solar Systems by Type (On-Grid, Hybrid, Off-Grid)', 'url' => '/service/solar-systems-by-type-karachi'],
            ['title' => 'Solar System Prices & ROI in Karachi', 'url' => '/service/solar-system-prices-karachi'],
            ['title' => 'Hot-Dip Galvanized Solar Mounting Frames', 'url' => '/service/solar-frame-structure-karachi'],
            ['title' => 'LiFePO4 Solar Lithium Battery Storage Solutions', 'url' => '/service/lithium-batteries-karachi'],
        ];
        $relatedGuides = [
            ['title' => 'K-Electric Net Metering Complete Step-by-Step Guide', 'url' => '/k-electric-net-metering-complete-guide-karachi'],
            ['title' => 'Coastal Salt Corrosion Protection for Solar in DHA & Clifton', 'url' => '/coastal-salt-corrosion-rooftop-solar-dha-clifton-karachi'],
            ['title' => 'How to Size a Solar System in Karachi: Loads, Roof & Backup', 'url' => '/how-to-size-solar-system-karachi-inverter-ac-calculation'],
            ['title' => 'On-Grid vs Off-Grid Solar Systems: Which Is Better in Karachi?', 'url' => '/on-grid-vs-off-grid-solar-systems-which-is-better-in-karachi'],
        ];
    }

    $html = "\n\n<!-- SEO Internal Linking Hub -->\n".
        "<section class=\"not-prose my-12 p-6 sm:p-8 rounded-3xl bg-slate-900 text-white border border-sky-500/30 shadow-xl\">\n".
        "    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-400 mb-2\">\n".
        "        <i data-lucide=\"network\" class=\"w-4 h-4\"></i>\n".
        "        <span>FWB Ventures Internal Knowledge &amp; Engineering Directory</span>\n".
        "    </div>\n".
        "    <h3 class=\"text-xl sm:text-2xl font-black font-display text-white mb-2\">\n".
        "        Explore Verified Karachi Engineering Services &amp; Technical Guides\n".
        "    </h3>\n".
        "    <p class=\"text-xs sm:text-sm text-slate-300 leading-relaxed mb-6\">\n".
        "        Connect with FWB Ventures' certified engineering divisions for turnkey site inspections, hardware specifications, and project quotations across Karachi.\n".
        "    </p>\n\n".
        "    <div class=\"grid grid-cols-1 md:grid-cols-2 gap-4 pt-2\">\n".
        "        <div class=\"p-4 rounded-2xl bg-slate-800/90 border border-slate-700/80 space-y-3\">\n".
        "            <div class=\"text-xs font-bold uppercase text-sky-400 flex items-center gap-1.5\">\n".
        "                <i data-lucide=\"layers\" class=\"w-3.5 h-3.5\"></i> Core Engineering Division\n".
        "            </div>\n".
        "            <a href=\"{$pillar['url']}\" class=\"block text-sm font-bold text-white hover:text-sky-400 transition leading-snug\">\n".
        "                {$pillar['title']} &rarr;\n".
        "            </a>\n".
        "            <p class=\"text-xs text-slate-400 leading-relaxed\">{$pillar['desc']}</p>\n".
        "            <div class=\"pt-2 border-t border-slate-700/60 space-y-1.5\">\n";

    foreach (array_slice($relatedServices, 0, 4) as $rs) {
        $html .= "                <a href=\"{$rs['url']}\" class=\"block text-xs font-semibold text-slate-300 hover:text-sky-300 transition truncate\">&bull; {$rs['title']}</a>\n";
    }

    $html .= "            </div>\n".
        "        </div>\n\n".
        "        <div class=\"p-4 rounded-2xl bg-slate-800/90 border border-slate-700/80 space-y-3\">\n".
        "            <div class=\"text-xs font-bold uppercase text-emerald-400 flex items-center gap-1.5\">\n".
        "                <i data-lucide=\"book-open\" class=\"w-3.5 h-3.5\"></i> Related Technical Research &amp; Guides\n".
        "            </div>\n".
        "            <div class=\"space-y-2.5 pt-1\">\n";

    foreach ($relatedGuides as $rg) {
        $html .= "                <a href=\"{$rg['url']}\" class=\"block text-xs font-semibold text-slate-200 hover:text-sky-300 transition leading-snug p-2 rounded-xl bg-slate-900/60 border border-slate-700/40 hover:border-sky-500/40\">\n".
            "                    {$rg['title']} &rarr;\n".
            "                </a>\n";
    }

    $html .= "            </div>\n".
        "            <div class=\"pt-2 border-t border-slate-700/60 flex items-center justify-between text-[11px] text-slate-400\">\n".
        "                <a href=\"/blog\" class=\"text-sky-400 hover:underline font-bold\">Browse 320+ Karachi Guides &rarr;</a>\n".
        "                <a href=\"/contact-us\" class=\"text-emerald-400 hover:underline font-bold\">Free Site Survey &rarr;</a>\n".
        "            </div>\n".
        "        </div>\n".
        "    </div>\n".
        "</section>\n";

    return $html;
}

function buildServiceLinkingHub(Service $service): string
{
    $slug = $service->slug;
    $title = $service->title;

    $isSolar = $service->isSolar();
    $isFrame = $service->isSolarFrame();
    $isCctv = $service->isCctv();
    $isLithium = $service->isLithiumBattery();

    $areaMatch = null;
    $areas = ['bahria-town', 'dha', 'clifton', 'gulshan-e-iqbal', 'gulistan-e-johar', 'north-nazimabad', 'pechs', 'scheme-33', 'korangi', 'site-industrial', 'port-qasim', 'malir', 'north-karachi', 'shahrah-e-faisal'];
    foreach ($areas as $a) {
        if (str_contains($slug, $a)) {
            $areaMatch = $a;
            break;
        }
    }

    $areaTitle = $areaMatch ? ucwords(str_replace('-', ' ', $areaMatch)) : 'Karachi City-Wide';

    $html = "\n\n<!-- Interconnected Engineering Directory -->\n".
        "<div class=\"not-prose my-10 p-6 sm:p-8 rounded-3xl bg-slate-900 text-white border border-slate-800 shadow-xl space-y-5\">\n".
        "    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-400 border-b border-slate-800 pb-3\">\n".
        "        <i data-lucide=\"network\" class=\"w-4 h-4\"></i>\n".
        "        <span>FWB Ventures Interconnected Engineering Network &bull; {$areaTitle}</span>\n".
        "    </div>\n".
        "    <div class=\"space-y-1.5\">\n".
        "        <h4 class=\"text-lg sm:text-xl font-black text-white font-display\">\n".
        "            Complete Energy, Structural &amp; Security Engineering Solutions\n".
        "        </h4>\n".
        "        <p class=\"text-xs text-slate-300 leading-relaxed\">\n".
        "            FWB Ventures operates 4 dedicated engineering divisions in Karachi. Pair this service with our integrated turnkey hardware:\n".
        "        </p>\n".
        "    </div>\n\n".
        "    <div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 pt-1\">\n";

    $pillars = [
        [
            'name' => 'Solar Installation',
            'url' => '/service/solar-installation-karachi',
            'desc' => 'Tier-1 On-Grid & Hybrid PV Plants',
            'active' => $isSolar,
        ],
        [
            'name' => 'Solar Frame Structures',
            'url' => '/service/solar-frame-structure-karachi',
            'desc' => 'ASTM A123 Hot-Dip Galvanized Frames',
            'active' => $isFrame,
        ],
        [
            'name' => 'CCTV Surveillance',
            'url' => '/service/cctv-services-karachi',
            'desc' => '4K ColorVu IP Cameras & NVR Storage',
            'active' => $isCctv,
        ],
        [
            'name' => 'LiFePO4 Lithium ESS',
            'url' => '/service/lithium-batteries-karachi',
            'desc' => 'Grade-A 48V Powerwalls & Server Racks',
            'active' => $isLithium,
        ],
    ];

    foreach ($pillars as $p) {
        $activeBadge = $p['active'] ? '<span class="text-[10px] text-sky-400 font-bold ml-1">(Current Service)</span>' : '';
        $html .= "        <a href=\"{$p['url']}\" class=\"p-3.5 rounded-2xl bg-slate-800/90 hover:bg-slate-800 border ".($p['active'] ? 'border-sky-500/60' : 'border-slate-700/60 hover:border-sky-400/50')." transition group block\">\n".
            "            <div class=\"text-xs font-bold text-white group-hover:text-sky-300 transition flex items-center justify-between\">\n".
            "                <span>{$p['name']}</span>\n".
            "                <i data-lucide=\"arrow-up-right\" class=\"w-3.5 h-3.5 text-slate-400 group-hover:text-sky-300 transition\"></i>\n".
            "            </div>\n".
            "            <div class=\"text-[11px] text-slate-400 mt-1 leading-snug\">{$p['desc']} {$activeBadge}</div>\n".
            "        </a>\n";
    }

    $html .= "    </div>\n\n";

    if ($areaMatch) {
        $html .= "    <div class=\"pt-3 border-t border-slate-800 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400\">\n".
            "        <span>Serving {$areaTitle} and surrounding Karachi sectors with same-day on-site surveys.</span>\n".
            "        <a href=\"/service/solar-installation-areas-karachi\" class=\"text-sky-400 hover:underline font-bold\">View All Karachi Service Areas &rarr;</a>\n".
            "    </div>\n";
    } else {
        $html .= "    <div class=\"pt-3 border-t border-slate-800 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400\">\n".
            "        <span>Technical inquiries &amp; sizing consultations across DHA, Clifton, Gulshan, Bahria Town &amp; all industrial zones.</span>\n".
            "        <a href=\"/contact-us\" class=\"text-emerald-400 hover:underline font-bold\">Request Engineering Consultation &rarr;</a>\n".
            "    </div>\n";
    }

    $html .= "</div>\n";

    return $html;
}

function buildPageLinkingHub(Page $page): string
{
    return "\n\n<!-- FWB Ventures Core Engineering Services Directory -->\n".
        "<div class=\"not-prose my-10 p-6 sm:p-8 rounded-3xl bg-slate-900 text-white border border-slate-800 shadow-xl space-y-5\">\n".
        "    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-400 border-b border-slate-800 pb-3\">\n".
        "        <i data-lucide=\"layers\" class=\"w-4 h-4\"></i>\n".
        "        <span>FWB Ventures Karachi &bull; Core Engineering Divisions</span>\n".
        "    </div>\n".
        "    <h4 class=\"text-lg sm:text-xl font-black text-white font-display\">\n".
        "        Turnkey Clean Energy, Mounting Structures &amp; Security Infrastructure\n".
        "    </h4>\n".
        "    <p class=\"text-xs text-slate-300 leading-relaxed\">\n".
        "        Explore our four dedicated engineering divisions serving residential, commercial, and industrial clients throughout Karachi, Pakistan:\n".
        "    </p>\n\n".
        "    <div class=\"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 pt-1\">\n".
        "        <a href=\"/service/solar-installation-karachi\" class=\"p-4 rounded-2xl bg-slate-800/90 hover:bg-slate-800 border border-slate-700/80 hover:border-sky-400/60 transition group block\">\n".
        "            <div class=\"text-xs font-bold text-white group-hover:text-sky-300 transition flex items-center justify-between\">\n".
        "                <span>Solar Installation</span>\n".
        "                <i data-lucide=\"arrow-up-right\" class=\"w-3.5 h-3.5 text-slate-400 group-hover:text-sky-300 transition\"></i>\n".
        "            </div>\n".
        "            <div class=\"text-[11px] text-slate-400 mt-1.5 leading-relaxed\">On-grid, hybrid &amp; K-Electric net metering systems.</div>\n".
        "        </a>\n".
        "        <a href=\"/service/solar-frame-structure-karachi\" class=\"p-4 rounded-2xl bg-slate-800/90 hover:bg-slate-800 border border-slate-700/80 hover:border-sky-400/60 transition group block\">\n".
        "            <div class=\"text-xs font-bold text-white group-hover:text-sky-300 transition flex items-center justify-between\">\n".
        "                <span>Solar Structures</span>\n".
        "                <i data-lucide=\"arrow-up-right\" class=\"w-3.5 h-3.5 text-slate-400 group-hover:text-sky-300 transition\"></i>\n".
        "            </div>\n".
        "            <div class=\"text-[11px] text-slate-400 mt-1.5 leading-relaxed\">ASTM A123 hot-dip galvanized elevated frames &amp; pergolas.</div>\n".
        "        </a>\n".
        "        <a href=\"/service/cctv-services-karachi\" class=\"p-4 rounded-2xl bg-slate-800/90 hover:bg-slate-800 border border-slate-700/80 hover:border-sky-400/60 transition group block\">\n".
        "            <div class=\"text-xs font-bold text-white group-hover:text-sky-300 transition flex items-center justify-between\">\n".
        "                <span>CCTV Surveillance</span>\n".
        "                <i data-lucide=\"arrow-up-right\" class=\"w-3.5 h-3.5 text-slate-400 group-hover:text-sky-300 transition\"></i>\n".
        "            </div>\n".
        "            <div class=\"text-[11px] text-slate-400 mt-1.5 leading-relaxed\">4K ColorVu IP cameras, NVR recording &amp; AMC.</div>\n".
        "        </a>\n".
        "        <a href=\"/service/lithium-batteries-karachi\" class=\"p-4 rounded-2xl bg-slate-800/90 hover:bg-slate-800 border border-slate-700/80 hover:border-sky-400/60 transition group block\">\n".
        "            <div class=\"text-xs font-bold text-white group-hover:text-sky-300 transition flex items-center justify-between\">\n".
        "                <span>LiFePO4 Batteries</span>\n".
        "                <i data-lucide=\"arrow-up-right\" class=\"w-3.5 h-3.5 text-slate-400 group-hover:text-sky-300 transition\"></i>\n".
        "            </div>\n".
        "            <div class=\"text-[11px] text-slate-400 mt-1.5 leading-relaxed\">Grade-A 48V Powerwalls, 12V/24V &amp; industrial ESS banks.</div>\n".
        "        </a>\n".
        "    </div>\n\n".
        "    <div class=\"pt-3 border-t border-slate-800 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400\">\n".
        "        <a href=\"/blog\" class=\"text-sky-400 hover:underline font-bold\">Browse 320+ Technical Research Guides &rarr;</a>\n".
        "        <a href=\"/contact-us\" class=\"text-emerald-400 hover:underline font-bold\">Free On-Site Engineering Survey &rarr;</a>\n".
        "    </div>\n".
        "</div>\n";
}

echo "=== EXECUTING INTERNAL LINKING ACROSS POSTS, SERVICES & PAGES ===\n\n";

// 1. POSTS (320 published)
$posts = Post::where('status', 'published')->get();
echo '1. Applying internal linking hubs to '.$posts->count()." Posts...\n";
$postsUpdated = 0;
foreach ($posts as $post) {
    $content = $post->content ?? '';

    // Remove old hub if already inserted
    if (str_contains($content, '<!-- SEO Internal Linking Hub -->')) {
        $content = preg_replace('/<!-- SEO Internal Linking Hub -->.*$/s', '', $content);
    }

    $hub = buildPostLinkingHub($post);
    $post->content = trim($content)."\n\n".$hub;

    $post->timestamps = false;
    $post->save();
    $postsUpdated++;
}
echo "   Successfully updated $postsUpdated Posts with Internal Linking Hubs!\n\n";

// 2. SERVICES (319 services)
$services = Service::all();
echo '2. Applying internal linking hubs to '.$services->count()." Services...\n";
$servicesUpdated = 0;
foreach ($services as $service) {
    $content = $service->content ?? '';

    if (str_contains($content, '<!-- Interconnected Engineering Directory -->')) {
        $content = preg_replace('/<!-- Interconnected Engineering Directory -->.*$/s', '', $content);
    }

    $hub = buildServiceLinkingHub($service);
    $service->content = trim($content)."\n\n".$hub;

    $service->timestamps = false;
    $service->save();
    $servicesUpdated++;
}
echo "   Successfully updated $servicesUpdated Services with Interconnected Directories!\n\n";

// 3. PAGES (61 pages)
$pages = Page::all();
echo '3. Applying internal linking hubs to '.$pages->count()." Pages...\n";
$pagesUpdated = 0;
foreach ($pages as $page) {
    $content = $page->content ?? '';

    if (str_contains($content, '<!-- FWB Ventures Core Engineering Services Directory -->')) {
        $content = preg_replace('/<!-- FWB Ventures Core Engineering Services Directory -->.*$/s', '', $content);
    }

    $hub = buildPageLinkingHub($page);
    $page->content = trim($content)."\n\n".$hub;

    $page->timestamps = false;
    $page->save();
    $pagesUpdated++;
}
echo "   Successfully updated $pagesUpdated Pages with Engineering Directory Hubs!\n\n";

echo "=== INTERNAL LINKING COMPLETE ===\n";
