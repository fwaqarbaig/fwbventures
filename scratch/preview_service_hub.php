<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

function buildServiceInternalLinkingHub(Service $service): string
{
    $slug = $service->slug;
    $title = $service->title;

    // Detect pillar
    $isSolar = $service->isSolar();
    $isFrame = $service->isSolarFrame();
    $isCctv = $service->isCctv();
    $isLithium = $service->isLithiumBattery();

    // Check if area service
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

    // 4 Pillar cross links
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

    // If area service, add local neighbourhood links
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

// Test on sample services
$s1 = Service::where('slug', 'solar-installation-karachi')->first();
$s2 = Service::where('slug', 'cctv-camera-installation-in-dha-karachi')->first();

echo "Sample 1 Hub (Solar Installation):\n".substr(buildServiceInternalLinkingHub($s1), 0, 300)."...\n\n";
echo "Sample 2 Hub (CCTV in DHA):\n".substr(buildServiceInternalLinkingHub($s2), 0, 300)."...\n";
