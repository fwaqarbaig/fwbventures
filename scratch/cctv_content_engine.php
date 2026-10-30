<?php

/**
 * FWB Ventures - Advanced CCTV Content Generation Engine
 * Generates 2,000+ words of unique, high-authority, technical SEO content
 * specifically calibrated for CCTV Security in Karachi, Sindh, Pakistan.
 */

require_once __DIR__.'/cctv_engineering_extensions.php';
require_once __DIR__.'/cctv_builders_cameras.php';
require_once __DIR__.'/cctv_builders_solutions.php';
require_once __DIR__.'/cctv_builders_services.php';
require_once __DIR__.'/cctv_builders_pricing_brands.php';
require_once __DIR__.'/cctv_builders_pillar.php';

function generateCctvServiceData($service)
{
    $slug = $service->slug;
    $title = $service->title;

    $cluster = detectCctvCluster($slug);

    switch ($cluster) {
        case 'camera_types':
            $data = buildCctvCameraContent($service);
            break;
        case 'solutions':
            $data = buildCctvSolutionContent($service);
            break;
        case 'services':
            $data = buildCctvServiceContent($service);
            break;
        case 'pricing_brands':
            $data = buildCctvPricingBrandsContent($service);
            break;
        case 'pillar':
        default:
            $data = buildCctvPillarContent($service);
            break;
    }

    // Ensure strict 2,000+ word requirement with deep CCTV technical engineering extensions
    $content = $data['content'];
    $wc = str_word_count(strip_tags($content));

    if ($wc < 2050) {
        if (! str_contains($content, 'Digital Video Storage Engineering')) {
            $content .= "\n\n".getCctvStorageNetworkSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Coastal Marine Weatherproofing & Anti-Corrosion')) {
            $content .= "\n\n".getCctvCoastalWeatherproofingSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, '24/7 Security Resilience: Solar Power & Lithium Battery')) {
            $content .= "\n\n".getCctvSolarLithiumBackupSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Artificial Intelligence & Deep Learning Video Analytics')) {
            $content .= "\n\n".getCctvAiAnalyticsSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Professional Operations & Annual Maintenance Contracts')) {
            $content .= "\n\n".getCctvMaintenanceAmcSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    $data['content'] = $content;

    return $data;
}

function detectCctvCluster($slug)
{
    if (in_array($slug, [
        'cctv-services-karachi', 'cctv-cameras-karachi',
        'cctv-solutions-karachi', 'cctv-services-installation-karachi',
        'cctv-camera-prices-karachi',
    ])) {
        return 'pillar';
    }

    if (in_array($slug, [
        'ip-cctv-cameras', 'hd-cctv-cameras', 'wifi-cctv-cameras',
        'wireless-security-cameras', 'indoor-cctv-cameras', 'outdoor-cctv-cameras',
        'dome-cctv-cameras', 'bullet-cctv-cameras', 'ptz-cctv-cameras',
        '4k-cctv-cameras', 'night-vision-cctv-cameras', 'smart-cctv-cameras',
        'cctv-cameras',
    ])) {
        return 'camera_types';
    }

    if (in_array($slug, [
        'home-cctv-camera-systems', 'residential-security-cameras',
        'commercial-cctv-systems', 'office-cctv-camera-systems',
        'shop-cctv-camera-systems', 'factory-cctv-systems',
        'warehouse-cctv-systems', 'school-cctv-systems',
        'hospital-cctv-systems', 'industrial-security-camera-systems',
        'wireless-cctv-solutions', 'cctv-solutions-in-karachi',
    ])) {
        return 'solutions';
    }

    if (in_array($slug, [
        'cctv-camera-installation', 'cctv-camera-repair',
        'cctv-maintenance', 'cctv-wiring-and-cabling',
        'mobile-cctv-viewing-setup', 'cctv-system-upgrades',
        'cctv-annual-maintenance-contracts', 'cctv-services-amc',
    ])) {
        return 'services';
    }

    return 'pricing_brands';
}
