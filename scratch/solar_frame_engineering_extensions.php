<?php

/**
 * FWB Ventures - Solar Frame Engineering Extensions
 * Provides in-depth structural, metallurgical, and environmental engineering sections
 * specifically calibrated for solar mounting structures in Karachi, Sindh, Pakistan.
 */
function getSolarFrameWindEngineeringSection($serviceTitle)
{
    return <<<'HTML'
<h2>Structural Wind Aerodynamics & SBCA Uplift Engineering in Karachi</h2>
<p>Karachi’s geographical exposure along the Arabian Sea creates a severe aerodynamic environment for rooftop and ground-mounted solar installations. Unlike inland cities with low, steady wind patterns, Karachi experiences intense thermal afternoon sea breezes, seasonal monsoon squalls, and tropical coastal depressions. Unengineered solar structures utilizing lightweight sheet metal or unbraced frames experience structural fatigue, fastener pull-out, and catastrophic wind uplift failure.</p>

<p>In accordance with the <strong>Pakistan Building Code (PBC-2021)</strong> and <strong>Sindh Building Control Authority (SBCA)</strong> standards, FWB Ventures designs every solar mounting framework to safely withstand basic design wind speeds of <strong>38 m/s to 42 m/s (136 km/h to 150 km/h)</strong>. When wind flows over a solar array tilted between 20&deg; and 26&deg; South, it generates significant negative aerodynamic pressure (suction) on the leeward surface. Structural wind pressure is calculated using the standard aerodynamic formulation:</p>

<div class="bg-slate-50 p-6 rounded-lg border border-slate-200 my-6 font-mono text-sm text-slate-800">
    <p class="font-bold text-slate-900 mb-2">Aerodynamic Velocity Pressure Formula:</p>
    <p>q<sub>z</sub> = 0.613 &times; K<sub>z</sub> &times; K<sub>zt</sub> &times; K<sub>d</sub> &times; V<sup>2</sup> &times; I</p>
    <p class="text-xs text-slate-600 mt-2 font-sans">Where K<sub>z</sub> is the terrain exposure velocity coefficient, K<sub>zt</sub> is the topographic factor, K<sub>d</sub> is the wind directionality factor (0.85), V is the basic wind speed (140 km/h), and I is the building importance factor.</p>
</div>

<p>To resist calculated uplift forces exceeding 1.2 to 1.8 kN/m&sup2;, our structural engineers incorporate diagonal knee-bracing, triangulated truss profiles, and heavy-duty gusset reinforcement plates at all critical moment-resisting beam-to-column joints. This ensures the structural frame transfers aerodynamic uplift loads safely into the building’s primary reinforced concrete columns without flexing or stressing photovoltaic glass modules.</p>
HTML;
}

function getSolarFrameGalvanizationSection($serviceTitle)
{
    return <<<'HTML'
<h2>ASTM A123 Hot-Dip Galvanizing Metallurgy & Marine Salt-Fog Protection</h2>
<p>The single greatest operational hazard for solar mounting structures in Karachi is atmospheric chloride corrosion. Marine atmospheric zones—including DHA Phases 1 through 8, Clifton, Keamari, Korangi Creek, and Port Qasim—carry dense marine salt-fog mist and coastal humidity averaging above 75% year-round. Ordinary commercial steel frames, spray-painted iron angles, or thin pre-galvanized (Pre-GI) sheets with only 10 to 20 microns of zinc deteriorate into destructive red rust within 24 to 36 months.</p>

<p>FWB Ventures guarantees structural longevity by subjecting all fabricated steel components to the rigorous <strong>ASTM A123 / ISO 1461 Hot-Dip Galvanizing standard</strong>:</p>

<ol>
    <li><strong>Full Immersion Zinc Bath:</strong> Fabricated steel members (after all cutting, punching, and welding are 100% complete) are submerged into a molten zinc bath held at 450&deg;C. This guarantees that all internal surfaces, pre-punched bolt holes, and heat-affected weld zones receive complete metallurgical coverage.</li>
    <li><strong>Metallurgical Intermetallic Bonding:</strong> Molten zinc alloys directly with the base carbon steel, forming a series of iron-zinc alloy layers (Gamma, Delta, and Zeta layers) capped by a pure zinc Eta outer layer. The inner alloy layers actually exceed the structural hardness of the base steel itself, providing superior abrasion resistance against airborne Karachi desert sand particles.</li>
    <li><strong>85 to 120 Micron Coating Thickness:</strong> While cheap pre-galvanized sheets offer less than 20 microns of zinc, our hot-dip galvanized coating measures between 85 and 120 microns (minimum 610 g/m&sup2;). In Karachi’s marine corrosive category C4/C5 environment, where zinc degrades at approximately 2 to 3 microns annually, an 85+ micron hot-dip coating guarantees 25 to 30 years of zero-maintenance structural service.</li>
    <li><strong>Cathodic Sacrificial Protection:</strong> If the structural coating is scratched during solar panel mounting, the surrounding zinc sacrifices itself galvanically, sealing the exposed iron and preventing rust creep beneath the surface.</li>
</ol>
HTML;
}

function getSolarFrameRoofAnchoringSection($serviceTitle)
{
    return <<<'HTML'
<h2>Precision Chemical Anchoring & RCC Roof Slab Waterproofing Integrity</h2>
<p>A major concern for homeowners, corporate facility directors, and commercial developers in Karachi is protecting the integrity of the building’s reinforced concrete (RCC) roof slab. Drilling mechanically expanding wedge anchors frequently cracks aged concrete, damages internal reinforcing rebars, creates structural micro-fractures, and causes persistent ceiling water leaks during the monsoon rainy season.</p>

<p>FWB Ventures eliminates roof damage through engineered <strong>pure epoxy chemical injection anchoring</strong>:</p>

<ul>
    <li><strong>Chemical Injection Anchoring System:</strong> We utilize Hilti HIT-RE 500 V3 or Fischer high-performance pure epoxy injection resins paired with Grade 8.8 hot-dip galvanized or AISI 316 stainless steel threaded anchor studs. Resin holes are diamond-core drilled to an engineered embedment depth of 100mm to 125mm (4 to 5 inches), completely avoiding expansion stresses and achieving pull-out tensile resistances exceeding 25 kN per anchor stud.</li>
    <li><strong>Concrete Rebar Detection:</strong> Before drilling, our technicians scan the concrete slab using electronic electromagnetic cover meters to pinpoint internal rebar positions, ensuring no structural reinforcing bars are severed or compromised.</li>
    <li><strong>Dual-Barrier Elastomeric Waterproofing:</strong> Each structural base plate is installed over a 5mm high-density EPDM rubber isolation gasket that dampens structural vibrations and seals the anchor interface. Following mechanical torquing to specified foot-pounds with calibrated torque wrenches, the entire perimeter of the base plate and bolt penetrations is encapsulated in heavy-duty polyurethane (PU) elastomeric sealant.</li>
    <li><strong>Reinforced Concrete Plinths (Pedestals):</strong> For elevated pergolas and high-clearance structures, we construct integrated RCC plinths (300mm &times; 300mm &times; 200mm curbs) directly over structural roof beams. This elevates steel base plates above standing roof ponding water, preserving structural integrity for decades.</li>
</ul>
HTML;
}

function getSolarFrameMaterialComparisonSection($serviceTitle)
{
    return <<<'HTML'
<h2>Material Engineering Matrix: Hot-Dip Steel vs Aluminum 6063-T5 vs FRP Composites</h2>
<p>Selecting the optimal mounting material depends on structural span requirements, building roof dead load limitations, and proximity to Karachi's coastal salt breeze. FWB Ventures manufactures and installs across all three leading structural material classifications:</p>

<div class="overflow-x-auto my-6">
    <table class="w-full text-left border-collapse border border-slate-200 text-sm">
        <thead class="bg-slate-100 text-slate-800 font-semibold">
            <tr>
                <th class="p-3 border border-slate-200">Engineering Parameter</th>
                <th class="p-3 border border-slate-200">Hot-Dip Galvanized Steel (ASTM A123)</th>
                <th class="p-3 border border-slate-200">Structural Aluminum (6063-T5 Anodized)</th>
                <th class="p-3 border border-slate-200">Pultruded FRP Composite (E-Glass)</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-700">
            <tr>
                <td class="p-3 border font-medium">Primary Alloy / Composition</td>
                <td class="p-3 border font-semibold text-sky-700">Structural Carbon Steel (Q235B / Q345B)</td>
                <td class="p-3 border">Al-Mg-Si Alloy (6063-T5)</td>
                <td class="p-3 border font-semibold text-sky-700">Isophthalic Polyester + E-Glass Fiber</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Corrosion Protection</td>
                <td class="p-3 border font-semibold text-sky-700">85–120&mu;m Hot-Dip Molten Zinc</td>
                <td class="p-3 border">15&mu;m Clear Anodized Layer</td>
                <td class="p-3 border font-semibold text-sky-700">100% Non-Metallic (Chemically Inert)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Yield Strength (Mechanical Rigidity)</td>
                <td class="p-3 border font-semibold text-sky-700">235 to 345 MPa (Highest Rigidity)</td>
                <td class="p-3 border">160 to 210 MPa</td>
                <td class="p-3 border">250 to 300 MPa (Tensile)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Dead Weight Load on Roof Slab</td>
                <td class="p-3 border">28 to 35 kg per panel</td>
                <td class="p-3 border font-semibold text-sky-700">10 to 14 kg per panel (Ultra-Light)</td>
                <td class="p-3 border font-semibold text-sky-700">12 to 16 kg per panel (Lightweight)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Electrical Conductivity</td>
                <td class="p-3 border">Electrically Conductive (Requires Earthing)</td>
                <td class="p-3 border">Electrically Conductive (Requires Earthing)</td>
                <td class="p-3 border font-semibold text-sky-700">Non-Conductive (Zero Grounding Hazard)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Coastal Lifespan in DHA / Clifton</td>
                <td class="p-3 border font-semibold text-sky-700">25+ Years</td>
                <td class="p-3 border">20+ Years</td>
                <td class="p-3 border font-semibold text-sky-700">30+ Years (Zero Rust Ever)</td>
            </tr>
            <tr>
                <td class="p-3 border font-medium">Best Application in Karachi</td>
                <td class="p-3 border font-semibold text-sky-700">High Elevated Pergolas & Carports</td>
                <td class="p-3 border">Low-Rise L2/L3 Rooftop Racks</td>
                <td class="p-3 border font-semibold text-sky-700">Coastal Bungalows & Chemical Plants</td>
            </tr>
        </tbody>
    </table>
</div>

<p>For high-clearance elevated pergolas requiring wide column spans (over 4 to 6 meters), Hot-Dip Galvanized Steel remains the undisputed industry standard due to its immense modulus of elasticity. For seaside residential roofs seeking to minimize dead weight or chemical plants exposed to aggressive acidic vapors, FRP composites offer an exceptional rust-free alternative.</p>
HTML;
}

function getSolarFrameTiltOrientationSection($serviceTitle)
{
    return <<<'HTML'
<h2>Optimal Tilt Angle & Southern Azimuth Solar Geometry in Karachi</h2>
<p>Karachi is geographically positioned at latitude <strong>24.8607&deg; N</strong>. Achieving maximum annual photovoltaic kilowatt-hour generation requires precise tilt angle orientation and azimuth alignment:</p>

<ul>
    <li><strong>Optimal Year-Round Tilt Angle:</strong> For fixed-tilt residential and commercial solar structures in Karachi, the ideal tilt angle is engineered between <strong>22&deg; and 25&deg;</strong> facing True South (180&deg; Azimuth). This tilt geometry maximizes solar irradiance capture during both the high summer sun path and low winter angles, delivering an average annual solar irradiation of 5.3 to 5.6 peak sun hours daily.</li>
    <li><strong>Seasonal Adjustable Tilt vs Fixed Mounts:</strong> While seasonal adjustable frames (allowing manual adjustment between 15&deg; in summer and 32&deg; in winter) can theoretically increase annual yield by 3.5% to 4.5%, the added mechanical hinge points increase wind vulnerability during Karachi monsoon storms. FWB Ventures recommends robust fixed-tilt structural geometry engineered for permanent structural rigidity and maintenance-free operation.</li>
    <li><strong>Aerodynamic Wind Spoilers & Inter-Row Spacing:</strong> In multi-row commercial rooftop installations, arrays are spaced using shadow angle calculation formulas (minimum 1.8 to 2.2 times the panel vertical height) to prevent winter morning inter-row shading. Aerodynamic rear wind deflector plates are installed on the final northern row to guide oncoming air currents over the array, reducing total roof overturning moments by up to 35%.</li>
</ul>
HTML;
}

function getSolarFrameSeismicEarthingSection($serviceTitle)
{
    return <<<'HTML'
<h2>Electrical Grounding, Lightning Protection & Zone 2B Seismic Design</h2>
<p>Elevated rooftop solar frames and commercial carports present prominent electrical lightning strike targets and dynamic seismic mass on Karachi structures:</p>

<ul>
    <li><strong>Equipotential Earth Grounding & Lightning Dissipation:</strong> Metallic solar mounting frameworks must be bonded into a low-impedance electrical earthing network. FWB Ventures installs continuous 25mm&sup2; bare stranded copper earth conductors or tinned copper bonding braids linking every individual structural purlin, rafter, and panel aluminum frame via stainless steel grounding teeth clamps (WEEB clips). Earth resistance is engineered and verified with calibrated earth ground testers to remain strictly below <strong>5 Ohms</strong>. For high-rise elevated pergolas in DHA and Clifton, dedicated early streamer emission (ESE) lightning air terminals and surge protective devices (Type 1+2 SPD) protect sensitive solar inverters and household electronics from indirect atmospheric transients.</li>
    <li><strong>Zone 2B Seismic Structural Ductility:</strong> Under the Pakistan Building Code seismic hazard zoning map, Karachi is classified within <strong>Seismic Zone 2B</strong> (moderate seismic hazard with peak ground acceleration values between 0.16g and 0.24g). When a 10kW to 50kW solar array is elevated 9 feet above an RCC roof slab, the elevated mass exerts dynamic lateral inertial forces during seismic events. Our structural engineers design ductile moment-resisting beam-to-column frames with cross-bracing and slotted bolt connections that absorb vibrational energy, preventing brittle joint fractures or structural resonance during seismic tremors.</li>
</ul>
HTML;
}
