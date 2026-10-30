<?php

/**
 * FWB Ventures - Advanced Solar Content Generation Engine
 * Generates 2,000+ words of unique, high-authority, technical SEO content
 * specifically calibrated for Karachi, Sindh, Pakistan.
 */

require_once __DIR__.'/solar_engineering_extensions.php';
require_once __DIR__.'/solar_builders_capacity.php';
require_once __DIR__.'/solar_builders_grid.php';
require_once __DIR__.'/solar_builders_pricing.php';
require_once __DIR__.'/solar_builders_equipment.php';
require_once __DIR__.'/solar_builders_sector.php';
require_once __DIR__.'/solar_builders_maintenance.php';
require_once __DIR__.'/solar_builders_locality.php';
require_once __DIR__.'/solar_builders_pillar.php';

function generateSolarServiceData($service)
{
    $slug = $service->slug;
    $title = $service->title;

    // Detect cluster
    $cluster = detectCluster($slug);

    // Call cluster specific builder
    switch ($cluster) {
        case 'capacity':
            $data = buildCapacityContent($service);
            break;
        case 'pricing':
            $data = buildPricingContent($service);
            break;
        case 'grid_type':
            $data = buildGridTypeContent($service);
            break;
        case 'equipment':
            $data = buildEquipmentContent($service);
            break;
        case 'sector':
            $data = buildSectorContent($service);
            break;
        case 'maintenance':
            $data = buildMaintenanceContent($service);
            break;
        case 'locality':
            $data = buildLocalityContent($service);
            break;
        case 'pillar':
        default:
            $data = buildPillarContent($service);
            break;
    }

    // Ensure strict 2,000+ word requirement with deep technical engineering extensions
    $content = $data['content'];
    $wc = str_word_count(strip_tags($content));

    if ($wc < 2050) {
        // Append technical power quality and grid synchronization section
        if (! str_contains($content, 'Electrical Power Quality, Grid Dynamics')) {
            $content .= "\n\n".getGridPowerQualitySection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        // Append metallurgical galvanization engineering section
        if (! str_contains($content, 'Metallurgical Science of Hot-Dip Galvanizing')) {
            $content .= "\n\n".getMetallurgicalGalvanizationSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        // Append 2026 K-Electric net metering tariff arbitrage section
        if (! str_contains($content, '2026 K-Electric Net-Metering Economics')) {
            $content .= "\n\n".getDetailedNetMeteringTariffSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        // Append preventative O&M protocols section
        if (! str_contains($content, 'Comprehensive Operations & Maintenance (O&M) Protocols')) {
            $content .= "\n\n".getOperationsSLASection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    $data['content'] = $content;

    return $data;
}

function detectCluster($slug)
{
    if (preg_match('/(\d+kw|above-100kw)/', $slug) && ! str_contains($slug, 'price') && ! str_contains($slug, 'cost')) {
        return 'capacity';
    }
    if (str_contains($slug, 'price') || str_contains($slug, 'cost')) {
        return 'pricing';
    }
    if (in_array($slug, [
        'on-grid-solar-systems-in-karachi', 'off-grid-solar-systems-in-karachi',
        'hybrid-solar-systems-in-karachi', 'grid-tied-solar-systems-in-karachi',
        'solar-systems-with-battery-backup-in-karachi', 'solar-systems-for-load-shedding-in-karachi',
        'three-phase-solar-systems-in-karachi', 'solar-systems-by-type-karachi',
    ])) {
        return 'grid_type';
    }
    if (in_array($slug, [
        'solar-panels-and-equipment-karachi', 'solar-panels-in-karachi',
        'solar-inverters-in-karachi', 'hybrid-solar-inverters-in-karachi',
        'solar-batteries-in-karachi', 'lithium-solar-batteries-in-karachi',
        'solar-mounting-structures-karachi', 'solar-cables-and-connectors-in-karachi',
        'solar-protection-and-earthing-equipment-in-karachi',
    ])) {
        return 'equipment';
    }
    if (in_array($slug, [
        'home-solar-systems-in-karachi', 'office-solar-systems-in-karachi',
        'shop-solar-systems-in-karachi', 'factory-solar-systems-in-karachi',
        'warehouse-solar-systems-in-karachi', 'school-solar-systems-in-karachi',
        'hospital-solar-systems-in-karachi', 'restaurant-and-hotel-solar-systems-in-karachi',
        'residential-solar-panel-installation-in-karachi', 'commercial-solar-panel-installation-in-karachi',
        'industrial-solar-panel-installation-in-karachi', 'rooftop-solar-panel-installation-in-karachi',
        'solar-system-installation-for-new-buildings-in-karachi', 'solar-solutions-karachi',
    ])) {
        return 'sector';
    }
    if (in_array($slug, [
        'solar-services-karachi', 'solar-system-maintenance-in-karachi',
        'solar-panel-cleaning-in-karachi', 'solar-inverter-repair-in-karachi',
        'solar-system-troubleshooting-in-karachi', 'solar-system-upgrades-in-karachi',
        'solar-battery-installation-in-karachi', 'solar-system-inspection-in-karachi',
    ])) {
        return 'maintenance';
    }
    if (str_contains($slug, '-in-dha-') || str_contains($slug, '-in-clifton-') ||
        str_contains($slug, '-in-gulshan-') || str_contains($slug, '-in-gulistan-') ||
        str_contains($slug, '-in-north-nazimabad-') || str_contains($slug, '-in-pechs-') ||
        str_contains($slug, '-in-scheme-33-') || str_contains($slug, '-in-korangi-') ||
        str_contains($slug, '-in-malir-') || str_contains($slug, '-in-shahrah-e-faisal-') ||
        $slug === 'solar-installation-areas-karachi') {
        return 'locality';
    }

    return 'pillar';
}
