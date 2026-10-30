<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/area_builder_solar.php';
require __DIR__.'/area_builder_solar_frame.php';
require __DIR__.'/area_builder_cctv.php';
require __DIR__.'/area_builder_lithium.php';

// Master Area Definitions
$areaMasterList = [
    'bahria-town-karachi' => [
        'name' => 'Bahria Town Karachi',
        'full_name' => 'Bahria Town Karachi (Precincts 1 to 31, Sports City, Golf City & Farmhouses)',
        'solar' => [
            'challenges' => 'High open-plain wind shear (up to 140 km/h), intense summer ambient temperatures (42°C+), and grid fluctuations on the Super Highway corridor.',
            'popular_sizing' => '10kW, 15kW, 20kW, and 30kW Luxury Villa Hybrid Systems',
            'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas (8.5 ft clear height) preserving full terrace usage, engineered to Bahria Town architectural guidelines.',
            'bylaws' => 'Bahria Town Design & Town Planning Bylaws',
            'savings' => 'PKR 85,000 to PKR 250,000+ per month',
        ],
        'frame' => [
            'challenges' => 'High open-plain wind gusts (up to 140 km/h), intense summer sun exposure, and strict society parapet regulations.',
            'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas (8.5ft clear height) and L2/L3 stands',
            'bylaws' => 'Bahria Town Building Control & Architectural Guidelines',
            'popular_profiles' => 'Elevated Pergolas, Gazebo Frames, and Villa Roof Mounts',
        ],
        'cctv' => [
            'security_focus' => 'Villa perimeter intrusion prevention, front gate visitor tracking, high-speed road surveillance, and continuous night monitoring across expansive plots.',
            'recommended_cameras' => '4K ColorVu Turrets for entrances, 8MP AI AcuSense Bullets for boundary walls, and 25x Optical Zoom PTZ Speed Domes for open compounds.',
            'cabling_type' => 'Cat6 SFTP 100% pure copper shielded outdoor cabling routed in UV-stabilized rigid PVC conduits',
            'bylaws' => 'Bahria Town Security & Building Control bylaws',
            'popular_packages' => '4-Camera Villa, 8-Camera Luxury Bungalow, and 16-Camera Commercial Plaza NVR Systems',
        ],
        'lithium' => [
            'power_profile' => 'High residential air-conditioning loads during peak summer heat, occasional grid feeder tripping on the M-9 Super Highway corridor, and desire for silent, zero-emission luxury power backup.',
            'recommended_batteries' => '5.12kWh and 10.24kWh Wall-Mounted LiFePO4 Powerwalls, paired with 8kW to 15kW Hybrid Inverters for multi-ton AC backup.',
            'savings' => 'Completely eliminates noisy diesel generator maintenance and fuel costs while delivering 12-15+ years of daily solar self-consumption',
            'bylaws' => 'Bahria Town electrical safety standards and environmental regulations',
        ],
    ],

    'dha-karachi' => [
        'name' => 'DHA Karachi',
        'full_name' => 'DHA (Defence Housing Authority) Phases 1 through 8 & Creek Vistas',
        'solar' => [
            'challenges' => 'Aggressive coastal marine salt fog, high humidity (75%+), strict CBC/DHA architectural guidelines, and high wind shear along the Arabian Sea beachfront.',
            'popular_sizing' => '10kW, 15kW, 20kW, and 25kW Luxury Bungalow Systems',
            'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas (8.5 ft clear height) preserving 100% of the terrace for family leisure.',
            'bylaws' => 'Cantonment Board Clifton (CBC) & DHA Building Regulations',
            'savings' => 'PKR 90,000 to PKR 280,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Direct marine salt air corrosion, coastal wind turbulence up to 150 km/h, and CBC parapet height limits.',
            'preferred_structure' => 'Marine-Grade ASTM A123 Hot-Dip Galvanized Pergolas (85µm+ zinc) with SS316 stainless fasteners',
            'bylaws' => 'Cantonment Board Clifton (CBC) & DHA Building Bylaws',
            'popular_profiles' => 'Luxury Rooftop Pergolas, Terrace Gazebos, and Elevated Carport Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Luxury bungalow boundary wall defense, multi-angle driveway monitoring, alleyway coverage, and staff/visitor access verification.',
            'recommended_cameras' => '4K ColorVu IP cameras with 24/7 full-color night vision, AcuSense human/vehicle detection, and vandal-proof dome cameras for porches.',
            'cabling_type' => 'Cat6 SFTP pure copper outdoor UV-resistant cabling with weatherproof IP67 junction boxes',
            'bylaws' => 'DHA & CBC residential security standards',
            'popular_packages' => '8-Camera Luxury Bungalow & 16-Camera Estate Surveillance Systems',
        ],
        'lithium' => [
            'power_profile' => 'High residential power consumption from multiple inverter air conditioners, central water chillers, and zero tolerance for generator noise in peaceful residential phases.',
            'recommended_batteries' => '10.24kWh and 15.36kWh LiFePO4 Powerwalls integrated with Deye/Huawei hybrid inverters.',
            'savings' => 'Saves hundreds of thousands in generator fuel while providing seamless sub-10ms power transfer during K-Electric feeder trips',
            'bylaws' => 'CBC & DHA fire safety and indoor equipment standards',
        ],
    ],

    'clifton-karachi' => [
        'name' => 'Clifton Karachi',
        'full_name' => 'Clifton Blocks 1 through 9, Marine Drive, Sea View & Old Clifton',
        'solar' => [
            'challenges' => 'Direct proximity to the Arabian Sea, heavy salt fog deposition, aggressive galvanic corrosion, and high rooftop wind velocities.',
            'popular_sizing' => '10kW to 30kW Residential & Commercial Installations',
            'preferred_structure' => 'Marine-Grade ASTM A123 Hot-Dip Galvanized Frames (85µm+ zinc) with SS316 stainless steel fasteners.',
            'bylaws' => 'CBC & KMC Clifton Zoning Bylaws',
            'savings' => 'PKR 85,000 to PKR 320,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Severe marine salt air oxidation, coastal squalls, and multi-story rooftop wind shear.',
            'preferred_structure' => 'Marine-Grade Hot-Dip Galvanized Pergolas and SS316 Stainless Fasteners',
            'bylaws' => 'CBC & Municipal Building Control Bylaws',
            'popular_profiles' => 'Elevated Pergolas, Commercial Rooftop Stands, and Terrace Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Diplomatic enclave security, corporate tower access control, luxury penthouse entryways, and seaside perimeter monitoring against moisture intrusion.',
            'recommended_cameras' => 'Marine-grade anti-corrosive 4K IP cameras with IP67 weatherproof seals, AI license plate recognition, and panoramic fisheye cameras.',
            'cabling_type' => 'Cat6 SFTP shielded copper with sealed gland connectors and chemical corrosion inhibitors',
            'bylaws' => 'Corporate and residential municipal security bylaws',
            'popular_packages' => '8-Camera Villa, 16-Camera Corporate Office, and 32-Camera Commercial Plaza Systems',
        ],
        'lithium' => [
            'power_profile' => 'Luxury penthouses, embassies, corporate headquarters, and high-end residences demanding compact, fume-free, high-density power backup.',
            'recommended_batteries' => 'Wall-mounted 5.12kWh and 10.24kWh LiFePO4 Powerwalls, and 19-inch Server-Rack ESS modules for corporate IT rooms.',
            'savings' => 'Eliminates indoor generator fumes, ensures 100% server uptime, and cuts peak K-Electric commercial tariffs',
            'bylaws' => 'Indoor residential and corporate fire compliance standards',
        ],
    ],

    'gulshan-e-iqbal-karachi' => [
        'name' => 'Gulshan-e-Iqbal Karachi',
        'full_name' => 'Gulshan-e-Iqbal Blocks 1 through 19, University Road & NIPA Corridor',
        'solar' => [
            'challenges' => 'Dense urban housing, multi-story parapet wall shading, overhead water tank obstructions, and three-phase load balancing.',
            'popular_sizing' => '5kW, 7kW, 10kW, and 12kW Residential Systems',
            'preferred_structure' => 'L2/L3 Low Profile Mounts & Elevated Terrace Stands maximizing usable shade-free space.',
            'bylaws' => 'Sindh Building Control Authority (SBCA) & KMC Bylaws',
            'savings' => 'PKR 45,000 to PKR 110,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Dense urban parapet shading, limited roof access, and urban wind channeling.',
            'preferred_structure' => 'Elevated Terrace Stands and L2/L3 Hot-Dip Galvanized Frames',
            'bylaws' => 'SBCA residential structural guidelines',
            'popular_profiles' => 'Elevated Rooftop Stands, L2 Mounts, and Water Tank Clearance Frames',
        ],
        'cctv' => [
            'security_focus' => 'Dense residential street security, commercial market shops, entrance gate monitoring, and vehicle parking protection.',
            'recommended_cameras' => '5MP and 8MP ColorVu Turret cameras for entrances, wide-angle bullet cameras for street coverage, and AI human detection.',
            'cabling_type' => 'Cat6 pure copper cabling in heavy PVC conduits with surge protection',
            'bylaws' => 'Local neighborhood watch and municipal safety guidelines',
            'popular_packages' => '4-Camera Home, 8-Camera Bungalow, and 16-Camera Commercial Market Systems',
        ],
        'lithium' => [
            'power_profile' => 'High residential power cuts in dense urban sectors, multi-story homes with heavy fan and inverter AC loads.',
            'recommended_batteries' => '5.12kWh and 10.24kWh LiFePO4 Powerwalls paired with 6kW to 10kW hybrid solar inverters.',
            'savings' => 'Saves on repeated tubular battery replacement costs and delivers reliable 8-12 hour power backup',
            'bylaws' => 'Standard residential electrical bylaws',
        ],
    ],

    'gulistan-e-johar-karachi' => [
        'name' => 'Gulistan-e-Johar Karachi',
        'full_name' => 'Gulistan-e-Johar Blocks 1 through 20, Safari Park & Pehlwan Goth Corridor',
        'solar' => [
            'challenges' => 'High-wind shear on multi-story building rooftops, urban dust accumulation, and localized load-shedding schedules.',
            'popular_sizing' => '5kW, 8kW, 10kW, and 15kW Rooftop Arrays',
            'preferred_structure' => 'Engineered Wind-Resistant Galvanized Structures anchored with Hilti chemical injection bolts.',
            'bylaws' => 'SBCA & Faisal Cantonment Board Bylaws',
            'savings' => 'PKR 40,000 to PKR 125,000+ per month',
        ],
        'frame' => [
            'challenges' => 'High-altitude rooftop wind turbulence on 4-8 story residential buildings and parapet load constraints.',
            'preferred_structure' => 'Heavy Hot-Dip Galvanized L2/L3 Mounts with Dual Wind Braces',
            'bylaws' => 'SBCA high-rise structural safety bylaws',
            'popular_profiles' => 'High-Wind Elevated Stands, Multi-Tier Apartment Frames, and Carport Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Multi-story apartment building entrance gates, parking basement surveillance, elevator lobbies, and residential street monitoring.',
            'recommended_cameras' => 'Vandal-proof IK10 dome cameras for elevators and lobbies, 4K ColorVu bullet cameras for parking gates, and centralized NVR control.',
            'cabling_type' => 'Cat6 pure copper with fiber optic vertical risers for high-rise apartment buildings',
            'bylaws' => 'Apartment association and building control security guidelines',
            'popular_packages' => '4-Camera Home, 8-Camera Townhouse, and 16-32 Camera Apartment Complex Systems',
        ],
        'lithium' => [
            'power_profile' => 'Apartment and bungalow power backup, limited balcony or utility room space prohibiting heavy, smelly lead-acid batteries.',
            'recommended_batteries' => 'Slim wall-mounted 5.12kWh LiFePO4 Powerwalls fitting neatly inside utility closets or apartment corridors.',
            'savings' => 'Zero maintenance, zero toxic acid fumes, and instant 10ms power transfer during apartment power cuts',
            'bylaws' => 'Apartment building fire safety regulations',
        ],
    ],

    'north-nazimabad-karachi' => [
        'name' => 'North Nazimabad Karachi',
        'full_name' => 'North Nazimabad Blocks A through W, Hyderi & Sakhi Hassan Corridor',
        'solar' => [
            'challenges' => 'High daytime residential energy demand, heavy air conditioning loads, and older distribution wiring requiring switchgear upgrades.',
            'popular_sizing' => '7kW, 10kW, 15kW, and 20kW Systems',
            'preferred_structure' => 'Custom Elevated Pergolas and Heavy-Duty L2 Rooftop Stands.',
            'bylaws' => 'SBCA & KMC District Central Bylaws',
            'savings' => 'PKR 60,000 to PKR 160,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Large bungalow rooftops (400-1000 sq yd) requiring expansive shade-free arrays without damaging roof tiles.',
            'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas (8.5ft clear height) and Multi-Tier Arrays',
            'bylaws' => 'SBCA residential architectural bylaws',
            'popular_profiles' => 'Bungalow Terrace Pergolas, L2 Low Mounts, and Elevated Gazebos',
        ],
        'cctv' => [
            'security_focus' => 'Bungalow boundary perimeter monitoring, medical clinic surveillance, Hyderi commercial retail shops, and school security.',
            'recommended_cameras' => '8MP AI AcuSense bullet cameras for boundary walls, 5MP turret cameras for indoor clinics/stores, and motorized optical zoom PTZ cameras.',
            'cabling_type' => 'Cat6 SFTP shielded pure copper cabling in rigid conduits',
            'bylaws' => 'District Central commercial and residential safety standards',
            'popular_packages' => '8-Camera Bungalow & 16-Camera Commercial Plaza Systems',
        ],
        'lithium' => [
            'power_profile' => 'High air-conditioning power consumption in 400-1000 sq yd bungalows, healthcare diagnostic clinics needing uninterrupted medical device power.',
            'recommended_batteries' => '10.24kWh and 15.36kWh LiFePO4 Powerwalls paired with 10kW-15kW hybrid inverters.',
            'savings' => 'Guarantees uninterrupted medical clinic operations and slashes residential K-Electric bills by up to 90%',
            'bylaws' => 'Healthcare and residential fire safety standards',
        ],
    ],

    'pechs-karachi' => [
        'name' => 'PECHS Karachi',
        'full_name' => 'PECHS Blocks 1 through 6, Tariq Road & Khalid Bin Waleed Road Corridor',
        'solar' => [
            'challenges' => 'Mix of prime residential properties and intensive commercial retail traffic, complex roof layouts, and high peak commercial tariffs.',
            'popular_sizing' => '10kW, 15kW, 20kW, and 30kW Systems',
            'preferred_structure' => 'Architectural Solar Pergolas and Commercial Multi-Tier Galvanized Stands.',
            'bylaws' => 'PECHS Society & SBCA Building Regulations',
            'savings' => 'PKR 85,000 to PKR 280,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Commercial rooftop HVAC plant obstructions and high aesthetic expectations on luxury historic bungalows.',
            'preferred_structure' => 'Architectural Elevated Pergolas and Heavy Multi-Tier Commercial Stands',
            'bylaws' => 'PECHS Society Architectural Bylaws',
            'popular_profiles' => 'Commercial Rooftop Arrays, Architectural Pergolas, and Carport Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Commercial Tariq Road retail showrooms, bank cash counters, automobile dealerships along Khalid Bin Waleed Road, and affluent residences.',
            'recommended_cameras' => '4K ColorVu audio cameras for cash counters, AI facial recognition cameras, and 360-degree PTZ speed domes for showroom floors.',
            'cabling_type' => 'Cat6 SFTP pure copper cabling with centralized server rack NVR integration',
            'bylaws' => 'Commercial trade association and police security compliance codes',
            'popular_packages' => '8-Camera Retail Showroom & 16-Camera Commercial Headquarters Packages',
        ],
        'lithium' => [
            'power_profile' => 'High commercial power tariffs, continuous showroom lighting and air conditioning requirements, corporate server rooms.',
            'recommended_batteries' => '10.24kWh Wall Powerwalls for homes and 19-inch 48V Server-Rack ESS modules for commercial retail/offices.',
            'savings' => 'Protects against peak commercial tariffs and eliminates noisy showroom generator diesel expenses',
            'bylaws' => 'Commercial retail fire and electrical safety regulations',
        ],
    ],

    'scheme-33-karachi' => [
        'name' => 'Scheme 33 Karachi',
        'full_name' => 'Scheme 33 Housing Societies (Saadi Town, Gulshan-e-Maymar, Super Highway Corridor)',
        'solar' => [
            'challenges' => 'Open terrain wind gusts, active construction dust, and grid volatility requiring hybrid solar and LiFePO4 battery integration.',
            'popular_sizing' => '5kW, 7kW, 10kW, and 12kW Hybrid Solar Setups',
            'preferred_structure' => 'Heavy Hot-Dip Galvanized Frames rated for open-plain 150 km/h wind gusts.',
            'bylaws' => 'KDA & Cooperative Housing Societies Bylaws',
            'savings' => 'PKR 50,000 to PKR 130,000+ per month',
        ],
        'frame' => [
            'challenges' => 'High open-plain wind shear (140 km/h) and newly constructed bungalow terrace roofs requiring chemical anchor waterproofing.',
            'preferred_structure' => 'Elevated Hot-Dip Galvanized Pergolas and Reinforced L2 Ground Mounts',
            'bylaws' => 'KDA & Cooperative Society Building Regulations',
            'popular_profiles' => 'Elevated Pergolas, Reinforced L2 Mounts, and Open-Plain Stands',
        ],
        'cctv' => [
            'security_focus' => 'New residential society perimeter security, construction site monitoring, boundary wall surveillance, and remote family protection.',
            'recommended_cameras' => '4K ColorVu bullet cameras with active strobe light & siren deterrents, AI human motion detection, and mobile cloud alerts.',
            'cabling_type' => 'Cat6 SFTP pure copper cabling in heavy-duty underground and surface conduits',
            'bylaws' => 'Housing society perimeter security guidelines',
            'popular_packages' => '4-Camera Home & 8-Camera Luxury Villa CCTV Packages',
        ],
        'lithium' => [
            'power_profile' => 'Frequent grid fluctuations and feeder load shedding along the Super Highway corridor, newly constructed homes needing turnkey storage.',
            'recommended_batteries' => '5.12kWh and 10.24kWh Wall-Mounted LiFePO4 Powerwalls paired with Deye/Solis hybrid inverters.',
            'savings' => 'Delivers 100% reliable continuous home electricity with 15-year battery life and zero fuel costs',
            'bylaws' => 'Society electrical and building safety codes',
        ],
    ],

    'korangi-karachi' => [
        'name' => 'Korangi Karachi',
        'full_name' => 'Korangi Industrial Area (KIA), Korangi Creek & Residential Sectors',
        'solar' => [
            'challenges' => 'Aggressive industrial airborne particulates, heavy chemical fumes, massive daytime three-phase motor loads, and peak industrial tariffs.',
            'popular_sizing' => '50kW, 100kW, 250kW, to Megawatt-Scale Industrial Solar',
            'preferred_structure' => 'Trapezoidal Metal Roof Clamping & Elevated Ground-Mount Structural Arrays.',
            'bylaws' => 'KDA, KITE & Sindh Environmental Protection Agency (SEPA) Codes',
            'savings' => 'PKR 450,000 to PKR 3,500,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Industrial sulfur and acid fumes, heavy factory roof loads, and large span purlin distances.',
            'preferred_structure' => 'Heavy Hot-Dip Galvanized Structural Steel (100µm+ zinc) & Anodized Aluminum Clamps',
            'bylaws' => 'Industrial safety and structural building codes',
            'popular_profiles' => 'Industrial Standing Seam Clamps, Heavy C-Channel Frames, and Factory Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Industrial factory floor monitoring, raw material warehouse theft prevention, perimeter fence monitoring, and worker safety compliance.',
            'recommended_cameras' => 'Industrial IP67 bullet cameras, explosion-proof housings for chemical zones, thermal heat detection cameras, and high-speed PTZ speed domes.',
            'cabling_type' => 'Industrial-grade fiber optic backbone cabling with Cat6 SFTP drop lines in steel conduits',
            'bylaws' => 'Korangi Association of Trade & Industry (KATI) and industrial factory security codes',
            'popular_packages' => '16-Camera Commercial Factory & 32-64 Camera Industrial Plant NVR Systems',
        ],
        'lithium' => [
            'power_profile' => 'High three-phase industrial tariffs, peak demand surcharges, and costly downtime during factory production grid outages.',
            'recommended_batteries' => '50kWh to 250kWh+ High-Voltage Commercial & Industrial Containerized LiFePO4 ESS Banks.',
            'savings' => 'Drastically cuts industrial peak surcharges, reduces diesel generator usage, and protects sensitive machinery from power dips',
            'bylaws' => 'Industrial electrical safety and environmental regulations',
        ],
    ],

    'site-industrial-area-karachi' => [
        'name' => 'SITE Industrial Area Karachi',
        'full_name' => 'SITE (Sindh Industrial Trading Estate) Karachi & Metroville Industrial Hub',
        'solar' => [
            'challenges' => 'Severe industrial airborne chemical deposition, continuous multi-megawatt motor loads, high K-Electric B3/B4 tariffs, and large factory roof expanses.',
            'popular_sizing' => '100kW to 1MW+ Turnkey Industrial Solar Arrays',
            'preferred_structure' => 'Heavy Hot-Dip Galvanized Industrial Purlin Framing and Non-Penetrating Metal Roof Clamps.',
            'bylaws' => 'SITE Association of Industry & SEPA Environmental Guidelines',
            'savings' => 'PKR 850,000 to PKR 5,000,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Corrosive chemical fumes, high industrial vibration from heavy textile/steel machinery, and expansive metal shed roofs.',
            'preferred_structure' => 'Heavy Hot-Dip Galvanized Structural Box Purlins and Custom Standing Seam Clamps',
            'bylaws' => 'Industrial Factory Structural Standards & Civil Engineering Codes',
            'popular_profiles' => 'Trapezoidal Metal Roof Mounts, Industrial Purlin Clamps, and Elevated Shed Stands',
        ],
        'cctv' => [
            'security_focus' => 'Large manufacturing facility perimeter surveillance, logistics truck loading bays, warehouse inventory security, and automated gate ANPR.',
            'recommended_cameras' => 'High-resolution 4K bullet cameras, long-range PTZ cameras (up to 300m IR), ANPR license plate cameras, and thermal fire detection cameras.',
            'cabling_type' => 'Armored multi-mode fiber optic cabling backbone with industrial PoE switches',
            'bylaws' => 'SITE Association security guidelines and labor factory safety laws',
            'popular_packages' => '16-Camera Warehouse, 32-Camera Textile Mill, and 64-Camera Industrial Plant Systems',
        ],
        'lithium' => [
            'power_profile' => 'Continuous manufacturing processes (spinning, dyeing, pharmaceutical, plastics) where even a 5-minute outage ruins entire product batches.',
            'recommended_batteries' => '100kWh to 500kWh+ Containerized High-Voltage Industrial LiFePO4 Energy Storage Systems.',
            'savings' => 'Zero production batch loss, instantaneous sub-10ms UPS transfer, and massive peak-demand tariff shaving',
            'bylaws' => 'Industrial electrical and high-voltage grid interconnection codes',
        ],
    ],

    'port-qasim-karachi' => [
        'name' => 'Port Qasim Karachi',
        'full_name' => 'Port Muhammad Bin Qasim Industrial Corridor & Export Processing Zone (EPZ)',
        'solar' => [
            'challenges' => 'Extreme coastal marine humidity, heavy salt aerosol fog from the Arabian Sea, port export logistics, and high-voltage industrial grid synchronization.',
            'popular_sizing' => '250kW to 2MW+ Megawatt-Scale Commercial & Industrial Solar',
            'preferred_structure' => 'Heavy Marine-Grade ASTM A123 Galvanized Steel (100µm+ zinc) & FRP Composite Non-Metallic Profiles.',
            'bylaws' => 'Port Qasim Authority (PQA) Building & Industrial Bylaws',
            'savings' => 'PKR 1,500,000 to PKR 8,000,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Severe maritime salt spray, high coastal wind velocity, and corrosive airborne coastal chemicals.',
            'preferred_structure' => 'Marine-Grade ASTM A123 Galvanized Frames (100µm+ zinc) & FRP Non-Metallic Composite Purlins',
            'bylaws' => 'Port Qasim Authority (PQA) Engineering Bylaws',
            'popular_profiles' => 'Marine Heavy Purlin Mounts, FRP Composite Structures, and Elevated Port Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Maritime port logistics, customs bonded warehouse protection, container terminal tracking, and high-security perimeter fence defense.',
            'recommended_cameras' => 'Explosion-proof stainless steel 4K cameras, long-range thermal imaging cameras for water boundary monitoring, and high-speed ANPR cameras.',
            'cabling_type' => 'Armored single-mode fiber optic infrastructure with industrial redundant ring topology',
            'bylaws' => 'International Ship and Port Facility Security (ISPS) Code & PQA Regulations',
            'popular_packages' => '32-Camera Terminal & 64-128 Camera Heavy Industrial Port Solutions',
        ],
        'lithium' => [
            'power_profile' => 'High-capacity port container handling, cold storage facilities, chemical processing plants needing continuous multi-megawatt backup.',
            'recommended_batteries' => 'Multi-Megawatt-Hour (MWh) Containerized Liquid-Cooled LiFePO4 Energy Storage Systems.',
            'savings' => 'Delivers multi-megawatt industrial power security, replaces mega-generators, and optimizes port solar microgrids',
            'bylaws' => 'PQA and maritime industrial electrical codes',
        ],
    ],

    'malir-karachi' => [
        'name' => 'Malir Karachi',
        'full_name' => 'Malir Cantonment, Model Colony, Kala Board & Malir Agro Farmland',
        'solar' => [
            'challenges' => 'High ambient summer temperatures, agricultural tubewell irrigation pumping, open farm acreage, and cantonment architectural guidelines.',
            'popular_sizing' => '5kW to 30kW Residential, Commercial & Tubewell Solar Systems',
            'preferred_structure' => 'Heavy-Duty Ground-Mounted Stands & Elevated Concrete Roof Frames.',
            'bylaws' => 'Malir Cantonment Board (MCB) & KMC Bylaws',
            'savings' => 'PKR 45,000 to PKR 180,000+ per month',
        ],
        'frame' => [
            'challenges' => 'Open farmland ground mounting and Malir Cantt residential bungalow structural aesthetic rules.',
            'preferred_structure' => 'Ground-Mount Driven Pile Arrays and Elevated Rooftop Pergolas',
            'bylaws' => 'Malir Cantonment Board (MCB) Building Regulations',
            'popular_profiles' => 'Agricultural Ground Mounts, Bungalow Pergolas, and Tubewell Solar Stands',
        ],
        'cctv' => [
            'security_focus' => 'Large farmhouse compound perimeter protection, cantonment bungalow security, livestock and nursery monitoring, and long-distance boundary walls.',
            'recommended_cameras' => 'Long-range 4K ColorVu bullet cameras, solar-powered standalone 4G PTZ cameras for remote acreage, and boundary beam intrusion sensors.',
            'cabling_type' => 'Cat6 SFTP pure copper with wireless point-to-point (PTP) microwave bridges for farmhouses',
            'bylaws' => 'Malir Cantonment and local district security guidelines',
            'popular_packages' => '8-Camera Bungalow & 16-Camera Farmland Estate CCTV Systems',
        ],
        'lithium' => [
            'power_profile' => 'Rural grid fluctuations, remote farmhouse power backup, agricultural tubewell drives, and Malir Cantt luxury homes.',
            'recommended_batteries' => '10.24kWh to 20.48kWh LiFePO4 Battery Banks paired with off-grid and hybrid solar inverters.',
            'savings' => 'Eliminates reliance on costly diesel generator fuel for remote farmhouses and delivers dependable 24/7 power',
            'bylaws' => 'MCB safety guidelines and agricultural power codes',
        ],
    ],

    'north-karachi' => [
        'name' => 'North Karachi',
        'full_name' => 'North Karachi Industrial Area (NKIA), Sector 5 & Buffer Zone Hub',
        'solar' => [
            'challenges' => 'Dense industrial manufacturing units (apparel, packaging, plastic), heavy rooftop dust, high K-Electric commercial/industrial tariffs, and multi-tenant buildings.',
            'popular_sizing' => '20kW, 50kW, 100kW, to 250kW Factory Solar Arrays',
            'preferred_structure' => 'Engineered Industrial Roof Clamping and Hot-Dip Galvanized Purlin Elevated Stands.',
            'bylaws' => 'NKATI & Sindh Industrial Building Regulations',
            'savings' => 'PKR 180,000 to PKR 1,200,000+ per month',
        ],
        'frame' => [
            'challenges' => 'High factory roof vibration, industrial soot, and limited load-bearing concrete roofs.',
            'preferred_structure' => 'Hot-Dip Galvanized Industrial Purlin Clamps & Elevated Terrace Frames',
            'bylaws' => 'North Karachi Industrial Association Building Standards',
            'popular_profiles' => 'Factory Roof Mounts, Industrial Purlin Frames, and Commercial Canopies',
        ],
        'cctv' => [
            'security_focus' => 'Garment and textile factory floor productivity, warehouse inventory control, entry/exit security turnstiles, and perimeter protection.',
            'recommended_cameras' => '5MP and 8MP wide-angle cameras for production floors, 4K ColorVu for exterior gates, and facial recognition for employee attendance.',
            'cabling_type' => 'Cat6 SFTP pure copper cabling routed inside industrial conduits with central NVR monitoring',
            'bylaws' => 'North Karachi Association of Trade & Industry (NKATI) security standards',
            'popular_packages' => '16-Camera Factory & 32-Camera Industrial Manufacturing Plant Systems',
        ],
        'lithium' => [
            'power_profile' => 'Industrial packaging and apparel factories where power cuts shut down sewing lines and printing machines.',
            'recommended_batteries' => '20.48kWh to 100kWh Industrial LiFePO4 Rack-Mounted Energy Storage Cabinets.',
            'savings' => 'Maintains full production floor uptime without diesel generator delays and cuts expensive peak industrial tariffs',
            'bylaws' => 'NKATI electrical safety and industrial building standards',
        ],
    ],

    'shahrah-e-faisal-karachi' => [
        'name' => 'Shahrah-e-Faisal Karachi',
        'full_name' => 'Shahrah-e-Faisal Corporate Spine (Metropole to Star Gate, Nursery & Baloch Colony)',
        'solar' => [
            'challenges' => 'High-rise multi-story commercial towers, crane lift logistics, high daytime HVAC power loads, and commercial net-metering synchronization.',
            'popular_sizing' => '30kW, 50kW, 100kW, and 150kW Corporate Commercial Systems',
            'preferred_structure' => 'High-Elevation Structural Carports & Engineered Rooftop Concrete Ballast Stands.',
            'bylaws' => 'Faisal Cantonment & SBCA High-Rise Building Regulations',
            'savings' => 'PKR 250,000 to PKR 1,500,000+ per month',
        ],
        'frame' => [
            'challenges' => 'High-rise wind exposure (surpassing 60m elevation) and zero roof penetration requirements over commercial corporate offices.',
            'preferred_structure' => 'Concrete Ballasted Structural Frames and High-Elevation Carport Canopies',
            'bylaws' => 'SBCA Commercial High-Rise Structural Standards',
            'popular_profiles' => 'High-Rise Ballast Mounts, Corporate Carports, and Elevated Purlin Stands',
        ],
        'cctv' => [
            'security_focus' => 'Corporate headquarters access control, bank branch surveillance, underground parking management, and high-traffic road frontage monitoring.',
            'recommended_cameras' => '4K ColorVu cameras with AI license plate recognition (LPR), facial recognition turnstiles, and panoramic elevator lobby domes.',
            'cabling_type' => 'Cat6 SFTP pure copper with optical fiber backbone risers connecting multiple floors',
            'bylaws' => 'State Bank of Pakistan (SBP) security regulations for banking & corporate offices',
            'popular_packages' => '16-Camera Corporate Office & 32-64 Camera High-Rise Tower CCTV Systems',
        ],
        'lithium' => [
            'power_profile' => 'High-density commercial office buildings, IT data centers, banks, and corporate towers requiring silent, instant, high-voltage battery backup.',
            'recommended_batteries' => '19-Inch 48V Server-Rack LiFePO4 Modules (10kWh to 50kWh) integrated with central three-phase online UPS systems.',
            'savings' => 'Zero IT data server downtime, 100% elimination of indoor diesel generator exhaust, and peak-hour commercial tariff savings',
            'bylaws' => 'Commercial high-rise fire and electrical safety regulations',
        ],
    ],
];

echo 'Loaded master configuration for '.count($areaMasterList)." areas.\n\n";

// -------------------------------------------------------------
// 1. Process Solar Installation Areas
// -------------------------------------------------------------
echo "=== Processing Solar Installation Areas ===\n";
$solarParentMenu = DB::table('menu_items')->where('title', 'like', '%Solar Installation Areas%')->first();
$solarParentId = $solarParentMenu ? $solarParentMenu->id : null;
echo 'Solar Installation Areas Parent Menu ID: '.($solarParentId ?? 'NONE')."\n";

foreach ($areaMasterList as $areaKey => $data) {
    $slug = "solar-panel-installation-in-{$areaKey}";
    $title = "Solar Panel Installation in {$data['name']}";
    $cfg = array_merge($data['solar'], ['area_name' => $data['full_name']]);

    $content = buildNewSolarAreaContent($slug, $title, $cfg);
    $wordCount = str_word_count(strip_tags($content));

    $service = Service::updateOrCreate(
        ['slug' => $slug],
        [
            'title' => $title,
            'tagline' => "Turnkey {$title} • Tier-1 EPC Engineering in Karachi",
            'hero_badge' => "{$data['name']} • Premier EPC",
            'icon' => 'sun',
            'summary' => "FWB Ventures is the trusted solar EPC contractor for {$title}. We design and install high-yield N-Type TOPCon solar systems, elevated hot-dip galvanized pergolas, and complete K-Electric net metering for residential, commercial, and industrial properties across {$data['name']}.",
            'content' => $content,
            'features' => [
                "Tailored Microclimate Engineering for {$data['full_name']}",
                'Tier-1 N-Type TOPCon & Bifacial Solar Panels (585W - 620W+)',
                'Full-Immersion Hot-Dip Galvanized Frames (ASTM A123, 85µm+ zinc)',
                'Turnkey K-Electric Bi-Directional Net-Metering via Regional IBC',
                'Certified Hilti / Fischer Chemical Injection Anchoring Guarantee',
            ],
            'benefits' => [
                'Cut electricity bills by up to 90% and eliminate peak K-Electric tariffs',
                'Elevated pergola architecture preserves 100% of usable rooftop terrace floor area',
                'Zero maintenance, 25-year linear performance warranty on solar panels',
                "Rapid capital payback period of 1.4 to 2.3 years across {$data['name']}",
            ],
            'benchmarks' => [
                ['label' => 'Service Area', 'value' => $data['full_name']],
                ['label' => 'System Capacities', 'value' => $cfg['popular_sizing']],
                ['label' => 'Structural Spec', 'value' => 'ASTM A123 Hot-Dip Galvanized (150 km/h Wind Rated)'],
                ['label' => 'Net Metering', 'value' => 'Turnkey K-Electric IBC Facilitation'],
            ],
            'featured_image' => '/images/services/solar/solar-rooftop-installation-karachi.webp',
            'status' => 'published',
            'order' => 1,
            'is_featured' => 1,
            'focus_keyword' => 'solar panel installation in '.strtolower($data['name']),
            'meta_title' => "{$title} | FWB Ventures",
            'meta_description' => "Get turnkey {$title} by FWB Ventures. Elevated pergolas, Tier-1 N-Type panels, and K-Electric net metering for properties in {$data['name']}. Call +92 301 2118111.",
            'meta_keywords' => 'solar panel installation in '.strtolower($data['name']).", solar company in {$data['name']}, net metering {$data['name']}, solar panels {$data['name']}",
            'canonical_url' => url("/service/{$slug}"),
            'og_title' => "{$title} | FWB Ventures",
            'og_description' => "Get turnkey {$title} by FWB Ventures. Elevated pergolas, Tier-1 N-Type panels, and K-Electric net metering for properties in {$data['name']}.",
            'og_image' => '/images/services/solar/solar-rooftop-installation-karachi.webp',
            'is_indexable' => 1,
            'seo_score' => 97,
            'readability_score' => 93,
            'schema_markup' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => $title,
                'description' => "Turnkey {$title} by FWB Ventures. EPC solar installation, K-Electric net metering, and elevated pergolas.",
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'FWB Ventures',
                    'telephone' => '+923012118111',
                    'url' => url('/'),
                ],
                'areaServed' => [
                    '@type' => 'City',
                    'name' => $data['name'].', Karachi',
                ],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
        ]
    );

    // Link in menu_items under Solar Installation Areas
    if ($solarParentId) {
        MenuItem::updateOrCreate(
            ['url' => "/service/{$slug}"],
            [
                'parent_id' => $solarParentId,
                'title' => $title,
                'type' => 'custom',
                'order' => $service->id,
                'is_active' => 1,
                'location' => 'header',
            ]
        );
    }

    echo "  [Solar] {$slug} -> {$wordCount} words (ID: {$service->id})\n";
}

// -------------------------------------------------------------
// 2. Process Solar Structure / Frame Installation Areas
// -------------------------------------------------------------
echo "\n=== Processing Solar Structure Installation Areas ===\n";
$frameParentMenu = DB::table('menu_items')->where('title', 'like', '%Structure Installation Areas%')->first();
$frameParentId = $frameParentMenu ? $frameParentMenu->id : null;
echo 'Solar Structure Areas Parent Menu ID: '.($frameParentId ?? 'NONE')."\n";

foreach ($areaMasterList as $areaKey => $data) {
    $slug = "solar-structure-installation-in-{$areaKey}";
    $title = "Solar Structure Installation in {$data['name']}";
    $cfg = array_merge($data['frame'], ['area_name' => $data['full_name']]);

    $content = buildSolarFrameAreaContent($slug, $title, $cfg);
    $wordCount = str_word_count(strip_tags($content));

    $service = Service::updateOrCreate(
        ['slug' => $slug],
        [
            'title' => $title,
            'tagline' => "Engineered {$title} • Hot-Dip Galvanized Pergolas in Karachi",
            'hero_badge' => "{$data['name']} • Structural Fabrication",
            'icon' => 'hammer',
            'summary' => "FWB Ventures is the premier manufacturer and installer of {$title}. We design and fabricate custom hot-dip galvanized solar pergolas, L2/L3 stands, and industrial canopy structures engineered to withstand 150 km/h wind shear across {$data['name']}.",
            'content' => $content,
            'features' => [
                'Full-Immersion Hot-Dip Galvanization (ASTM A123, 85µm+ zinc thickness)',
                'Custom Elevated Pergolas (8.5ft - 10ft clear height) preserving 100% of terrace space',
                'Certified Hilti Chemical Injection Anchoring directly into reinforced concrete beams',
                'Marine-Grade SS304 / SS316 Stainless Fasteners with EPDM isolation dampeners',
                'Computer-modeled STAAD.Pro wind load engineering rated for 150 km/h wind gusts',
            ],
            'benefits' => [
                "25+ years certified rust-free structural performance in {$data['name']}",
                'Elevated pergola transforms rooftop into an outdoor living space while generating power',
                'Guaranteed zero roof slab leaks with multi-barrier elastomeric chemical waterproofing',
                "Full compliance with {$cfg['bylaws']}",
            ],
            'benchmarks' => [
                ['label' => 'Service Location', 'value' => $data['full_name']],
                ['label' => 'Structure Typologies', 'value' => $cfg['popular_profiles']],
                ['label' => 'Zinc Coating Spec', 'value' => 'ASTM A123 Hot-Dip Galvanized (85µm+ min)'],
                ['label' => 'Wind Rating', 'value' => '150 km/h (ASCE 7-22 Compliant)'],
            ],
            'featured_image' => '/images/services/structures/solar-pergola-frame-structure.webp',
            'status' => 'published',
            'order' => 1,
            'is_featured' => 1,
            'focus_keyword' => 'solar structure installation in '.strtolower($data['name']),
            'meta_title' => "{$title} | FWB Ventures",
            'meta_description' => "Certified {$title} by FWB Ventures. Elevated pergolas, ASTM A123 hot-dip galvanized steel, and 150 km/h wind rating for properties in {$data['name']}. Call +92 301 2118111.",
            'meta_keywords' => 'solar structure installation in '.strtolower($data['name']).", solar frame {$data['name']}, solar mounting structure {$data['name']}, solar pergola {$data['name']}",
            'canonical_url' => url("/service/{$slug}"),
            'og_title' => "{$title} | FWB Ventures",
            'og_description' => "Certified {$title} by FWB Ventures. Elevated pergolas, ASTM A123 hot-dip galvanized steel, and 150 km/h wind rating for properties in {$data['name']}.",
            'og_image' => '/images/services/structures/solar-pergola-frame-structure.webp',
            'is_indexable' => 1,
            'seo_score' => 97,
            'readability_score' => 93,
            'schema_markup' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => $title,
                'description' => "Custom {$title} by FWB Ventures. Elevated pergolas, hot-dip galvanized mounting frames, and industrial canopies.",
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'FWB Ventures',
                    'telephone' => '+923012118111',
                    'url' => url('/'),
                ],
                'areaServed' => [
                    '@type' => 'City',
                    'name' => $data['name'].', Karachi',
                ],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
        ]
    );

    // Link in menu_items under Structure Installation Areas
    if ($frameParentId) {
        MenuItem::updateOrCreate(
            ['url' => "/service/{$slug}"],
            [
                'parent_id' => $frameParentId,
                'title' => $title,
                'type' => 'custom',
                'order' => $service->id,
                'is_active' => 1,
                'location' => 'header',
            ]
        );
    }

    echo "  [Frame] {$slug} -> {$wordCount} words (ID: {$service->id})\n";
}

// -------------------------------------------------------------
// 3. Process CCTV Services Installation Areas
// -------------------------------------------------------------
echo "\n=== Processing CCTV Services Installation Areas ===\n";
// Create CCTV Installation Areas Parent in menu_items under CCTV root (ID 348)
$cctvRootMenu = DB::table('menu_items')->where('id', 348)->first();
$cctvParentMenu = DB::table('menu_items')->where('url', '/service/cctv-installation-areas-karachi')
    ->orWhere('title', 'CCTV Installation Areas in Karachi')->first();

if (! $cctvParentMenu && $cctvRootMenu) {
    $cctvParentMenuId = DB::table('menu_items')->insertGetId([
        'parent_id' => 348,
        'title' => 'CCTV Installation Areas in Karachi',
        'url' => '/service/cctv-installation-areas-karachi',
        'route_name' => null,
        'type' => 'custom',
        'order' => 5,
        'is_active' => 1,
        'location' => 'header',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "Created CCTV Parent Menu Item: ID {$cctvParentMenuId}\n";
} else {
    $cctvParentMenuId = $cctvParentMenu->id;
    echo "Found Existing CCTV Parent Menu Item: ID {$cctvParentMenuId}\n";
}

// Create parent service for CCTV Installation Areas
Service::updateOrCreate(
    ['slug' => 'cctv-installation-areas-karachi'],
    [
        'title' => 'CCTV Installation Areas in Karachi',
        'tagline' => 'Comprehensive CCTV Camera Installation Across All Karachi Neighborhoods',
        'hero_badge' => 'Karachi Wide Coverage • 24/7 Security',
        'icon' => 'shield',
        'summary' => 'FWB Ventures provides certified CCTV camera installation across all prime residential, commercial, and industrial areas of Karachi including Bahria Town, DHA, Clifton, Gulshan, Korangi, SITE, PECHS, and Scheme 33.',
        'content' => '<h2>Karachi Neighborhoods CCTV Installation Coverage</h2><p>FWB Ventures deploys high-definition 4K surveillance systems across all districts of Karachi with rapid 24-hour installation response.</p>',
        'status' => 'published',
        'order' => 1,
        'is_featured' => 1,
        'focus_keyword' => 'cctv installation areas in karachi',
        'meta_title' => 'CCTV Installation Areas in Karachi | FWB Ventures',
        'meta_description' => 'Complete guide to CCTV camera installation areas in Karachi by FWB Ventures. Covering Bahria Town, DHA, Clifton, Gulshan, Korangi, SITE, and Scheme 33.',
        'canonical_url' => url('/service/cctv-installation-areas-karachi'),
        'is_indexable' => 1,
    ]
);

foreach ($areaMasterList as $areaKey => $data) {
    $slug = "cctv-camera-installation-in-{$areaKey}";
    $title = "CCTV Camera Installation in {$data['name']}";
    $cfg = array_merge($data['cctv'], ['area_name' => $data['full_name']]);

    $content = buildCctvAreaContent($slug, $title, $cfg);
    $wordCount = str_word_count(strip_tags($content));

    $service = Service::updateOrCreate(
        ['slug' => $slug],
        [
            'title' => $title,
            'tagline' => "Enterprise {$title} • 4K ColorVu & AI Surveillance",
            'hero_badge' => "{$data['name']} • CCTV EPC",
            'icon' => 'camera',
            'summary' => "FWB Ventures is the trusted security engineering contractor for {$title}. We design and install 4K Ultra-HD surveillance systems, Hikvision ColorVu full-color night vision, AcuSense AI human/vehicle detection, and pure copper Cat6 cabling across {$data['name']}.",
            'content' => $content,
            'features' => [
                '4K Ultra-HD & 5MP ColorVu Technology with 24/7 Full-Color Night Vision',
                'AcuSense & WizSense AI Human and Vehicle False-Alarm Filtering (98.9% accuracy)',
                'Solid Pure Bare Copper (23AWG) Cat6 SFTP Cabling in Heavy Rigid Conduits',
                'Surveillance-Grade Western Digital Purple / Seagate SkyHawk Hard Drives Included',
                'Zero-Flicker Power over Ethernet (PoE) with Integrated UPS Battery Backup',
            ],
            'benefits' => [
                '24/7 proactive security deterrence with virtual tripwire mobile alarms',
                "Crystal-clear facial and vehicle license plate recognition across {$data['name']}",
                'Free remote smartphone cloud streaming with zero monthly subscription fees',
                'Official 1 to 2-year manufacturer hardware replacement warranty',
            ],
            'benchmarks' => [
                ['label' => 'Service Location', 'value' => $data['full_name']],
                ['label' => 'Primary Camera Tech', 'value' => $cfg['recommended_cameras']],
                ['label' => 'Cabling Specification', 'value' => 'Cat6 SFTP Pure Copper (UV-Resistant)'],
                ['label' => 'Warranty', 'value' => '2-Year Official Manufacturer Warranty'],
            ],
            'featured_image' => '/images/services/cctv/cctv-security-camera-system.webp',
            'status' => 'published',
            'order' => 1,
            'is_featured' => 1,
            'focus_keyword' => 'cctv camera installation in '.strtolower($data['name']),
            'meta_title' => "{$title} | FWB Ventures",
            'meta_description' => "Professional {$title} by FWB Ventures. 4K Ultra-HD, ColorVu 24/7 night vision, AcuSense AI detection, and pure copper Cat6 cabling for properties in {$data['name']}. Call +92 301 2118111.",
            'meta_keywords' => 'cctv camera installation in '.strtolower($data['name']).", security cameras {$data['name']}, cctv installation {$data['name']}, cctv company {$data['name']}",
            'canonical_url' => url("/service/{$slug}"),
            'og_title' => "{$title} | FWB Ventures",
            'og_description' => "Professional {$title} by FWB Ventures. 4K Ultra-HD, ColorVu 24/7 night vision, AcuSense AI detection, and pure copper Cat6 cabling for properties in {$data['name']}.",
            'og_image' => '/images/services/cctv/cctv-security-camera-system.webp',
            'is_indexable' => 1,
            'seo_score' => 97,
            'readability_score' => 93,
            'schema_markup' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => $title,
                'description' => "Professional {$title} by FWB Ventures. 4K ColorVu, AI AcuSense, and IP surveillance systems.",
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'FWB Ventures',
                    'telephone' => '+923012118111',
                    'url' => url('/'),
                ],
                'areaServed' => [
                    '@type' => 'City',
                    'name' => $data['name'].', Karachi',
                ],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
        ]
    );

    // Link in menu_items under CCTV Installation Areas
    MenuItem::updateOrCreate(
        ['url' => "/service/{$slug}"],
        [
            'parent_id' => $cctvParentMenuId,
            'title' => $title,
            'type' => 'custom',
            'order' => $service->id,
            'is_active' => 1,
            'location' => 'header',
        ]
    );

    echo "  [CCTV] {$slug} -> {$wordCount} words (ID: {$service->id})\n";
}

// -------------------------------------------------------------
// 4. Process Lithium Battery Supply & Installation Areas
// -------------------------------------------------------------
echo "\n=== Processing Lithium Battery Supply & Installation Areas ===\n";
// Create Lithium Battery Areas Parent in menu_items under Lithium root (ID 400)
$lithiumRootMenu = DB::table('menu_items')->where('id', 400)->first();
$lithiumParentMenu = DB::table('menu_items')->where('url', '/service/lithium-battery-supply-areas-karachi')
    ->orWhere('title', 'Lithium Battery Areas in Karachi')->first();

if (! $lithiumParentMenu && $lithiumRootMenu) {
    $lithiumParentMenuId = DB::table('menu_items')->insertGetId([
        'parent_id' => 400,
        'title' => 'Lithium Battery Areas in Karachi',
        'url' => '/service/lithium-battery-supply-areas-karachi',
        'route_name' => null,
        'type' => 'custom',
        'order' => 5,
        'is_active' => 1,
        'location' => 'header',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "Created Lithium Parent Menu Item: ID {$lithiumParentMenuId}\n";
} else {
    $lithiumParentMenuId = $lithiumParentMenu->id;
    echo "Found Existing Lithium Parent Menu Item: ID {$lithiumParentMenuId}\n";
}

// Create parent service for Lithium Battery Areas
Service::updateOrCreate(
    ['slug' => 'lithium-battery-supply-areas-karachi'],
    [
        'title' => 'Lithium Battery Supply & Installation Areas in Karachi',
        'tagline' => 'Turnkey LiFePO4 Energy Storage Solutions Across All Karachi Sectors',
        'hero_badge' => 'Karachi Wide Distribution • Grade-A LiFePO4',
        'icon' => 'battery-charging',
        'summary' => 'FWB Ventures is the authorized distributor and turnkey installer of Grade-A LiFePO4 lithium batteries across all major residential, commercial, and industrial zones of Karachi including Bahria Town, DHA, Clifton, Gulshan, Korangi, SITE, and Scheme 33.',
        'content' => '<h2>Karachi Lithium Battery Distribution & Installation Areas</h2><p>FWB Ventures provides Grade-A LiFePO4 lithium batteries, wall-mounted Powerwalls, and server-rack energy storage systems across all Karachi localities.</p>',
        'status' => 'published',
        'order' => 1,
        'is_featured' => 1,
        'focus_keyword' => 'lithium battery areas in karachi',
        'meta_title' => 'Lithium Battery Supply & Installation Areas in Karachi | FWB Ventures',
        'meta_description' => 'Complete guide to lithium battery supply and installation areas in Karachi by FWB Ventures. Covering Bahria Town, DHA, Clifton, Gulshan, Korangi, SITE, and Scheme 33.',
        'canonical_url' => url('/service/lithium-battery-supply-areas-karachi'),
        'is_indexable' => 1,
    ]
);

foreach ($areaMasterList as $areaKey => $data) {
    $slug = "lithium-battery-in-{$areaKey}";
    $title = "Lithium Battery in {$data['name']}";
    $cfg = array_merge($data['lithium'], ['area_name' => $data['full_name']]);

    $content = buildLithiumAreaContent($slug, $title, $cfg);
    $wordCount = str_word_count(strip_tags($content));

    $service = Service::updateOrCreate(
        ['slug' => $slug],
        [
            'title' => $title,
            'tagline' => "Grade-A {$title} • 6000+ Cycles LiFePO4 Storage",
            'hero_badge' => "{$data['name']} • LiFePO4 Storage",
            'icon' => 'zap',
            'summary' => "FWB Ventures is the premier supplier and installer of {$title}. We supply brand-new Grade-A LiFePO4 Powerwalls, server-rack battery modules, and commercial ESS banks delivering 6,000+ cycles, 15-year lifespan, and rapid 2-hour charging for properties in {$data['name']}.",
            'content' => $content,
            'features' => [
                '100% Brand-New Grade-A Prismatic LiFePO4 Cells (6,000 - 8,000 Cycles at 80% DoD)',
                'Intelligent Automotive-Grade Smart BMS with Active Multi-Point Cell Balancing',
                'High-Speed Closed-Loop CANbus / RS485 Communication with Leading Hybrid Inverters',
                'Ultra-Fast 0.5C Rapid Charging: 0% to 100% Full Charge in 2 Hours',
                'Zero Toxic Acid Fumes, Non-Combustible Iron Phosphate Chemistry, and Indoor Safe',
            ],
            'benefits' => [
                "12 to 15+ years of daily maintenance-free electricity backup in {$data['name']}",
                'Seamless sub-10ms transfer keeps inverter air conditioners running during outages',
                'Eliminates 100% of expensive, noisy diesel generator fuel and maintenance costs',
                'Comprehensive 5 to 10-year official manufacturer replacement warranty',
            ],
            'benchmarks' => [
                ['label' => 'Service Location', 'value' => $data['full_name']],
                ['label' => 'Battery Chemistry', 'value' => 'Grade-A LiFePO4 (Lithium Iron Phosphate)'],
                ['label' => 'Cycle Life', 'value' => '6,000+ Cycles (80% Depth of Discharge)'],
                ['label' => 'Warranty', 'value' => '5 - 10 Year Official Replacement Warranty'],
            ],
            'featured_image' => '/images/services/lithium/lithium-lifepo4-powerwall-48v.webp',
            'status' => 'published',
            'order' => 1,
            'is_featured' => 1,
            'focus_keyword' => 'lithium battery in '.strtolower($data['name']),
            'meta_title' => "{$title} | FWB Ventures",
            'meta_description' => "Genuine Grade-A {$title} by FWB Ventures. Wall-mounted Powerwalls, 6000+ cycles, 15-year lifespan, and rapid 2-hour charging for properties in {$data['name']}. Call +92 301 2118111.",
            'meta_keywords' => 'lithium battery in '.strtolower($data['name']).", lifepo4 battery {$data['name']}, solar battery {$data['name']}, powerwall {$data['name']}",
            'canonical_url' => url("/service/{$slug}"),
            'og_title' => "{$title} | FWB Ventures",
            'og_description' => "Genuine Grade-A {$title} by FWB Ventures. Wall-mounted Powerwalls, 6000+ cycles, 15-year lifespan, and rapid 2-hour charging for properties in {$data['name']}.",
            'og_image' => '/images/services/lithium/lithium-lifepo4-powerwall-48v.webp',
            'is_indexable' => 1,
            'seo_score' => 97,
            'readability_score' => 93,
            'schema_markup' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => $title,
                'description' => "Grade-A {$title} by FWB Ventures. LiFePO4 Powerwalls, server-rack battery modules, and turnkey installation.",
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'FWB Ventures',
                    'telephone' => '+923012118111',
                    'url' => url('/'),
                ],
                'areaServed' => [
                    '@type' => 'City',
                    'name' => $data['name'].', Karachi',
                ],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
        ]
    );

    // Link in menu_items under Lithium Battery Areas
    MenuItem::updateOrCreate(
        ['url' => "/service/{$slug}"],
        [
            'parent_id' => $lithiumParentMenuId,
            'title' => $title,
            'type' => 'custom',
            'order' => $service->id,
            'is_active' => 1,
            'location' => 'header',
        ]
    );

    echo "  [Lithium] {$slug} -> {$wordCount} words (ID: {$service->id})\n";
}

echo "\nAll Area Services batch deployed successfully!\n";
