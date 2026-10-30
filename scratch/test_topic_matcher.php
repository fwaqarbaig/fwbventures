<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

function getTopicImage(string $title, string $type = 'post', ?string $category = null): array
{
    $t = strtolower($title);
    $c = strtolower($category ?? '');

    // 1. CCTV
    if (str_contains($t, 'cctv') || str_contains($t, 'camera') || str_contains($t, 'nvr') || str_contains($t, 'dvr') || str_contains($c, 'cctv') || str_contains($c, 'security')) {
        if (str_contains($t, 'ptz') || str_contains($t, 'speed dome') || str_contains($t, '360') || str_contains($t, 'zoom') || str_contains($t, 'perimeter') || str_contains($t, 'pole')) {
            return [
                'image' => '/images/services/cctv/cctv-ptz-speed-dome-camera.webp',
                'caption' => 'High-Speed PTZ Outdoor Speed Dome Security Camera System with Optical Zoom in Karachi.',
            ];
        }
        if (str_contains($t, 'nvr') || str_contains($t, 'dvr') || str_contains($t, 'storage') || str_contains($t, 'hard drive') || str_contains($t, 'tb') || str_contains($t, 'recording') || str_contains($t, 'monitor') || str_contains($t, 'control room') || str_contains($t, 'ups') || str_contains($t, 'load shedding')) {
            return [
                'image' => '/images/services/cctv/cctv-nvr-monitoring-control-room.webp',
                'caption' => 'Enterprise CCTV Video Surveillance Control Room and NVR Archival Storage Infrastructure.',
            ];
        }

        return [
            'image' => '/images/services/cctv/cctv-security-camera-system.webp',
            'caption' => 'Professional High-Definition 4K ColorVu Security Camera System Installation in Karachi.',
        ];
    }

    // 2. Lithium Batteries
    if (str_contains($t, 'lithium') || str_contains($t, 'battery') || str_contains($t, 'lifepo4') || str_contains($t, 'powerwall') || str_contains($t, 'ess') || str_contains($c, 'lithium') || str_contains($c, 'battery')) {
        if (str_contains($t, '12v') || str_contains($t, '24v') || str_contains($t, '100ah') || str_contains($t, '200ah') || str_contains($t, 'pack') || str_contains($t, 'deep cycle') || str_contains($t, 'ups replacement') || str_contains($t, 'marine') || str_contains($t, 'rv')) {
            return [
                'image' => '/images/services/lithium/lithium-12v-24v-battery-pack.webp',
                'caption' => 'Deep-Cycle 12V & 24V Grade-A LiFePO4 Lithium Battery Pack with Smart BMS for UPS and Solar.',
            ];
        }
        if (str_contains($t, 'server rack') || str_contains($t, 'rack') || str_contains($t, 'commercial ess') || str_contains($t, 'industrial battery') || str_contains($t, 'high voltage') || str_contains($t, '50kwh') || str_contains($t, '100kwh') || str_contains($t, '200kwh') || str_contains($t, 'telecom') || str_contains($t, 'bank')) {
            return [
                'image' => '/images/services/lithium/lithium-server-rack-battery-48v.webp',
                'caption' => 'Commercial & Industrial High-Voltage Server-Rack LiFePO4 Energy Storage System (ESS).',
            ];
        }
        if (str_contains($t, 'wholesale') || str_contains($t, 'bulk') || str_contains($t, 'supplier') || str_contains($t, 'supply') || str_contains($t, 'warehouse') || str_contains($t, 'contractor')) {
            return [
                'image' => '/images/services/lithium/lithium-battery-supplier-warehouse.webp',
                'caption' => 'Authorized Grade-A LiFePO4 Lithium Battery Supply Warehouse & Logistics Hub in Karachi.',
            ];
        }
        if (str_contains($t, 'dealer') || str_contains($t, 'price') || str_contains($t, 'cost') || str_contains($t, 'buy') || str_contains($t, 'compare') || str_contains($t, 'warranty') || str_contains($t, 'showroom')) {
            return [
                'image' => '/images/services/lithium/lithium-battery-dealer-showroom.webp',
                'caption' => 'Certified Lithium Energy Storage Showroom and Consultation Center in Karachi.',
            ];
        }

        return [
            'image' => '/images/services/lithium/lithium-lifepo4-powerwall-48v.webp',
            'caption' => 'Wall-Mounted 5.12kWh & 10.24kWh 48V LiFePO4 Home Energy Storage Powerwall in Karachi.',
        ];
    }

    // 3. Solar Frame & Structures
    if (str_contains($t, 'structure') || str_contains($t, 'frame') || str_contains($t, 'mounting') || str_contains($t, 'carport') || str_contains($t, 'canopy') || str_contains($t, 'pergola') || str_contains($t, 'frp') || str_contains($c, 'frame') || str_contains($c, 'structure')) {
        if (str_contains($t, 'carport') || str_contains($t, 'parking') || str_contains($t, 'canopy') || str_contains($t, 'vehicle')) {
            return [
                'image' => '/images/services/structures/solar-carport-parking-structure.webp',
                'caption' => 'Engineered Commercial Solar Carport and Parking Canopy Structure in Karachi.',
            ];
        }
        if (str_contains($t, 'pergola') || str_contains($t, 'terrace') || str_contains($t, 'elevated') || str_contains($t, 'walking') || str_contains($t, 'rooftop pergola')) {
            return [
                'image' => '/images/services/structures/solar-pergola-frame-structure.webp',
                'caption' => 'Elevated Rooftop Solar Pergola Structure Preserving Full Terrace Living Space.',
            ];
        }
        if (str_contains($t, 'frp') || str_contains($t, 'composite') || str_contains($t, 'corrosion') || str_contains($t, 'rust') || str_contains($t, 'coastal') || str_contains($t, 'salt') || str_contains($t, 'marine') || str_contains($t, 'dha') || str_contains($t, 'clifton') || str_contains($t, 'port qasim')) {
            return [
                'image' => '/images/services/structures/solar-frp-composite-mounting-structure.webp',
                'caption' => 'Corrosion-Proof FRP Composite & Coastal Hot-Dip Galvanized Solar Mounting Structure.',
            ];
        }

        return [
            'image' => '/images/services/structures/solar-hot-dip-galvanized-elevated-structure.webp',
            'caption' => 'Industrial ASTM A123 Hot-Dip Galvanized Ground & Rooftop Solar Mounting Structure.',
        ];
    }

    // 4. Solar Installation & Systems
    if (str_contains($t, 'solar') || str_contains($c, 'solar')) {
        if (str_contains($t, 'inverter') || str_contains($t, 'shutting down') || str_contains($t, 'problem') || str_contains($t, 'fault') || str_contains($t, 'mppt') || str_contains($t, 'trip') || str_contains($t, 'hybrid inverter')) {
            return [
                'image' => '/images/services/solar/solar-hybrid-inverter-karachi.webp',
                'caption' => 'Tier-1 Smart Hybrid Solar Inverter System with Live LCD Performance Monitoring.',
            ];
        }
        if (str_contains($t, 'net metering') || str_contains($t, 'k-electric') || str_contains($t, 'bill') || str_contains($t, 'save') || str_contains($t, 'payback') || str_contains($t, 'roi') || str_contains($t, 'nepra') || str_contains($t, 'green meter')) {
            return [
                'image' => '/images/services/solar/solar-net-metering-karachi.webp',
                'caption' => 'Bi-Directional Smart Green Net Metering System Installed for K-Electric Grid Export.',
            ];
        }
        if (str_contains($t, 'commercial') || str_contains($t, 'industrial') || str_contains($t, 'factory') || str_contains($t, 'textile') || str_contains($t, 'warehouse') || str_contains($t, 'plaza') || str_contains($t, 'petrol pump') || str_contains($t, 'school') || str_contains($t, 'hospital') || str_contains($t, 'cold storage')) {
            return [
                'image' => '/images/services/solar/solar-commercial-industrial-karachi.webp',
                'caption' => 'Commercial & Industrial Rooftop Solar Photovoltaic Plant Commissioned in Karachi.',
            ];
        }

        return [
            'image' => '/images/services/solar/solar-rooftop-installation-karachi.webp',
            'caption' => 'High-Efficiency Tier-1 Residential Rooftop Solar Panel Installation in Karachi.',
        ];
    }

    // 5. Generator Topics
    if (str_contains($t, 'generator') || str_contains($t, 'diesel') || str_contains($t, 'kva') || str_contains($c, 'generator') || str_contains($c, 'power')) {
        if (str_contains($t, '1000') || str_contains($t, 'heavy')) {
            return [
                'image' => '/images/used/generator-1000kva.webp',
                'caption' => '1000 kVA Heavy Industrial Diesel Generator Set for Prime & Standby Power.',
            ];
        }
        if (str_contains($t, '500')) {
            return [
                'image' => '/images/used/generator-500kva.webp',
                'caption' => '500 kVA Heavy Duty Industrial Diesel Generator System.',
            ];
        }
        if (str_contains($t, '250')) {
            return [
                'image' => '/images/used/generator-250kva.webp',
                'caption' => '250 kVA Commercial Power Diesel Generator Set.',
            ];
        }
        if (str_contains($t, '100') || str_contains($t, 'portable') || str_contains($t, 'small')) {
            return [
                'image' => '/images/used/generator-100kva.webp',
                'caption' => '100 kVA Soundproof Portable Diesel Generator Unit.',
            ];
        }
        if (str_contains($t, 'trailer') || str_contains($t, 'mobile')) {
            return [
                'image' => '/images/used/generator-trailer.webp',
                'caption' => 'Mobile Trailer-Mounted Rapid Deployment Diesel Generator.',
            ];
        }

        return [
            'image' => '/images/used/generator-500kva.webp',
            'caption' => 'Heavy-Duty Commercial Diesel Generator Solution.',
        ];
    }

    // 6. Portacabin / Container Topics
    if (str_contains($t, 'portacabin') || str_contains($t, 'cabin') || str_contains($t, 'container') || str_contains($t, 'caravan') || str_contains($t, 'ablution') || str_contains($c, 'portacabin')) {
        if (str_contains($t, '40ft') || str_contains($t, '40 ft') || str_contains($t, 'large') || str_contains($t, 'office')) {
            return [
                'image' => '/images/used/portacabin-40ft.webp',
                'caption' => '40ft Heavy Duty Prefabricated Modular Site Office Portacabin.',
            ];
        }

        return [
            'image' => '/images/used/portacabin-20ft.webp',
            'caption' => '20ft Insulated Site Office Portacabin & Living Accommodation Unit.',
        ];
    }

    // Default Fallback
    return [
        'image' => '/images/services/solar/solar-rooftop-installation-karachi.webp',
        'caption' => 'Engineered Clean Energy and Security Solutions by FWB Ventures Karachi.',
    ];
}

// Test against samples
$samples = [
    'Solar Inverter Troubleshooting in Karachi',
    'How Much Does CCTV Storage Cost in Karachi',
    '12V 100Ah Lithium Battery for Home UPS',
    'Solar Carport Structures for Commercial Parking',
    'Commercial Solar Panel Installation for Textile Mill',
    'PTZ Dome Camera Installation in DHA',
    'High Voltage Server Rack Lithium Battery 100kWh',
    'Hot Dip Galvanized Solar Frame Structure Cost',
    '1000 kVA Industrial Generator Rental',
    'Portacabin 40ft Site Office for Construction',
    'CCTV Installation Areas in Karachi',
    'Lithium Battery Supply & Installation Areas in Karachi',
];

echo "=== TOPIC MATCHER TEST ===\n";
foreach ($samples as $title) {
    $res = getTopicImage($title);
    echo sprintf("%-55s => %s\n", $title, $res['image']);
}
