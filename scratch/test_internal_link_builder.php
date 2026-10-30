<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

function buildPostInternalLinkingHub(Post $post): string
{
    $t = strtolower($post->title.' '.$post->slug);
    $category = $post->categories->first()?->name ?? '';
    $cat = strtolower($category);

    // Determine cluster
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
            ['title' => 'How to Choose the Best CCTV Camera for Your Home in Karachi', 'url' => '/how-to-choose-the-best-cctv-camera-for-your-home-in-karachi'],
            ['title' => 'IP Camera vs HD CCTV Camera – Which Is Better in Karachi?', 'url' => '/ip-camera-vs-hd-cctv-camera-which-is-better-in-karachi'],
            ['title' => 'DVR vs NVR – Which CCTV Recording System Should You Choose?', 'url' => '/dvr-vs-nvr-which-cctv-recording-system-should-you-choose-in-karachi'],
            ['title' => 'CCTV Camera Price in Karachi – Complete Buying Guide', 'url' => '/cctv-camera-price-in-karachi-complete-buying-guide'],
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
            ['title' => 'Lithium Battery in Karachi – Complete LiFePO4 Buying Guide', 'url' => '/lithium-battery-in-karachi-complete-buying-guide'],
            ['title' => 'LiFePO4 Battery in Karachi – Advantages, Lifespan and Cost', 'url' => '/lifepo4-battery-in-karachi-advantages-cost'],
            ['title' => 'Lithium Battery Price in Karachi – Complete Cost Guide', 'url' => '/lithium-battery-price-in-karachi-complete-guide'],
            ['title' => 'Lithium Battery vs Lead-Acid Battery for Solar in Karachi', 'url' => '/lithium-battery-vs-lead-acid-battery-for-solar-systems-in-karachi'],
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
            ['title' => 'Elevated vs Non-Elevated Solar Panel Structures in Karachi', 'url' => '/elevated-vs-non-elevated-solar-panel-structures-in-karachi'],
            ['title' => 'ASTM A123 Hot-Dip Galvanizing for Karachi Solar Structures', 'url' => '/astm-a123-hot-dip-galvanized-solar-structure-karachi'],
            ['title' => 'Solar Mounting Structure Design for Karachi Coastal Weather', 'url' => '/how-to-choose-a-solar-mounting-structure-for-karachi-weather'],
            ['title' => 'Solar Frame Fabrication Process & Pricing in Karachi', 'url' => '/solar-frame-fabrication-process-cost-karachi'],
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
            ['title' => 'On-Grid vs Hybrid vs Off-Grid Solar Systems in Karachi', 'url' => '/on-grid-vs-hybrid-vs-off-grid-solar-karachi'],
            ['title' => 'Solar Panel System Cost & Price Breakdown in Karachi', 'url' => '/solar-panel-system-cost-prices-karachi-guide'],
            ['title' => 'Tier-1 N-Type Solar Panels Efficiency & Performance Guide', 'url' => '/tier-1-solar-panels-efficiency-guide-karachi'],
        ];
    }

    $html = "\n\n<!-- SEO Internal Linking Hub -->\n".
        "<section class=\"not-prose my-12 p-6 sm:p-8 rounded-3xl bg-slate-900 text-white border border-sky-500/30 shadow-xl\">\n".
        "    <div class=\"flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-400 mb-2\">\n".
        "        <i data-lucide=\"network\" class=\"w-4 h-4\"></i>\n".
        "        <span>FWB Ventures Internal Knowledge & Engineering Directory</span>\n".
        "    </div>\n".
        "    <h3 class=\"text-xl sm:text-2xl font-black font-display text-white mb-2\">\n".
        "        Explore Verified Karachi Engineering Services & Technical Guides\n".
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
        "                <i data-lucide=\"book-open\" class=\"w-3.5 h-3.5\"></i> Related Technical Research & Guides\n".
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

// Test on 1 sample post
$p = Post::where('status', 'published')->first();
$hub = buildPostInternalLinkingHub($p);
echo 'Hub built successfully! Character length: '.strlen($hub)."\n";
echo "Preview:\n".substr($hub, 0, 400)."...\n";
