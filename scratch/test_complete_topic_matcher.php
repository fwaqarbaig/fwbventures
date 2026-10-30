<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

function resolveTopicMedia(string $title, ?string $category = '', ?string $slug = ''): array
{
    $t = strtolower($title.' '.($slug ?? ''));
    $c = strtolower($category ?? '');

    // 1. CCTV
    if (str_contains($t, 'cctv') || str_contains($t, 'camera') || str_contains($t, 'nvr') || str_contains($t, 'dvr') || str_contains($c, 'cctv') || str_contains($c, 'security')) {
        if (str_contains($t, 'ptz') || str_contains($t, 'speed dome') || str_contains($t, '360') || str_contains($t, 'zoom') || str_contains($t, 'perimeter') || str_contains($t, 'pole')) {
            return [
                'image' => '/images/services/cctv/cctv-ptz-speed-dome-camera.webp',
                'caption' => 'High-Speed PTZ Outdoor Speed Dome Security Camera System with Optical Zoom in Karachi.',
                'alt' => 'High-Speed PTZ Outdoor Speed Dome Security Camera Karachi',
            ];
        }
        if (str_contains($t, 'nvr') || str_contains($t, 'dvr') || str_contains($t, 'storage') || str_contains($t, 'hard drive') || str_contains($t, 'tb') || str_contains($t, 'recording') || str_contains($t, 'monitor') || str_contains($t, 'control room') || str_contains($t, 'ups') || str_contains($t, 'load shedding') || str_contains($t, 'server room')) {
            return [
                'image' => '/images/services/cctv/cctv-nvr-monitoring-control-room.webp',
                'caption' => 'Enterprise CCTV Video Surveillance Control Room and NVR Archival Storage Infrastructure.',
                'alt' => 'Enterprise CCTV Control Room and High-Capacity NVR Storage System',
            ];
        }

        return [
            'image' => '/images/services/cctv/cctv-security-camera-system.webp',
            'caption' => 'Professional High-Definition 4K ColorVu Security Camera System Installation in Karachi.',
            'alt' => 'Professional 4K IP Security Camera Installation Karachi',
        ];
    }

    // 2. Lithium Batteries
    if (str_contains($t, 'lithium') || str_contains($t, 'battery') || str_contains($t, 'lifepo4') || str_contains($t, 'powerwall') || str_contains($t, 'ess') || str_contains($c, 'lithium') || str_contains($c, 'battery')) {
        if (str_contains($t, '12v') || str_contains($t, '24v') || str_contains($t, '100ah') || str_contains($t, '200ah') || str_contains($t, 'pack') || str_contains($t, 'deep cycle') || str_contains($t, 'ups replacement') || str_contains($t, 'marine') || str_contains($t, 'rv') || str_contains($t, 'diy')) {
            return [
                'image' => '/images/services/lithium/lithium-12v-24v-battery-pack.webp',
                'caption' => 'Deep-Cycle 12V & 24V Grade-A LiFePO4 Lithium Battery Pack with Smart BMS for UPS and Solar.',
                'alt' => '12V 24V Grade-A LiFePO4 Lithium Iron Phosphate Battery Pack Karachi',
            ];
        }
        if (str_contains($t, 'server rack') || str_contains($t, 'rack') || str_contains($t, 'commercial ess') || str_contains($t, 'industrial battery') || str_contains($t, 'high voltage') || str_contains($t, '50kwh') || str_contains($t, '100kwh') || str_contains($t, '200kwh') || str_contains($t, 'telecom') || str_contains($t, 'bank') || str_contains($t, 'factory backup')) {
            return [
                'image' => '/images/services/lithium/lithium-server-rack-battery-48v.webp',
                'caption' => 'Commercial & Industrial High-Voltage Server-Rack LiFePO4 Energy Storage System (ESS).',
                'alt' => 'Industrial Server Rack LiFePO4 Lithium Battery Energy Storage System Karachi',
            ];
        }
        if (str_contains($t, 'wholesale') || str_contains($t, 'bulk') || str_contains($t, 'supplier') || str_contains($t, 'supply') || str_contains($t, 'warehouse') || str_contains($t, 'contractor') || str_contains($t, 'distributor') || str_contains($t, 'supply areas')) {
            return [
                'image' => '/images/services/lithium/lithium-battery-supplier-warehouse.webp',
                'caption' => 'Authorized Grade-A LiFePO4 Lithium Battery Supply Warehouse & Logistics Hub in Karachi.',
                'alt' => 'Lithium Battery Warehouse and Supplier Facility in Karachi',
            ];
        }
        if (str_contains($t, 'dealer') || str_contains($t, 'price') || str_contains($t, 'cost') || str_contains($t, 'buy') || str_contains($t, 'compare') || str_contains($t, 'warranty') || str_contains($t, 'showroom')) {
            return [
                'image' => '/images/services/lithium/lithium-battery-dealer-showroom.webp',
                'caption' => 'Certified Lithium Energy Storage Showroom and Consultation Center in Karachi.',
                'alt' => 'Lithium Battery Dealer Showroom and Customer Consultation Center Karachi',
            ];
        }

        return [
            'image' => '/images/services/lithium/lithium-lifepo4-powerwall-48v.webp',
            'caption' => 'Wall-Mounted 5.12kWh & 10.24kWh 48V LiFePO4 Home Energy Storage Powerwall in Karachi.',
            'alt' => 'Wall-Mounted 48V LiFePO4 Lithium Powerwall Solar Battery Karachi',
        ];
    }

    // 3. Solar Frame & Structures
    if (str_contains($t, 'structure') || str_contains($t, 'frame') || str_contains($t, 'mounting') || str_contains($t, 'carport') || str_contains($t, 'canopy') || str_contains($t, 'pergola') || str_contains($t, 'frp') || str_contains($c, 'frame') || str_contains($c, 'structure')) {
        if (str_contains($t, 'carport') || str_contains($t, 'parking') || str_contains($t, 'canopy') || str_contains($t, 'vehicle')) {
            return [
                'image' => '/images/services/structures/solar-carport-parking-structure.webp',
                'caption' => 'Engineered Commercial Solar Carport and Parking Canopy Structure in Karachi.',
                'alt' => 'Commercial Solar Carport Parking Canopy Mounting Structure Karachi',
            ];
        }
        if (str_contains($t, 'pergola') || str_contains($t, 'terrace') || str_contains($t, 'elevated') || str_contains($t, 'walking') || str_contains($t, 'rooftop pergola') || str_contains($t, 'gazebo')) {
            return [
                'image' => '/images/services/structures/solar-pergola-frame-structure.webp',
                'caption' => 'Elevated Rooftop Solar Pergola Structure Preserving Full Terrace Living Space.',
                'alt' => 'Custom Elevated Rooftop Solar Pergola Frame Structure Karachi',
            ];
        }
        if (str_contains($t, 'frp') || str_contains($t, 'composite') || str_contains($t, 'corrosion') || str_contains($t, 'rust') || str_contains($t, 'coastal') || str_contains($t, 'salt') || str_contains($t, 'marine') || str_contains($t, 'dha') || str_contains($t, 'clifton') || str_contains($t, 'port qasim')) {
            return [
                'image' => '/images/services/structures/solar-frp-composite-mounting-structure.webp',
                'caption' => 'Corrosion-Proof FRP Composite & Coastal Hot-Dip Galvanized Solar Mounting Structure.',
                'alt' => 'Corrosion Resistant FRP Composite Solar Panel Mounting Frame Karachi',
            ];
        }

        return [
            'image' => '/images/services/structures/solar-hot-dip-galvanized-elevated-structure.webp',
            'caption' => 'Industrial ASTM A123 Hot-Dip Galvanized Ground & Rooftop Solar Mounting Structure.',
            'alt' => 'ASTM A123 Hot-Dip Galvanized Steel Solar Mounting Structure Karachi',
        ];
    }

    // 4. Solar Installation & PV Systems
    if (str_contains($t, 'solar') || str_contains($c, 'solar')) {
        if (str_contains($t, 'inverter') || str_contains($t, 'shutting down') || str_contains($t, 'problem') || str_contains($t, 'fault') || str_contains($t, 'mppt') || str_contains($t, 'trip') || str_contains($t, 'hybrid inverter')) {
            return [
                'image' => '/images/services/solar/solar-hybrid-inverter-karachi.webp',
                'caption' => 'Tier-1 Smart Hybrid Solar Inverter System with Live LCD Performance Monitoring.',
                'alt' => 'Tier-1 Hybrid Solar Inverter System Installation in Karachi',
            ];
        }
        if (str_contains($t, 'net metering') || str_contains($t, 'k-electric') || str_contains($t, 'bill') || str_contains($t, 'save') || str_contains($t, 'payback') || str_contains($t, 'roi') || str_contains($t, 'nepra') || str_contains($t, 'green meter')) {
            return [
                'image' => '/images/services/solar/solar-net-metering-karachi.webp',
                'caption' => 'Bi-Directional Smart Green Net Metering System Installed for K-Electric Grid Export.',
                'alt' => 'K-Electric Bi-Directional Green Net Metering Setup Karachi',
            ];
        }
        if (str_contains($t, 'commercial') || str_contains($t, 'industrial') || str_contains($t, 'factory') || str_contains($t, 'textile') || str_contains($t, 'warehouse') || str_contains($t, 'plaza') || str_contains($t, 'petrol pump') || str_contains($t, 'school') || str_contains($t, 'hospital') || str_contains($t, 'cold storage')) {
            return [
                'image' => '/images/services/solar/solar-commercial-industrial-karachi.webp',
                'caption' => 'Commercial & Industrial Rooftop Solar Photovoltaic Plant Commissioned in Karachi.',
                'alt' => 'Commercial and Industrial Rooftop Solar Installation Karachi',
            ];
        }

        return [
            'image' => '/images/services/solar/solar-rooftop-installation-karachi.webp',
            'caption' => 'High-Efficiency Tier-1 Residential Rooftop Solar Panel Installation in Karachi.',
            'alt' => 'Residential Rooftop Tier-1 Solar Panel Installation Karachi',
        ];
    }

    // 5. Chillers & Cooling
    if (str_contains($t, 'chiller') || str_contains($t, 'cooling') || str_contains($t, 'ac unit') || str_contains($t, 'wild air') || str_contains($t, 'refrigeration') || str_contains($c, 'cooling') || str_contains($c, 'chiller')) {
        if (str_contains($t, 'water-cooled') || str_contains($t, 'water cooled')) {
            return [
                'image' => '/storage/media/water-cooled-chiller-for-rent-in-uae.webp',
                'caption' => 'High-Efficiency Water-Cooled Industrial Chiller System.',
                'alt' => 'Water-Cooled Chiller System Rental',
            ];
        }
        if (str_contains($t, 'portable chiller') || str_contains($t, 'portable-chiller')) {
            return [
                'image' => '/storage/media/portable-chiller.webp',
                'caption' => 'Mobile Heavy-Duty Portable Chiller Unit.',
                'alt' => 'Portable Chiller Rental Unit',
            ];
        }
        if (str_contains($t, 'packaged') || str_contains($t, 'package ac') || str_contains($t, 'ac rental') || str_contains($t, 'rental ac') || str_contains($t, 'rental-ac')) {
            return [
                'image' => '/storage/media/Packaged-ac-unit-rental-in-uae.webp',
                'caption' => 'Industrial Packaged Air Conditioning and Temporary Cooling Unit.',
                'alt' => 'Packaged AC Unit Rental',
            ];
        }
        if (str_contains($t, 'wild air') || str_contains($t, 'wild-air')) {
            return [
                'image' => '/storage/media/wild-air-rental.webp',
                'caption' => 'High-Capacity Temporary Wild Air Cooling & Ventilation Solution.',
                'alt' => 'Wild Air Cooling Rental Solution',
            ];
        }

        return [
            'image' => '/storage/media/air-cooled-chiller.webp',
            'caption' => 'Heavy-Duty Industrial Air-Cooled Chiller Rental Equipment.',
            'alt' => 'Heavy-Duty Industrial Air-Cooled Chiller Rental',
        ];
    }

    // 6. Portacabins & Containers
    if (str_contains($t, 'portacabin') || str_contains($t, 'cabin') || str_contains($t, 'container') || str_contains($t, 'caravan') || str_contains($t, 'ablution') || str_contains($c, 'portacabin')) {
        if (str_contains($t, '40ft') || str_contains($t, '40 ft') || str_contains($t, 'office')) {
            return [
                'image' => '/images/used/portacabin-40ft.webp',
                'caption' => '40ft Heavy Duty Prefabricated Modular Site Office Portacabin.',
                'alt' => '40ft Prefabricated Modular Site Office Portacabin',
            ];
        }
        if (str_contains($t, 'ablution') || str_contains($t, 'toilet')) {
            return [
                'image' => '/storage/media/Portacabin-Toilet-Ablution-Units.webp',
                'caption' => 'Modular Sanitary & Ablution Portacabin Unit.',
                'alt' => 'Portacabin Toilet and Ablution Unit',
            ];
        }
        if (str_contains($t, 'security')) {
            return [
                'image' => '/storage/media/Security-Cabins.webp',
                'caption' => 'Prefabricated Insulated Security Guard Cabin.',
                'alt' => 'Prefabricated Insulated Security Guard Cabin',
            ];
        }

        return [
            'image' => '/images/used/portacabin-20ft.webp',
            'caption' => '20ft Insulated Site Office Portacabin & Living Accommodation Unit.',
            'alt' => '20ft Insulated Site Office Portacabin Unit',
        ];
    }

    // 7. Generators
    if (str_contains($t, 'generator') || str_contains($t, 'diesel') || str_contains($t, 'kva') || str_contains($t, 'genset') || str_contains($c, 'generator') || str_contains($c, 'power')) {
        if (str_contains($t, '1000') || str_contains($t, 'mega') || str_contains($t, 'heavy-duty industrial')) {
            return [
                'image' => '/images/used/generator-1000kva.webp',
                'caption' => '1000 kVA Heavy Industrial Diesel Generator Set for Prime & Standby Power.',
                'alt' => '1000 kVA Heavy Industrial Diesel Generator',
            ];
        }
        if (str_contains($t, '500') || str_contains($t, 'cummins')) {
            return [
                'image' => '/images/used/generator-500kva.webp',
                'caption' => '500 kVA Heavy Duty Industrial Diesel Generator System.',
                'alt' => '500 kVA Heavy Duty Industrial Diesel Generator Set',
            ];
        }
        if (str_contains($t, '250')) {
            return [
                'image' => '/images/used/generator-250kva.webp',
                'caption' => '250 kVA Commercial Power Diesel Generator Set.',
                'alt' => '250 kVA Commercial Power Diesel Generator',
            ];
        }
        if (str_contains($t, '100')) {
            return [
                'image' => '/images/used/generator-100kva.webp',
                'caption' => '100 kVA Soundproof Portable Diesel Generator Unit.',
                'alt' => '100 kVA Soundproof Portable Diesel Generator',
            ];
        }
        if (str_contains($t, 'silent')) {
            return [
                'image' => '/storage/media/Silent-Generator.webp',
                'caption' => 'Super Silent Canopy Soundproof Diesel Generator.',
                'alt' => 'Super Silent Acoustic Canopy Diesel Generator',
            ];
        }
        if (str_contains($t, 'portable') || str_contains($t, 'honda')) {
            return [
                'image' => '/storage/media/Portable-generator.webp',
                'caption' => 'Portable Soundproof Heavy-Duty Generator Unit.',
                'alt' => 'Portable Soundproof Generator Unit',
            ];
        }
        if (str_contains($t, 'trailer') || str_contains($t, 'mobile')) {
            return [
                'image' => '/images/used/generator-trailer.webp',
                'caption' => 'Mobile Trailer-Mounted Rapid Deployment Diesel Generator.',
                'alt' => 'Trailer Mounted Mobile Diesel Generator',
            ];
        }

        return [
            'image' => '/images/used/generator-500kva.webp',
            'caption' => 'Heavy-Duty Commercial Diesel Generator Solution.',
            'alt' => 'Heavy-Duty Commercial Diesel Generator Solution',
        ];
    }

    // Default Fallback
    return [
        'image' => '/images/services/solar/solar-rooftop-installation-karachi.webp',
        'caption' => 'Engineered Clean Energy, Solar, Structure & Security Solutions by FWB Ventures Karachi.',
        'alt' => 'FWB Ventures Clean Energy and Security Systems Karachi',
    ];
}

// Verify that all returned files physically exist on disk!
$checkedFiles = [];
$missingFiles = [];

echo "Testing all 320 Posts...\n";
foreach (Post::where('status', 'published')->get() as $p) {
    $cat = $p->categories->first()?->name;
    $res = resolveTopicMedia($p->title, $cat, $p->slug);
    $path = public_path(ltrim($res['image'], '/'));
    if (! file_exists($path)) {
        $missingFiles[$res['image']] = true;
    }
    $checkedFiles[$res['image']] = ($checkedFiles[$res['image']] ?? 0) + 1;
}

echo "Testing all 319 Services...\n";
foreach (Service::all() as $s) {
    $res = resolveTopicMedia($s->title, $s->category, $s->slug);
    $path = public_path(ltrim($res['image'], '/'));
    if (! file_exists($path)) {
        $missingFiles[$res['image']] = true;
    }
    $checkedFiles[$res['image']] = ($checkedFiles[$res['image']] ?? 0) + 1;
}

echo "Testing all 61 Pages...\n";
foreach (Page::all() as $page) {
    $res = resolveTopicMedia($page->title, '', $page->slug);
    $path = public_path(ltrim($res['image'], '/'));
    if (! file_exists($path)) {
        $missingFiles[$res['image']] = true;
    }
    $checkedFiles[$res['image']] = ($checkedFiles[$res['image']] ?? 0) + 1;
}

echo "\n================ RESULTS ================\n";
if (! empty($missingFiles)) {
    echo "ERROR: The following files do not exist:\n";
    foreach (array_keys($missingFiles) as $f) {
        echo "  - $f\n";
    }
} else {
    echo "SUCCESS: 100% OF RESOLVED IMAGES EXIST ON DISK!\n";
}

echo "\nImage Distribution Across Everything (Posts, Services, Pages):\n";
foreach ($checkedFiles as $f => $cnt) {
    echo sprintf("  %-65s : %3d items\n", $f, $cnt);
}
