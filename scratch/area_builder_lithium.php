<?php

// Content engine for Lithium Battery Supply & Installation Areas in Karachi

function buildLithiumAreaContent(string $slug, string $title, array $cfg): string
{
    $name = $title;
    $area = $cfg['area_name'];
    $power_profile = $cfg['power_profile'];
    $recommended_batteries = $cfg['recommended_batteries'];
    $savings = $cfg['savings'] ?? 'Eliminate generator diesel costs by 100% and provide 10-15 years of maintenance-free battery backup';
    $bylaws = $cfg['bylaws'] ?? 'society electrical bylaws and safety guidelines';

    return <<<HTML
<h2>1. Premium LiFePO4 Lithium Battery Supply & Installation in {$area}</h2>
<p>Maintaining uninterrupted electrical power across Karachi's fluctuating grid requires dependable, high-density energy storage. Whether safeguarding a luxury residential villa, corporate office, healthcare diagnostic center, or industrial facility in <strong>{$area}</strong>, obsolete lead-acid, tubular, and AGM gel batteries fail to deliver the lifespan, thermal endurance, and rapid charging speeds demanded by modern consumers. <strong>FWB Ventures</strong> is Karachi's premier engineering distributor and turnkey EPC installer of certified <strong>{$name}</strong>, utilizing automotive-grade <strong>Lithium Iron Phosphate (LiFePO4)</strong> chemistry.</p>

<p>Compared to conventional lead-acid batteries that degrade within 18 to 24 months in Karachi's hot climate, Grade-A LiFePO4 battery systems provided by FWB Ventures deliver over <strong>6,000 deep discharge cycles at 80% Depth of Discharge (DoD)</strong>—translating to <strong>12 to 15+ years of daily maintenance-free operation</strong>. Paired with intelligent high-amperage Battery Management Systems (BMS) and closed-loop CANbus/RS485 communications with leading hybrid inverters (Deye, Sungrow, Huawei, GoodWe, Solis, and Victron), our energy storage systems deliver seamless (&lt;10ms) zero-flicker backup during K-Electric grid outages while optimizing daytime solar self-consumption.</p>

<h3>Core Energy Storage Highlights for {$name}</h3>
<ul>
    <li><strong>Designated Operational Neighborhood:</strong> {$area}.</li>
    <li><strong>Local Grid Dynamics & Backup Priorities:</strong> {$power_profile}.</li>
    <li><strong>Recommended Storage Form Factors:</strong> {$recommended_batteries}.</li>
    <li><strong>Cell Chemistry & Grade:</strong> 100% Brand-New Grade-A Prismatic Lithium Iron Phosphate (LiFePO4) cells with certified QR codes.</li>
    <li><strong>Cycle Life & Longevity:</strong> 6,000 to 8,000 cycles backed by a 5 to 10-year official replacement warranty.</li>
    <li><strong>Economic Impact:</strong> {$savings}.</li>
</ul>

---

<h2>2. Energy Grid Dynamics & Storage Engineering in {$area}</h2>
<p>Electrical grid stability and consumption profiles vary significantly across Karachi's residential, commercial, and industrial zones. In <strong>{$area}</strong>, property owners face specific power conditions that make LiFePO4 lithium batteries an essential technological upgrade over noisy diesel generators and fragile lead-acid banks:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left text-xs sm:text-sm border border-slate-200 rounded-xl overflow-hidden shadow-xs">
        <thead class="bg-slate-900 text-white">
            <tr>
                <th class="p-3 font-bold">Grid Challenge in {$area}</th>
                <th class="p-3 font-bold">Weakness of Lead-Acid / Tubular Batteries</th>
                <th class="p-3 font-bold">FWB Ventures LiFePO4 Lithium Solution</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white text-slate-700">
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Frequent Daytime & Nighttime Outages</td>
                <td class="p-3">Requires 10 to 14 hours of continuous slow charging; fails to recover full capacity between back-to-back load-shedding cycles.</td>
                <td class="p-3 font-semibold text-emerald-600">Ultra-fast 0.5C to 1C rapid charging: fully recharges from 0% to 100% in just 1.5 to 2.5 hours from solar or grid.</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">High Ambient Summer Temperatures (40&deg;C+)</td>
                <td class="p-3">Electrolyte boils, plates warp, and battery lifespan drops by 50% for every 10&deg;C rise over 25&deg;C.</td>
                <td class="p-3 font-semibold text-emerald-600">High thermal stability up to 60&deg;C with internal multi-point digital thermal sensors and automated BMS thermal cutoffs.</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Heavy Inductive Loads (Inverter ACs & Pumps)</td>
                <td class="p-3">Severe voltage drop and Peukert's effect under heavy current draw; trips inverters on low-battery faults.</td>
                <td class="p-3 font-semibold text-emerald-600">Flat discharge voltage curve maintaining stable 51.2V delivery up to 95% Depth of Discharge, effortlessly powering AC compressors.</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Toxic Fumes & Water Top-Up Hassle</td>
                <td class="p-3">Emits hazardous explosive hydrogen and acidic sulfur fumes requiring monthly distilled water topping.</td>
                <td class="p-3 font-semibold text-emerald-600">100% sealed, non-toxic, eco-friendly solid-state construction with zero emissions, suitable for indoor utility rooms.</td>
            </tr>
        </tbody>
    </table>
</div>

---

<h2>3. Comprehensive Comparison: LiFePO4 Lithium vs. Lead-Acid Batteries</h2>
<p>To understand why property owners across {$area} are rapidly transitioning from legacy batteries to FWB Ventures lithium storage, review the technical and lifecycle metrics below:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left text-xs sm:text-sm border border-slate-200 rounded-xl overflow-hidden shadow-xs">
        <thead class="bg-slate-900 text-white">
            <tr>
                <th class="p-3 font-bold">Engineering Parameter</th>
                <th class="p-3 font-bold">Conventional Lead-Acid / Tubular</th>
                <th class="p-3 font-bold text-sky-400">FWB Grade-A LiFePO4 Lithium</th>
                <th class="p-3 font-bold">Performance Advantage</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white text-slate-700">
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Cycle Life (80% DoD)</td>
                <td class="p-3">800 - 1,200 Cycles</td>
                <td class="p-3 font-bold text-emerald-600">6,000 - 8,000+ Cycles</td>
                <td class="p-3 font-semibold text-emerald-600">6&times; Longer Operational Life</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Usable Usable Capacity (DoD)</td>
                <td class="p-3">50% Max (Deeper drains destroy plates)</td>
                <td class="p-3 font-bold text-emerald-600">90% - 95% Usable Energy</td>
                <td class="p-3 font-semibold text-emerald-600">Nearly Double Usable Energy per Rated Ah</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Round-Trip Efficiency</td>
                <td class="p-3">70% - 75% (25% lost as heat)</td>
                <td class="p-3 font-bold text-emerald-600">&gt; 96% Efficiency</td>
                <td class="p-3 font-semibold text-emerald-600">20%+ Energy Saved on Every Charge Cycle</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Weight & Space Footprint</td>
                <td class="p-3">Extremely heavy (250kg for 10kWh bank)</td>
                <td class="p-3 font-bold text-emerald-600">Ultra-compact (70kg for 10kWh bank)</td>
                <td class="p-3 font-semibold text-emerald-600">70% Lighter & 65% Smaller Footprint</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Expected Lifespan</td>
                <td class="p-3">2 - 3 Years Maximum</td>
                <td class="p-3 font-bold text-emerald-600">12 - 15+ Years</td>
                <td class="p-3 font-semibold text-emerald-600">Eliminates 4 to 5 Expensive Battery Replacements</td>
            </tr>
        </tbody>
    </table>
</div>

---

<h2>4. Lithium Storage Form Factors Deployed Across {$area}</h2>
<p>FWB Ventures supplies and installs versatile lithium battery form factors matching the space constraints and electrical configurations of properties in {$area}:</p>

<h3>1. Wall-Mounted Powerwall Batteries (5.12kWh & 10kWh, 51.2V)</h3>
<ul>
    <li><strong>Ideal Application:</strong> Luxury residential villas, modern bungalows, executive home offices, and clinic consultation rooms.</li>
    <li><strong>Aesthetic & Features:</strong> Ultra-slim minimalist white powder-coated enclosure, integrated digital LCD status screen, multi-color LED glowing power ring, wall-bracket mounting saving floor space, and plug-and-play parallel expansion up to 15 units (76.8kWh).</li>
</ul>

<h3>2. 19-Inch Server-Rack Lithium Battery Modules (48V / 51.2V 100Ah)</h3>
<ul>
    <li><strong>Ideal Application:</strong> Corporate IT server rooms, commercial offices, CCTV control stations, telecom towers, and banking branches.</li>
    <li><strong>Features:</strong> Standard 3U/4U rack-mount chassis fitting standard IT server cabinets, heavy copper front busbar terminals, front-facing RS485/CAN communication ports, and dual breaker circuit protection.</li>
</ul>

<h3>3. Floor-Standing Stackable Energy Storage Towers (15kWh to 40kWh)</h3>
<ul>
    <li><strong>Ideal Application:</strong> Large residential estates, luxury farmhouses, commercial retail outlets, and multi-family buildings.</li>
    <li><strong>Features:</strong> Modular stackable blocks that click together without messy external interconnecting cables, concealed internal busbar connections, high-voltage (HV) or low-voltage (LV) configuration, and built-in wheels for easy positioning.</li>
</ul>

<h3>4. High-Voltage Commercial & Industrial Containerized ESS (50kWh to 1MWh+)</h3>
<ul>
    <li><strong>Ideal Application:</strong> Industrial textile plants, cold chain logistics, pharmaceutical factories, and microgrid applications.</li>
    <li><strong>Features:</strong> High-voltage DC bus (200V to 800V DC) for high-efficiency coupling with commercial hybrid inverters, HVAC climate-controlled enclosures, automatic aerosol fire suppression, and SCADA telemetry.</li>
</ul>

---

<h2>5. Intelligent Smart BMS & Closed-Loop Inverter Communications</h2>
<p>A lithium battery is only as safe and efficient as its Battery Management System. FWB Ventures integrates advanced, automotive-grade multi-core smart BMS units that actively safeguard every internal cell:</p>
<ul>
    <li><strong>Active Cell Voltage Balancing:</strong> Microprocessor-controlled active balancers redistribute charge between individual cells, ensuring 100% capacity utilization and eliminating premature pack degradation.</li>
    <li><strong>Multi-Point Thermal & Current Protection:</strong> Real-time monitoring of cell temperatures, charge/discharge amperage, over-voltage, under-voltage, and short-circuit conditions with sub-millisecond automated isolation cutoffs.</li>
    <li><strong>Closed-Loop Digital Handshake:</strong> High-speed CANbus and RS485 communication protocols establish a live data handshake between the battery and your hybrid inverter (Deye, Sungrow, Huawei, GoodWe, Solis, Victron). The battery dictates optimal charge current, voltage limits, and State of Charge (SoC) percentages directly to the inverter, preventing overcharging and maximizing battery lifespan.</li>
</ul>

---

<h2>6. Standard Capacity Configurations & Turnkey Pricing in {$area}</h2>
<p>The table below provides transparent pricing guidelines for genuine Grade-A LiFePO4 battery storage systems deployed across {$area}. Prices include battery modules, smart BMS, high-amperage copper battery cables, DC disconnect breakers, communication cable configuration, and professional installation:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left text-xs sm:text-sm border border-slate-200 rounded-xl overflow-hidden shadow-xs">
        <thead class="bg-slate-900 text-white">
            <tr>
                <th class="p-3 font-bold">Capacity Configuration</th>
                <th class="p-3 font-bold">Recommended Property Profile in {$area}</th>
                <th class="p-3 font-bold">Continuous Load Capability</th>
                <th class="p-3 font-bold">Typical Backup Duration</th>
                <th class="p-3 font-bold">Turnkey Price Estimate (PKR)</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white text-slate-700">
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-sky-700">5.12kWh LiFePO4 Powerwall</td>
                <td class="p-3">Small bungalows (120-240 sq yd), apartments, and shops running lights, fans, TV, WiFi, and 1 inverter AC.</td>
                <td class="p-3 font-semibold">100A (5,120W Max)</td>
                <td class="p-3 font-semibold text-emerald-600">4 - 8 Hours Continuous</td>
                <td class="p-3 font-mono font-bold">PKR 340,000 - 420,000</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-sky-700">10.24kWh LiFePO4 Dual Pack</td>
                <td class="p-3">Standard to luxury bungalows (240-500 sq yd) running 2-3 inverter ACs, refrigerator, and water pump.</td>
                <td class="p-3 font-semibold">200A (10,240W Max)</td>
                <td class="p-3 font-semibold text-emerald-600">6 - 12 Hours Continuous</td>
                <td class="p-3 font-mono font-bold">PKR 660,000 - 790,000</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-sky-700">15.36kWh - 20.48kWh High Capacity</td>
                <td class="p-3">Large luxury estates (500-1,000+ sq yd), corporate offices, and clinics running multiple ACs and medical equipment.</td>
                <td class="p-3 font-semibold">300A - 400A Surge</td>
                <td class="p-3 font-semibold text-emerald-600">8 - 18 Hours Full Backup</td>
                <td class="p-3 font-mono font-bold">PKR 980,000 - 1,450,000</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-sky-700">50kWh - 200kWh+ Commercial ESS</td>
                <td class="p-3">Industrial manufacturing plants, pharmaceutical facilities, corporate headquarters, and schools.</td>
                <td class="p-3 font-semibold">High-Voltage DC Bank</td>
                <td class="p-3 font-semibold text-emerald-600">Full Operational Shift Backup</td>
                <td class="p-3 font-mono font-bold">Custom Commercial ESS Quote</td>
            </tr>
        </tbody>
    </table>
</div>

---

<h2>7. Peak Shaving, Time-of-Use (TOU) Tariff Arbitrage & Energy Cost Optimization in {$area}</h2>
<p>In addition to providing seamless emergency backup during grid outages, modern LiFePO4 battery storage installed by FWB Ventures functions as an active financial asset that drastically reduces monthly electricity expenses through intelligent <strong>Time-of-Use (TOU) tariff arbitrage</strong>:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left text-xs sm:text-sm border border-slate-200 rounded-xl overflow-hidden shadow-xs">
        <thead class="bg-slate-900 text-white">
            <tr>
                <th class="p-3 font-bold">Time Window & Grid Phase</th>
                <th class="p-3 font-bold">K-Electric Tariff Rate Structure</th>
                <th class="p-3 font-bold">FWB Ventures Automated Battery Dispatch Mode</th>
                <th class="p-3 font-bold">Economic Benefit in {$area}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white text-slate-700">
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Daytime Solar Peak (9:00 AM - 4:30 PM)</td>
                <td class="p-3">Low / Off-Peak Solar Generation Hours</td>
                <td class="p-3 font-semibold text-sky-700">Direct Solar Self-Consumption + High-Speed Battery Charging to 100% SoC.</td>
                <td class="p-3 font-semibold text-emerald-600">Zero grid power consumed; surplus energy exported via net metering.</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Evening Peak Tariff (6:00 PM - 10:00 PM)</td>
                <td class="p-3 font-bold text-rose-600">Highest K-Electric Commercial / Residential Tariff</td>
                <td class="p-3 font-bold text-emerald-600">Automated Peak Shaving: Battery discharges stored daytime solar power to run air conditioners and household loads.</td>
                <td class="p-3 font-semibold text-emerald-600">100% avoids punishing peak unit rates, saving thousands of rupees daily.</td>
            </tr>
            <tr class="hover:bg-sky-50/50">
                <td class="p-3 font-bold text-slate-900">Overnight Sleep Hours (10:00 PM - 6:00 AM)</td>
                <td class="p-3">Standard Off-Peak Rate</td>
                <td class="p-3 font-semibold text-sky-700">Low-Current Battery Support or Off-Peak Grid Bypass with reserve capacity held for emergency outages.</td>
                <td class="p-3 font-semibold text-emerald-600">Guarantees peaceful uninterrupted sleep through nocturnal feeder outages without generator noise.</td>
            </tr>
        </tbody>
    </table>
</div>

---

<h2>8. Automotive-Grade Prismatic Cell Architecture & Laser-Welded Busbars</h2>
<p>FWB Ventures exclusively imports and installs battery modules constructed from genuine <strong>Automotive-Grade Class-A Prismatic Aluminum-Cased Cells</strong> manufactured by global tier-1 cell producers (such as CATL, EVE Energy, and Gotion):</p>
<ul>
    <li><strong>Explosion-Proof Dual Pressure Relief Vents:</strong> Each prismatic cell features an automated mechanical safety vent that releases pressure safely if subjected to extreme external abuse, eliminating catastrophic cell rupture.</li>
    <li><strong>Robotic Laser-Welded Solid Copper Busbars:</strong> Cell terminals are joined using automated laser-welded pure electrolytic copper busbars. Unlike screw-down bolted terminals that loosen over time and generate resistive heat, laser-welded connections maintain zero resistance under continuous 200A current discharge.</li>
    <li><strong>Individual Cell Internal Resistance & Voltage Matching:</strong> Prior to module assembly, all cells undergo 72-hour automated capacity binning and IR grading ensuring cell-to-cell impedance variance is held below 0.05 m&Omega;, guaranteeing balanced aging across the entire 15-year lifecycle.</li>
</ul>

---

<h2>9. Fire Safety, Thermal Runaway Prevention & Indoor Installation</h2>
<p>Unlike volatile lithium cobalt oxide (NCM/NCA) chemistries used in consumer mobile phones, <strong>Lithium Iron Phosphate (LiFePO4)</strong> is universally recognized as the safest lithium technology available:</p>
<ul>
    <li><strong>Chemical Incombustibility:</strong> The chemical P-O bond in iron phosphate crystals is extremely strong and stable up to 500°C. Even under severe mechanical puncture, external short-circuit, or extreme overcharge, LiFePO4 does not release oxygen, making thermal runaway and combustion practically impossible.</li>
    <li><strong>Aerosol Thermal Extinguishing Integration:</strong> High-capacity commercial battery cabinets installed by FWB Ventures include automatic heat-activated aerosol fire extinguishing cartridges providing instantaneous suppression inside the enclosure.</li>
    <li><strong>Safe Indoor Placement:</strong> With zero acidic fumes, zero hydrogen off-gassing, and quiet fanless operation, our Powerwalls can be installed safely inside residential utility areas, basements, or garages.</li>
</ul>

---

<h2>10. Frequently Asked Questions (FAQs) Regarding {$name}</h2>
<div class="space-y-4 my-6">
    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
        <h4 class="font-bold text-slate-900 text-sm mb-1">Q1: How many years will a LiFePO4 lithium battery last in {$area}?</h4>
        <p class="text-xs sm:text-sm text-slate-600">Under normal daily cycling in {$area}, Grade-A LiFePO4 lithium batteries provide over 6,000 cycles at 80% Depth of Discharge. Even with daily discharge during evening power outages, the battery will last 12 to 15+ years before capacity gently declines to 80% of original rating.</p>
    </div>
    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
        <h4 class="font-bold text-slate-900 text-sm mb-1">Q2: Can a 10kWh lithium battery run air conditioners through the night?</h4>
        <p class="text-xs sm:text-sm text-slate-600">Yes! A 10.24kWh LiFePO4 battery pack easily powers one 1.5-ton inverter air conditioner (consuming approximately 800W to 1,000W once room temperature stabilizes) along with lights, fans, and refrigerator for 8 to 10 continuous hours during nighttime grid outages.</p>
    </div>
    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
        <h4 class="font-bold text-slate-900 text-sm mb-1">Q3: Is my existing hybrid solar inverter compatible with lithium batteries?</h4>
        <p class="text-xs sm:text-sm text-slate-600">Most modern hybrid inverters installed in Karachi—including Deye, Sungrow, Huawei, GoodWe, Solis, Growatt, Inverex Nitrox, and Victron—feature native CANbus/RS485 lithium communication ports that integrate seamlessly with FWB Ventures lithium BMS systems. If using an older inverter without digital BMS communication, our batteries can also operate in voltage-lead mode.</p>
    </div>
    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
        <h4 class="font-bold text-slate-900 text-sm mb-1">Q4: How fast does the lithium battery recharge when power returns?</h4>
        <p class="text-xs sm:text-sm text-slate-600">Unlike lead-acid batteries that require 10 to 14 hours of continuous trickle charging, our LiFePO4 systems accept high-current 0.5C charging, allowing full 0% to 100% recharging in just 2 hours from either solar panels or the grid.</p>
    </div>
    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
        <h4 class="font-bold text-slate-900 text-sm mb-1">Q5: What warranties does FWB Ventures provide on lithium installations?</h4>
        <p class="text-xs sm:text-sm text-slate-600">All lithium battery systems installed by FWB Ventures carry a comprehensive 5 to 10-year official manufacturer replacement warranty, backed by local Karachi technical support and spare part availability.</p>
    </div>
    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
        <h4 class="font-bold text-slate-900 text-sm mb-1">Q6: Can I expand my battery capacity in the future as power needs grow?</h4>
        <p class="text-xs sm:text-sm text-slate-600">Absolutely. FWB Ventures lithium systems are modular and parallel-ready. You can start with a single 5.12kWh or 10.24kWh unit today and easily parallel-connect up to 15 additional battery packs in the future without replacing your existing inverter or wiring infrastructure.</p>
    </div>
</div>

---

<h2>11. Schedule a Free Battery Storage Audit in {$area}</h2>
<p>Eliminate power outages, save on escalating electricity tariffs, and secure reliable energy independence with FWB Ventures. Contact our energy storage specialists today to schedule an on-site electrical audit and customized lithium storage proposal for your property in <strong>{$area}</strong>:</p>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 my-4">
    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
        <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Battery Storage Hotline</span>
        <a href="tel:+923012118111" class="text-sm font-black text-sky-700 hover:text-sky-800 transition">+92 301 2118111</a>
    </div>
    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
        <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">WhatsApp Storage Desk</span>
        <a href="https://wa.me/923012118111?text=Hello+FWB+Ventures,+I+need+lithium+battery+installation+in+{$area}" target="_blank" class="text-sm font-black text-emerald-600 hover:text-emerald-700 transition">Chat on WhatsApp</a>
    </div>
    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
        <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Scope of Work</span>
        <span class="text-xs font-bold text-slate-800">LiFePO4 Powerwalls &amp; Server-Rack ESS</span>
    </div>
    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
        <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Service Coverage</span>
        <span class="text-xs font-bold text-slate-800">{$area}</span>
    </div>
</div>
HTML;
}
