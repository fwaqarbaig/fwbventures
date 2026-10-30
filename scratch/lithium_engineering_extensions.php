<?php

/**
 * FWB Ventures - Lithium Battery Engineering Extensions
 * Provides in-depth electrochemical, electrical, and thermal engineering sections
 * specifically calibrated for Karachi, Sindh, Pakistan.
 */
function getLithiumElectrochemistrySection($serviceTitle)
{
    return <<<'HTML'
<h2>Grade-A LiFePO4 Electrochemistry vs Conventional Lead-Acid in Karachi</h2>
<p>Energy storage reliability in Karachi is heavily dictated by ambient operating temperature and depth of daily discharge. Traditional lead-acid batteries, including tubular deep-cycle and flooded OPzS cells, rely on sponge lead and lead dioxide submerged in sulfuric acid electrolyte. In Karachi’s prolonged summer climate, where battery room ambient temperatures frequently hover between 38&deg;C and 44&deg;C, lead-acid batteries undergo rapid positive grid corrosion, electrolyte dry-out, and active material shedding. When subjected to frequent daily K-Electric outage cycles, lead-acid batteries experience severe Peukert capacity loss, delivering less than 50% usable energy and failing within 18 to 24 months.</p>

<p>In contrast, FWB Ventures deploys automotive-grade Grade-A Lithium Iron Phosphate (LiFePO4) prismatic cells. The olivine crystal structure of LiFePO4 features robust covalent P-O chemical bonds that remain structurally stable up to 270&deg;C, eliminating the risk of oxygen release and catastrophic thermal runaway inherent in nickel-manganese-cobalt (NMC) chemistries. Operating at a nominal cell potential of 3.2V (assembled into 4S for 12.8V, 8S for 25.6V, or 16S for 51.2V configurations), these cells exhibit negligible internal impedance (less than 0.5 milliohms per cell), supporting 1C continuous discharge without significant voltage drop.</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left border-collapse border border-slate-200 text-sm">
        <thead class="bg-slate-100 text-slate-800 font-semibold">
            <tr>
                <th class="p-3 border border-slate-200">Engineering Parameter</th>
                <th class="p-3 border border-slate-200">FWB Ventures Grade-A LiFePO4</th>
                <th class="p-3 border border-slate-200">Tubular Deep-Cycle Lead-Acid</th>
                <th class="p-3 border border-slate-200">NMC Lithium-Ion</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-700">
            <tr>
                <td class="p-3 border font-medium">Nominal Cell Voltage</td>
                <td class="p-3 border text-sky-700 font-semibold">3.2V (16S = 51.2V)</td>
                <td class="p-3 border">2.0V (6S = 12.0V)</td>
                <td class="p-3 border">3.7V (14S = 51.8V)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Cycle Life @ 80% DoD (25&deg;C)</td>
                <td class="p-3 border text-sky-700 font-semibold">6,000 to 8,000 Cycles</td>
                <td class="p-3 border">800 to 1,200 Cycles</td>
                <td class="p-3 border">1,500 to 2,000 Cycles</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Cycle Life @ 40&deg;C (Karachi Summer)</td>
                <td class="p-3 border text-sky-700 font-semibold">4,500+ Cycles (12+ Years)</td>
                <td class="p-3 border">350 to 500 Cycles (1.5 Years)</td>
                <td class="p-3 border">900 to 1,200 Cycles</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Recommended Depth of Discharge (DoD)</td>
                <td class="p-3 border text-sky-700 font-semibold">90% to 95%</td>
                <td class="p-3 border">50% Maximum</td>
                <td class="p-3 border">80%</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Round-Trip Energy Efficiency</td>
                <td class="p-3 border text-sky-700 font-semibold">&gt; 96%</td>
                <td class="p-3 border">70% to 75%</td>
                <td class="p-3 border">92%</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Thermal Runaway Decomposition</td>
                <td class="p-3 border text-sky-700 font-semibold">270&deg;C (Non-combustible)</td>
                <td class="p-3 border">Acid Boilage / Hydrogen Gas</td>
                <td class="p-3 border">150&deg;C to 210&deg;C (Fire Hazard)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Gravimetric Energy Density</td>
                <td class="p-3 border text-sky-700 font-semibold">130 to 160 Wh/kg</td>
                <td class="p-3 border">30 to 40 Wh/kg</td>
                <td class="p-3 border">180 to 250 Wh/kg</td>
            </tr>
        </tbody>
    </table>
</div>

<p>By migrating from heavy lead-acid blocks to our high-density LiFePO4 packs, residential and commercial consumers in Karachi eliminate acid spillages, sulfuric fume exposure, toxic corrosion of metal battery racks, and tedious bi-weekly distilled water maintenance routines.</p>
HTML;
}

function getLithiumBmsProtocolSection($serviceTitle)
{
    return <<<'HTML'
<h2>Smart BMS Architecture & Inverter Closed-Loop Protocol Integration</h2>
<p>The intelligence, cycle longevity, and operational safety of our lithium battery solutions are driven by an industrial-grade Battery Management System (BMS). Unlike basic analog balance boards or dumb battery monitors, our advanced BMS continuously samples voltage across every individual cell with 1-millivolt accuracy, monitors current via a precision bidirectional Hall-effect sensor or shunt, and tracks pack internal temperature through multi-point NTC thermistors placed between cell blocks and the power MOSFET heatsink.</p>

<p>The primary advantage for solar and UPS users across Karachi is our seamless <strong>closed-loop communication</strong> with Tier-1 hybrid and off-grid inverters. Rather than relying on inaccurate battery voltage estimation (open-loop lead-acid logic), our BMS broadcasts real-time parameters directly to the inverter microprocessor over CANbus (Controller Area Network) or RS485 communication lines:</p>

<ul>
    <li><strong>Charge Voltage Limit (CVL):</strong> Dynamically requested by the BMS based on the highest cell voltage and internal temperature. When any individual cell reaches 3.65V, the BMS commands the inverter to lower charging current, preventing cell stress.</li>
    <li><strong>Discharge Current Limit (DCL):</strong> Automatically governed to prevent high current surges from exceeding safe cell discharge thresholds, especially when large inductive loads (such as 1.5-ton inverter air conditioners or water pumping motors) start up.</li>
    <li><strong>State of Charge (SoC) Coulomb Counting:</strong> High-precision integration of ampere-hours into and out of the battery bank ensures true 0% to 100% capacity display, eliminating the notorious "voltage bounce" that causes lead-acid UPS units to shut down prematurely.</li>
    <li><strong>Inverter Compatibility Ecosystem:</strong> Pre-configured protocols support Deye (Sun-3K to 12K-SG04LP3 / SG01LP1), Solis, Sungrow, GoodWe, Growatt (SPF/SPH), Inverex Nitrox / Veyron, InfiniSolar, Huawei, and Voltronic Axpert architectures.</li>
</ul>

<p>In addition to inverter closed-loop orchestration, the BMS features dual-layer electronic and hardware protection. An automated short-circuit disconnect breaks current flow in less than 200 microseconds, safeguarding cell interconnect busbars and inverter DC capacitors from damaging faults.</p>
HTML;
}

function getLithiumKarachiThermalSection($serviceTitle)
{
    return <<<'HTML'
<h2>Karachi High-Heat Engineering & Coastal Salt-Fog Environmental Hardening</h2>
<p>Karachi presents a demanding environmental challenge for electrical energy storage systems. Properties in DHA Phases 1 through 8, Clifton, Keamari, and Korangi Creek operate in a hyper-saline marine atmosphere characterized by continuous ocean humidity, salt-fog mist, and airborne chloride deposits. Unprotected battery terminals, standard steel enclosures, and unsealed circuit boards experience galvanic corrosion, contact resistance buildup, terminal overheating, and premature BMS microprocessor failure.</p>

<p>FWB Ventures engineers every lithium battery enclosure with multi-stage environmental hardening:</p>
<ol>
    <li><strong>Cold-Rolled Steel with Electrostatic Powder Coating:</strong> Robust 1.5mm cold-rolled steel enclosures undergo zinc phosphatizing followed by an outdoor-grade electrostatic polyester powder coat, passing 500-hour ASTM B117 salt-spray corrosion tests.</li>
    <li><strong>Marine-Grade Brass & Nickel-Plated Copper Terminals:</strong> High-amperage M8 terminal studs are machined from solid brass and nickel-plated to prevent oxidation, accompanied by flame-retardant insulating terminal boots.</li>
    <li><strong>Conformal-Coated BMS Circuitry:</strong> All internal BMS printed circuit boards are coated with a dual-layer siliconized moisture-proof, anti-fungal, and anti-static conformal sealant, insulating delicate microchips from marine humidity.</li>
    <li><strong>Thermal Dissipation & Karachi Ambient Cooling:</strong> Ambient temperatures in Karachi frequently surpass 42&deg;C during April to October. Our wall-mounted Powerwalls and 19-inch rack enclosures incorporate passive vertical convection heat-sinking channels paired with whisper-quiet, dual ball-bearing exhaust fans. The BMS maintains an active high-temperature charge cut-off at 55&deg;C and discharge cut-off at 65&deg;C, ensuring absolute safety under the most severe peak heat conditions.</li>
</ol>
HTML;
}

function getLithiumInstallationCommissioningSection($serviceTitle)
{
    return <<<'HTML'
<h2>Professional Commissioning, DC Circuit Protection & Cable Sizing Standards</h2>
<p>A high-performance lithium battery bank requires precision electrical engineering at the point of installation. Lithium cells possess extremely low internal resistance, which means a direct short circuit or improper cable termination can release immense fault currents within milliseconds. FWB Ventures enforces rigorous engineering standards across all Karachi residential and commercial installations:</p>

<ul>
    <li><strong>Pure Copper Ultra-Flexible DC Cables:</strong> We utilize double-insulated, oxygen-free 100% pure copper cables with Class 5 or Class 6 flexible stranding (rated to 1,000V DC and 105&deg;C). Cable gauges are engineered to maintain voltage drop below 1% at maximum continuous current:
        <ul>
            <li>For 12V 100Ah/200Ah systems (up to 100A discharge): 25mm&sup2; to 35mm&sup2; pure copper cabling.</li>
            <li>For 24V 100Ah/200Ah systems (up to 120A discharge): 35mm&sup2; to 50mm&sup2; pure copper cabling.</li>
            <li>For 48V/51.2V 100Ah/200Ah systems (up to 150A discharge): 50mm&sup2; to 70mm&sup2; pure copper cabling.</li>
        </ul>
    </li>
    <li><strong>Heavy-Duty Hydraulic Hexagonal Crimping:</strong> All cable lugs are tinned copper heavy-duty bell-mouth terminals, crimped using calibrated 12-ton hydraulic tools and sealed with polyolefin flame-retardant dual-wall heat-shrink tubing containing internal adhesive glue.</li>
    <li><strong>Dedicated DC Isolation & Overcurrent Protection:</strong> Every battery bank is installed with a polarized DC Molded Case Circuit Breaker (MCCB) or high-speed Class aR semiconductor fuse (such as Bussmann or Schneider Electric DC isolators rated at 125A, 160A, or 250A DC). This ensures fast galvanic disconnection in emergency conditions without drawing an electric arc.</li>
    <li><strong>Busbar Paralleling & Multi-Pack Current Balance:</strong> When paralleling multiple 5.12kWh rack batteries or Powerwalls (scalable up to 16 units for 81.92kWh total capacity), FWB Ventures installs an engineered central DC busbar cabinet. Diagonal connection topology ensures identical cable loop resistance across all parallel strings, preventing one battery pack from carrying disproportionate load.</li>
</ul>
HTML;
}

function getLithiumFinancialEconomicsSection($serviceTitle)
{
    return <<<'HTML'
<h2>10-Year Levelized Cost of Storage (LCOS) vs Lead-Acid Economics in Pakistan</h2>
<p>While the upfront purchase price of a LiFePO4 battery pack is higher than conventional flooded or tubular lead-acid batteries, a rigorous Levelized Cost of Storage (LCOS) financial assessment demonstrates that lithium is substantially cheaper over a 5 to 10-year operating horizon in Karachi.</p>

<p>Consider a standard residential solar or UPS setup requiring <strong>4.8 kWh of usable nighttime storage</strong>:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left border-collapse border border-slate-200 text-sm">
        <thead class="bg-slate-100 text-slate-800 font-semibold">
            <tr>
                <th class="p-3 border border-slate-200">Economic Factor</th>
                <th class="p-3 border border-slate-200">Tubular Lead-Acid Bank (4x 200Ah 12V)</th>
                <th class="p-3 border border-slate-200">FWB Ventures 51.2V 100Ah LiFePO4</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-700">
            <tr>
                <td class="p-3 border font-medium">Nominal Bank Capacity</td>
                <td class="p-3 border">9.60 kWh (4x 12V 200Ah)</td>
                <td class="p-3 border text-sky-700 font-semibold">5.12 kWh (1x 51.2V 100Ah)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Usable Energy (@ Safe DoD)</td>
                <td class="p-3 border">4.80 kWh (50% DoD limit)</td>
                <td class="p-3 border text-sky-700 font-semibold">4.61 kWh (90% DoD standard)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Expected Lifespan in Karachi Heat</td>
                <td class="p-3 border">2.0 to 2.5 Years (800 cycles)</td>
                <td class="p-3 border text-sky-700 font-semibold">12 to 15 Years (6,000+ cycles)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Initial Capital Outlay (PKR)</td>
                <td class="p-3 border">Rs. 240,000 (Rs. 60,000 x 4)</td>
                <td class="p-3 border text-sky-700 font-semibold">Rs. 275,000 to Rs. 295,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Replacements Needed in 10 Years</td>
                <td class="p-3 border">4 to 5 Complete Replacements</td>
                <td class="p-3 border text-sky-700 font-semibold">0 (Zero Replacements)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">10-Year Battery Acquisition Cost</td>
                <td class="p-3 border">Rs. 960,000 to Rs. 1,200,000</td>
                <td class="p-3 border text-sky-700 font-semibold">Rs. 275,000 to Rs. 295,000</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">10-Year Electricity Charging Losses</td>
                <td class="p-3 border">Rs. 185,000 (25% round-trip loss)</td>
                <td class="p-3 border text-sky-700 font-semibold">Rs. 30,000 (4% round-trip loss)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Distilled Water & Maintenance Costs</td>
                <td class="p-3 border">Rs. 48,000 (Monthly top-ups)</td>
                <td class="p-3 border text-sky-700 font-semibold">Rs. 0 (Completely Maintenance-Free)</td>
            </tr>
            <tr class="bg-sky-50 font-bold text-slate-900">
                <td class="p-3 border">Total 10-Year Cost of Ownership</td>
                <td class="p-3 border text-red-700">Rs. 1,193,000+</td>
                <td class="p-3 border text-sky-700">Rs. 305,000 to Rs. 325,000</td>
            </tr>
            <tr class="bg-emerald-50 font-bold text-emerald-900">
                <td class="p-3 border">Net Financial Savings with Lithium</td>
                <td class="p-3 border" colspan="2">Rs. 868,000+ Saved per 5kWh Storage Block Over 10 Years</td>
            </tr>
        </tbody>
    </table>
</div>

<p>When evaluated over a 10-year timeframe, investing in FWB Ventures Grade-A LiFePO4 batteries reduces total energy storage expenditure by more than 70%. In addition to pure monetary savings, homeowners and commercial enterprises avoid the frustration of sudden battery failures in the middle of summer heatwaves.</p>
HTML;
}
