<?php

/**
 * FWB Ventures - Solar Frame Builders: Capacity Steps, Pricing Matrices & Karachi Locality Guides
 */
function buildSolarFrameLocalPricingContent($service)
{
    $slug = $service->slug;
    $title = $service->title;

    $specificIntro = getFrameLocalPricingSpecificIntro($slug, $title);
    $capacityPricingTable = getFrameLocalPricingTable($slug, $title);
    $localityEngineering = getFrameLocalPricingLocalityEngineering($slug, $title);
    $technicalSpecs = getFrameLocalPricingTechnicalSpecsTable($slug, $title);
    $faqList = getFrameLocalPricingFaqs($slug, $title);

    $content = <<<HTML
<div class="solar-frame-content space-y-8">
    <div class="prose max-w-none text-slate-700 leading-relaxed space-y-6">
        $specificIntro

        $capacityPricingTable

        $localityEngineering

        $technicalSpecs

        $faqList
    </div>
</div>
HTML;

    return [
        'title' => $title,
        'tagline' => getFrameLocalPricingTagline($slug, $title),
        'hero_badge' => getFrameLocalPricingBadge($slug),
        'summary' => getFrameLocalPricingSummary($slug, $title),
        'content' => $content,
        'features' => getFrameLocalPricingFeatures($slug),
        'benefits' => getFrameLocalPricingBenefits($slug),
        'benchmarks' => getFrameLocalPricingBenchmarks($slug),
        'focus_keyword' => getFrameLocalPricingFocusKeyword($slug, $title),
        'meta_title' => $title.' | FWB Ventures Karachi',
        'meta_description' => getFrameLocalPricingMetaDescription($slug, $title),
    ];
}

function getFrameLocalPricingSpecificIntro($slug, $title)
{
    // Locality specific
    if (str_contains($slug, 'installation-in-')) {
        $locality = str_replace(['solar-structure-installation-in-', '-karachi'], '', $slug);
        $localityName = ucwords(str_replace('-', ' ', $locality));

        return <<<HTML
<p class="text-lg font-medium text-slate-800">FWB Ventures is the certified structural specialist for <strong>Solar Structure Installation in $localityName, Karachi</strong>. Whether designing high-clearance architectural solar pergolas for residential bungalows or heavy-duty galvanized frameworks for commercial and industrial facilities, our structural engineering team delivers customized mounting systems engineered to endure Karachi's coastal winds and local environmental conditions.</p>

<p>Properties in $localityName present unique structural engineering requirements. From proximity to the Arabian Sea coastline and high chloride humidity to distinct roof slab constructions and local housing authority bylaws, FWB Ventures conducts comprehensive on-site structural assessments. We deploy diamond-core chemical epoxy anchoring (Hilti HIT-RE 500 V3), hot-dip galvanized steel (ASTM A123), and precision wind cross-bracing certified to withstand 140 km/h winds without damaging your rooftop slab.</p>
HTML;
    }

    // Capacity specific
    if (preg_match('/solar-structure-for-(\d+kw|\d+mw)/i', $slug, $matches)) {
        $capacity = strtoupper($matches[1]);

        return <<<HTML
<p class="text-lg font-medium text-slate-800">FWB Ventures engineers high-performance <strong>Solar Mounting Structures for $capacity Solar Systems in Karachi</strong>, delivering precision-fabricated frameworks tailored to the exact panel count, module dimensions, and structural layout of your project. As modern Tier-1 photovoltaic modules expand in physical dimensions (spanning 2.2m to 2.4m in length for 550W to 700W modules), deploying an adequately engineered mounting framework is essential to avoid module micro-cracking and wind deflection.</p>

<p>A $capacity solar installation requires an engineered balance between structural dead weight, wind uplift resistance, and rooftop space utilization. Whether configured as low-rise L2/L3 rows, space-saving elevated pergolas, or multi-bay commercial carports, our structures are fabricated from certified structural steel with 85 to 120-micron hot-dip galvanizing (ASTM A123), ensuring 25+ years of zero-maintenance structural integrity.</p>
HTML;
    }

    // Pricing specific
    if (str_contains($slug, 'price') || str_contains($slug, 'cost')) {
        return <<<HTML
<p class="text-lg font-medium text-slate-800">Looking for transparent, verified <strong>$title</strong>? FWB Ventures provides direct factory manufacturer pricing for solar mounting structures in Karachi. Navigating solar structure costs in Pakistan can be confusing due to widespread quality variations between thin, uncertified scrap-metal stands and certified heavy-duty hot-dip galvanized frameworks.</p>

<p>Solar mounting structure prices in Karachi typically range from <strong>Rs. 8.5 to Rs. 12.0 per Watt</strong> for standard low-rise galvanized L2/L3 rooftop stands, up to <strong>Rs. 22.0 to Rs. 28.5 per Watt</strong> for high-clearance elevated architectural pergolas (8 to 10 ft walking height). At FWB Ventures, our pricing includes full engineering drawings, hot-dip galvanizing to ASTM A123 standards, certified chemical injection anchoring, and guaranteed 140 km/h wind load resistance.</p>
HTML;
    }

    // Commercial / Industrial
    return <<<HTML
<p class="text-lg font-medium text-slate-800">FWB Ventures provides complete structural engineering, fabrication, and installation for <strong>$title</strong>. We specialize in heavy-duty commercial and industrial solar mounting structures across Karachi's bustling industrial estates, including SITE, Korangi, Landhi, and Port Qasim.</p>

<p>Industrial solar mounting structures must withstand heavy machinery vibrations, acidic atmospheric emissions, and intense wind forces across expansive open roofs. Utilizing structural Grade Q345B steel, heavy C-channels, and non-penetrating roof seam clamps, our commercial frameworks protect factory roofing assets while providing optimal solar harvest.</p>
HTML;
}

function getFrameLocalPricingTable($slug, $title)
{
    return <<<'HTML'
<h2>2026 Karachi Solar Structure Capacity & Pricing Guide</h2>
<p>Below is the verified engineering sizing and price guide for certified solar mounting structures across residential, commercial, and industrial capacities in Karachi:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left border-collapse border border-slate-200 text-sm">
        <thead class="bg-slate-100 text-slate-800 font-semibold">
            <tr>
                <th class="p-3 border border-slate-200">System Capacity</th>
                <th class="p-3 border border-slate-200">Panel Array (580W Modules)</th>
                <th class="p-3 border border-slate-200">Standard Low-Rise L2/L3 (PKR)</th>
                <th class="p-3 border border-slate-200">Elevated Rooftop Pergola (PKR)</th>
                <th class="p-3 border border-slate-200">FRP Coastal Composite (PKR)</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-700">
            <tr>
                <td class="p-3 border font-medium">5 kW Solar System</td>
                <td class="p-3 border">8 to 9 Panels (~20 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 45,000 – Rs. 55,000</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 110,000 – Rs. 140,000</td>
                <td class="p-3 border">Rs. 85,000 – Rs. 115,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">10 kW Solar System</td>
                <td class="p-3 border">17 to 18 Panels (~40 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 88,000 – Rs. 110,000</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 220,000 – Rs. 280,000</td>
                <td class="p-3 border">Rs. 170,000 – Rs. 230,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">15 kW Solar System</td>
                <td class="p-3 border">25 to 26 Panels (~60 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 130,000 – Rs. 165,000</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 320,000 – Rs. 410,000</td>
                <td class="p-3 border">Rs. 250,000 – Rs. 330,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">50 kW Commercial System</td>
                <td class="p-3 border">86 to 88 Panels (~200 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 420,000 – Rs. 520,000</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 950,000 – Rs. 1,250,000</td>
                <td class="p-3 border">Rs. 800,000 – Rs. 1,050,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">100 kW Industrial Project</td>
                <td class="p-3 border">172 to 175 Panels (~400 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 800,000 – Rs. 980,000</td>
                <td class="p-3 border font-semibold text-sky-700">Custom Industrial Canopy</td>
                <td class="p-3 border">Rs. 1,550,000 – Rs. 1,950,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">500 kW Factory / Ground Farm</td>
                <td class="p-3 border">860 to 880 Panels (~2,000 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 3,800,000 – Rs. 4,600,000</td>
                <td class="p-3 border">Engineered Carports</td>
                <td class="p-3 border">Custom Industrial Quote</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">1 MW Utility Power Plant</td>
                <td class="p-3 border">1,720+ Panels (~4,000 m&sup2;)</td>
                <td class="p-3 border font-semibold text-sky-700">Rs. 7,200,000 – Rs. 8,800,000</td>
                <td class="p-3 border">Mega Carport Available</td>
                <td class="p-3 border">Custom Industrial Quote</td>
            </tr>
        </tbody>
    </table>
</div>
<p class="text-xs text-slate-500 italic">*Prices reflect certified ASTM A123 hot-dip galvanized steel, Grade 8.8 hardware, chemical anchoring, and structural wind engineering. Subject to prevailing steel billet and zinc bath market indices.</p>
HTML;
}

function getFrameLocalPricingLocalityEngineering($slug, $title)
{
    return <<<'HTML'
<h2>Hyper-Local Karachi Environmental & Zoning Engineering</h2>
<p>Karachi’s vast urban landscape spans diverse microclimates and structural environments, requiring localized engineering adaptations:</p>

<ul>
    <li><strong>DHA & Clifton Coastal Marine Zone:</strong> Subjected to continuous salt spray from the Arabian Sea and strict DHA building bylaws. We mandate a minimum 100-micron hot-dip zinc coating (or pultruded FRP composite frameworks), stainless steel AISI 316 clamping bolts, and aesthetic elevated pergolas that complement luxury architectural elevations.</li>
    <li><strong>Korangi, Landhi & Port Qasim Industrial Corridor:</strong> Industrial atmosphere contains high sulfur dioxide (SO&sub2;) and nitrogen oxide emissions from heavy manufacturing and thermal power plants. We deploy heavy-gauge C-channel steel framing with anti-corrosion barrier coatings and non-penetrating standing-seam clamps for corrugated factory sheds.</li>
    <li><strong>SITE Industrial Area & North Karachi:</strong> High-density industrial and commercial rooftops requiring rapid installation to avoid disrupting manufacturing operations. We utilize modular pre-punched bolt-together assemblies that eliminate hazardous on-site hot welding over factory inventory.</li>
    <li><strong>Gulshan-e-Iqbal, PECHS & Shahrah-e-Faisal:</strong> Multi-story commercial buildings and residential bungalows with high parapet walls and overhead water tank towers. Our structural engineers design custom elevated frames that clear parapet shadows, capturing 100% unshaded sunlight throughout the year.</li>
</ul>
HTML;
}

function getFrameLocalPricingTechnicalSpecsTable($slug, $title)
{
    return <<<'HTML'
<h2>Structural Engineering Compliance Specifications</h2>
<p>Technical benchmarks adhered to by FWB Ventures across all Karachi installations:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left border-collapse border border-slate-200 text-sm">
        <thead class="bg-slate-100 text-slate-800 font-semibold">
            <tr>
                <th class="p-3 border border-slate-200">Engineering Parameter</th>
                <th class="p-3 border border-slate-200">Residential Rooftop Standard</th>
                <th class="p-3 border border-slate-200">Commercial / Industrial Standard</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-700">
            <tr>
                <td class="p-3 border font-medium">Design Wind Velocity Rating</td>
                <td class="p-3 border font-semibold text-sky-700">136 km/h to 145 km/h (SBCA Compliant)</td>
                <td class="p-3 border font-semibold text-sky-700">145 km/h to 150 km/h (Heavy Coastal)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Structural Steel Standards</td>
                <td class="p-3 border">ASTM A36 / Q235B Carbon Steel</td>
                <td class="p-3 border">ASTM A572 Grade 50 / Q345B High-Tensile</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Hot-Dip Zinc Coating Thickness</td>
                <td class="p-3 border font-semibold text-sky-700">&ge; 85 Microns (ASTM A123)</td>
                <td class="p-3 border font-semibold text-sky-700">&ge; 100 Microns (Heavy Marine Class)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Chemical Anchoring System</td>
                <td class="p-3 border">Hilti HIT-RE 500 V3 Pure Epoxy (100mm Depth)</td>
                <td class="p-3 border">Hilti / Fischer Epoxy Resin (125mm Depth)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Fasteners & Module Clamps</td>
                <td class="p-3 border">Grade 8.8 HDG / AISI 304 Stainless Steel</td>
                <td class="p-3 border">AISI 316 Marine Stainless Steel Hardware</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Expected Structural Service Life</td>
                <td class="p-3 border font-semibold text-sky-700">25+ Years Zero-Maintenance</td>
                <td class="p-3 border font-semibold text-sky-700">25 to 30 Years Industrial Lifespan</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;
}

function getFrameLocalPricingFaqs($slug, $title)
{
    return <<<HTML
<h2>Frequently Asked Questions Regarding $title</h2>

<div class="space-y-4 my-6">
    <div class="border border-slate-200 rounded-lg p-4 bg-slate-50">
        <h3 class="font-bold text-slate-800 text-base">What factors most heavily influence the total cost of a solar mounting structure in Karachi?</h3>
        <p class="text-sm text-slate-600 mt-2">The primary cost drivers are material selection (hot-dip galvanized steel vs aluminum vs FRP), clearance height (low-rise L2 stands vs 9ft elevated pergolas requiring heavy structural columns), roof anchoring requirements (chemical epoxy resin vs non-penetrating shed clamps), and project scale. Elevated pergolas require more steel tonnage and engineering labor but preserve valuable rooftop living space.</p>
    </div>

    <div class="border border-slate-200 rounded-lg p-4 bg-slate-50">
        <h3 class="font-bold text-slate-800 text-base">Can a 10kW or 15kW solar structure be installed on an older RCC roof slab safely?</h3>
        <p class="text-sm text-slate-600 mt-2">Yes. Prior to installation, our structural engineers inspect the concrete slab thickness and identify primary load-bearing beams. We utilize lightweight 6063-T5 aluminum rails or distribute steel column loads across wide-footprint base plates, ensuring roof dead load increases by less than 15 to 20 kg/m&sup2;, well within safe structural building limits.</p>
    </div>

    <div class="border border-slate-200 rounded-lg p-4 bg-slate-50">
        <h3 class="font-bold text-slate-800 text-base">How long does fabrication and on-site installation take in Karachi?</h3>
        <p class="text-sm text-slate-600 mt-2">Standard low-rise L2/L3 residential mounting structures are typically installed within 1 to 2 days. Custom elevated pergolas or commercial carports require approximately 4 to 6 days for workshop fabrication and hot-dip galvanizing, followed by 2 to 3 days of on-site civil anchoring, erection, and panel mounting.</p>
    </div>

    <div class="border border-slate-200 rounded-lg p-4 bg-slate-50">
        <h3 class="font-bold text-slate-800 text-base">Do you provide written structural warranties in Karachi?</h3>
        <p class="text-sm text-slate-600 mt-2">Yes. FWB Ventures provides a formal 15 to 25-year structural warranty covering anti-corrosion integrity and wind resistance up to 140 km/h, backed by our registered engineering office in Karachi.</p>
    </div>
</div>
HTML;
}

function getFrameLocalPricingTagline($slug, $title)
{
    return 'Certified Solar Structure Engineering, Transparent Pricing & Expert Installation Across Karachi';
}

function getFrameLocalPricingBadge($slug)
{
    return 'Turnkey Solar Engineering';
}

function getFrameLocalPricingSummary($slug, $title)
{
    return "FWB Ventures provides certified $title. Engineered with ASTM A123 hot-dip galvanized steel, 140 km/h wind certification, chemical epoxy anchoring, and transparent 2026 Karachi pricing.";
}

function getFrameLocalPricingFeatures($slug)
{
    return [
        'ASTM A123 Hot-Dip Galvanized Structural Steel (85–120μm Zinc Layer)',
        'Wind Load Engineering Certified to 140–150 km/h (SBCA / PBC Compliant)',
        'Precision Hilti Pure Epoxy Chemical Anchoring (Zero Roof Cracking)',
        'Transparent 2026 Karachi Pricing per Watt & per Panel Capacity',
        'Custom Elevated Pergolas, Carports & Non-Penetrating Shed Clamps',
        'Hyper-Local Engineering for DHA, Clifton, Korangi, SITE & Port Qasim',
    ];
}

function getFrameLocalPricingBenefits($slug)
{
    return [
        '25 to 30 Years Guaranteed Rust-Free Performance in Karachi Marine Air',
        'Preserve Usable Terrace Living Space with Elevated Pergola Designs',
        '100% Protection Against Monsoon Roof Slab Leaks with EPDM Gaskets',
        'Turnkey Engineering Design Stamped for AEDB Net Metering Approvals',
        'Rapid On-Site Erection with Pre-Engineered Modular Bolt-Together Kits',
        'Formal 15 to 25-Year Structural Engineering & Anti-Corrosion Warranty',
    ];
}

function getFrameLocalPricingBenchmarks($slug)
{
    return [
        'Design Wind Speed' => '136 to 150 km/h (SBCA Aerodynamic Certified)',
        'Zinc Coating Depth' => '85 to 120 Microns ASTM A123 Hot-Dip Zinc',
        'Anchor Pull-Out' => '> 20 kN Ultimate Tensile Resistance per Stud',
        'Warranty Period' => '15 to 25 Years Structural Engineering Guarantee',
        'Building Code' => 'Pakistan Building Code (PBC) & SBCA Verified',
    ];
}

function getFrameLocalPricingFocusKeyword($slug, $title)
{
    $lower = strtolower($title);

    return str_contains($lower, 'karachi') ? $lower : $lower.' karachi';
}

function getFrameLocalPricingMetaDescription($slug, $title)
{
    return "Certified $title by FWB Ventures. ASTM A123 hot-dip galvanized steel, 140 km/h wind rating, chemical anchoring & 25+ yr warranty in Karachi. Get a free quote!";
}
