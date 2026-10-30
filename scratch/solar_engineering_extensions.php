<?php

/**
 * FWB Ventures - Advanced Technical Extension Modules
 * Adds deep engineering, regulatory, metallurgical, and power quality sections
 * to ensure every solar service exceeds 2,000 words with 100% substantive technical authority.
 */
function getGridPowerQualitySection($name, $systemType = 'Solar System')
{
    return <<<HTML
---

<h2>Electrical Power Quality, Grid Dynamics & Phase Balancing in Karachi</h2>
<p>Deploying a <strong>{$name}</strong> requires an engineering assessment of the local electrical distribution environment. In Karachi, the electrical grid operated by <strong>K-Electric (KE)</strong> experiences significant voltage fluctuations, sudden frequency transients (deviating between 48.8 Hz and 51.2 Hz during feeder load switching), harmonic distortions, and neutral voltage displacement caused by unbalanced single-phase loads along local 11kV/400V PMTs (Pole-Mounted Transformers).</p>

<p>When connecting a photovoltaic power plant to this volatile grid environment, standard budget inverters frequently trip on "Grid Voltage Out of Range" or "Over-Frequency" errors, leaving property owners without solar generation during peak midday hours. <strong>FWB Ventures</strong> addresses these power quality anomalies through advanced electrical protection and conditioning protocols:</p>

<ul>
    <li><strong>Adaptive Grid Voltage Ride-Through:</strong> Our Tier-1 inverters (Huawei, Sungrow, Deye, Solis) feature configurable AC voltage trip thresholds customized specifically for Karachi distribution feeders. The inverters ride through transient utility sags (down to 180V) and surges (up to 270V per phase) without disconnecting, maximizing total daily kilowatt-hour harvest.</li>
    <li><strong>Active Phase Balancing:</strong> On three-phase commercial and residential installations, uneven domestic consumption (such as two heavy inverter ACs running on Phase L1 while Phase L3 is unloaded) can trigger neutral conductor overheating and breaker tripping. We design symmetrical load balancing and deploy multi-MPPT inverters that dynamically adjust power injection across each phase.</li>
    <li><strong>Harmonic Suppression & Power Factor Correction:</strong> Our smart inverters maintain a total harmonic distortion (THD) of less than 2.5% on output current, comfortably exceeding the IEEE 519 and NEPRA grid code threshold of 5%. The built-in digital signal processors (DSP) continuously regulate power factor between 0.8 leading and 0.8 lagging, eliminating utility reactive power penalties for commercial enterprises.</li>
    <li><strong>Comprehensive Surge Protection Topology:</strong> Every installation is shielded with multi-stage Type-II DC and AC Surge Protective Devices (SPDs). These metal-oxide varistors (MOVs) clamp atmospheric lightning surges and switching spikes up to 40kA, instantly shunting destructive transients into dedicated chemical earth pits before they can reach sensitive inverter semiconductors.</li>
</ul>
HTML;
}

function getMetallurgicalGalvanizationSection($name)
{
    return <<<HTML
---

<h2>Metallurgical Science of Hot-Dip Galvanizing in Karachi's Coastal Belt</h2>
<p>Karachi’s coastal geography presents one of the most aggressive atmospheric corrosion zones in South Asia. Categorized under ISO 9223 as a <strong>C4 (High) to C5 (Very High / Coastal Marine)</strong> corrosivity environment, the atmosphere across southern Karachi—encompassing DHA Phases 1 through 8, Clifton Blocks 1 through 9, Manora, and Port Qasim—carries elevated concentrations of airborne sodium chloride (marine salt aerosols), persistent relative humidity between 70% and 85%, and industrial sulfur dioxide pollutants from vehicular traffic and port logistics.</p>

<p>Under these severe environmental conditions, standard cold-galvanized (electro-galvanized) steel stands with a microscopic zinc coating of 10 to 15 microns fail rapidly. Within 18 to 24 months, salt mist penetrates the porous surface, leading to severe red rust (iron oxide), flaking, and catastrophic structural section loss. <strong>FWB Ventures</strong> rejects electroplated steel, exclusively manufacturing structural mounting frames using full-immersion <strong>Hot-Dip Galvanization conforming strictly to ASTM A123 / ISO 1461</strong>.</p>

<h3>The Four Metallurgical Alloy Layers of FWB Ventures Hot-Dip Galvanizing</h3>
<p>Unlike paint or electroplating, which merely form a fragile surface film, our full-immersion process submerses heavy 12-gauge structural steel into a molten zinc bath heated to $450^\circ\text{C}$. This triggers a metallurgical diffusion reaction that bonds zinc and iron into four distinct intermetallic alloy layers:</p>

<ol>
    <li><strong>Gamma ($\Gamma$) Layer:</strong> The innermost metallurgical layer, consisting of 75% zinc and 25% iron, chemically fused directly to the steel base with an extraordinary hardness of 250 DPH (Diamond Pyramid Hardness)—harder than the base structural steel itself!</li>
    <li><strong>Delta ($\delta$) Layer:</strong> A dense columnar alloy crystal layer consisting of 90% zinc and 10% iron, delivering exceptional mechanical resistance against gouging and coastal wind abrasion.</li>
    <li><strong>Zeta ($\zeta$) Layer:</strong> An elongated crystal matrix of 94% zinc and 6% iron, providing a rugged protective buffer against airborne particulate impact during Karachi's dry dust storms.</li>
    <li><strong>Eta ($\eta$) Layer:</strong> The outermost 100% pure zinc layer, providing brilliant sacrificial cathodic protection. Even if the frame is deeply scratched by installation tools, the surrounding zinc sacrifices itself to seal the exposed steel, preventing rust from ever taking hold.</li>
</ol>

<p>Every structural stand fabricated by FWB Ventures achieves a certified zinc coating thickness exceeding <strong>85 microns ($610\,\text{g/m}^2$)</strong>. Measured with calibrated magnetic eddy-current thickness gauges, this heavy galvanization guarantees <strong>25+ years of structural integrity</strong> without requiring a single coat of maintenance paint!</p>
HTML;
}

function getDetailedNetMeteringTariffSection($name)
{
    return <<<HTML
---

<h2>2026 K-Electric Net-Metering Economics & S.R.O. Regulatory Analysis</h2>
<p>Understanding the exact financial return of <strong>{$name}</strong> requires an analysis of the latest regulatory frameworks governed by the <strong>National Electric Power Regulatory Authority (NEPRA)</strong> under S.R.O. 892(I)/2015 and executed locally by <strong>K-Electric</strong>. Under current macroeconomic conditions in Pakistan, net metering represents the single most profitable financial hedge available to property owners against continuous currency depreciation and power tariff increases.</p>

<h3>The Mechanics of K-Electric Bi-Directional Billing</h3>
<p>When you install a {$name} with K-Electric net metering, your existing standard three-phase electricity meter is replaced with an advanced, utility-grade <strong>bi-directional green digital meter</strong>. This meter features independent registers that simultaneously record two critical data streams:</p>

<ul>
    <li><strong>Import kWh (Energy Consumed):</strong> The total electricity units drawn from K-Electric during nighttime hours, heavily overcast weather, or periods when building consumption exceeds instantaneous solar array generation.</li>
    <li><strong>Export kWh (Surplus Solar Fed into the Grid):</strong> The excess solar electricity generated during bright daylight hours (typically between 9:00 AM and 4:30 PM) that flows out of your property into K-Electric's local distribution network.</li>
</ul>

<h3>Financial Netting & Tariff Arbitrage Calculation</h3>
<p>At the end of each monthly billing cycle, K-Electric’s billing computers calculate your net bill based on a three-tier settlement formula:</p>

<ol>
    <li><strong>Scenario A: Consumption Exceeds Export (Net Import):</strong> If your facility consumes 1,200 units from the grid and exports 900 units of surplus solar, you are billed only for the net difference of 300 units. By eliminating 900 units from your top billing slabs (which carry the highest marginal tariff of PKR 68 to PKR 75 per unit), you achieve an immediate 75% to 85% bill reduction.</li>
    <li><strong>Scenario B: Export Exceeds Consumption (Net Credit Bank):</strong> If your solar system generates an abundant surplus—such as exporting 1,500 units while consuming only 1,100 units—the net surplus of 400 kWh is not lost. K-Electric automatically credits this balance to your account as banked energy units. These banked units roll forward indefinitely, offsetting high electricity consumption during peak summer air-conditioning months.</li>
    <li><strong>Quarterly Financial Cash Settlement:</strong> If your account maintains a continuous net export credit balance over three consecutive billing months, K-Electric settles the surplus via direct financial credit or payout at the applicable NEPRA-notified export buyback tariff.</li>
</ol>

<p>This financial structure provides an extraordinary, inflation-proof return on investment. While traditional bank term deposits yield 12% to 14% before tax, and real estate rental yields average 4% to 5% in Karachi, an FWB Ventures turnkey solar installation delivers an annualized, tax-free capital return of <strong>35% to 65%</strong>, ensuring complete capital payback in under 2 years!</p>
HTML;
}

function getOperationsSLASection($name)
{
    return <<<HTML
---

<h2>Comprehensive Operations & Maintenance (O&M) Protocols by FWB Ventures</h2>
<p>Achieving a continuous, high-performance 25-to-30 year operational lifecycle from your <strong>{$name}</strong> requires proactive preventative maintenance. FWB Ventures does not simply install your system and walk away; we support every client with dedicated, long-term Operations & Maintenance (O&M) programs across all Karachi sectors.</p>

<h3>The FWB Ventures 5-Point Preventative Maintenance Protocol</h3>
<ol>
    <li><strong>De-Ionized Pure Water Panel Washing:</strong> We deploy mobile reverse osmosis (RO) filtration systems that wash solar modules with purified water ($< 10\,\text{ppm}$ TDS). This eliminates dust and salt encrustation without leaving abrasive limescale deposits, restoring up to 20% of lost seasonal generation.</li>
    <li><strong>Calibrated Infrared Thermal Imaging (FLIR IR):</strong> Our certified thermographers scan all photovoltaic modules, combiner boxes, and inverter DC terminals using calibrated infrared cameras to detect micro-cracks, localized cell hotspots, and loose connections before they can cause component failure.</li>
    <li><strong>Torque Calibration of All Mechanical & Electrical Fasteners:</strong> Utilizing calibrated torque wrenches, our engineers re-torque all structural bolts to 45 Nm and electrical busbar terminals to 12 Nm to ensure thermal cycling does not loosen connections over time.</li>
    <li><strong>Earth Loop Resistance Verification:</strong> We perform annual earth impedance testing using three-point fall-of-potential megger instruments, rejuvenating chemical moisture compounds in earth pits to permanently maintain resistance below $3\,\Omega$.</li>
    <li><strong>24/7 Cloud Telemetry & Inverter Firmware Updates:</strong> Our central monitoring desk tracks system health, daily yield, and error logs in real time, remotely pushing manufacturer firmware patches and dispatching emergency response teams within 4 to 24 hours of any fault detection.</li>
</ol>
HTML;
}
