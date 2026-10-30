<?php

/**
 * FWB Ventures - Advanced Lithium Battery Content Generation Engine
 * Generates 2,050+ words of unique, high-authority, technical SEO content
 * specifically calibrated for LiFePO4 Energy Storage in Karachi, Sindh, Pakistan.
 */

require_once __DIR__.'/lithium_engineering_extensions.php';
require_once __DIR__.'/lithium_builders_pillar.php';
require_once __DIR__.'/lithium_builders_residential.php';
require_once __DIR__.'/lithium_builders_commercial.php';
require_once __DIR__.'/lithium_builders_pricing.php';

function generateLithiumServiceData($service)
{
    $slug = $service->slug;
    $title = $service->title;

    $cluster = detectLithiumCluster($slug);

    switch ($cluster) {
        case 'residential':
            $data = buildLithiumResidentialContent($service);
            break;
        case 'commercial':
            $data = buildLithiumCommercialContent($service);
            break;
        case 'pricing':
            $data = buildLithiumPricingContent($service);
            break;
        case 'pillar':
        default:
            $data = buildLithiumPillarContent($service);
            break;
    }

    // Assign topic-specific high-resolution image
    $data['featured_image'] = getLithiumDedicatedImage($slug);
    $data['og_image'] = $data['featured_image'];

    // Ensure strict 2,050+ word requirement with deep electrochemical and electrical engineering extensions
    $content = $data['content'];
    $wc = str_word_count(strip_tags($content));

    if ($wc < 2050) {
        if (! str_contains($content, 'Grade-A LiFePO4 Electrochemistry vs Conventional Lead-Acid')) {
            $content .= "\n\n".getLithiumElectrochemistrySection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Smart BMS Architecture & Inverter Closed-Loop')) {
            $content .= "\n\n".getLithiumBmsProtocolSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Karachi High-Heat Engineering & Coastal Salt-Fog')) {
            $content .= "\n\n".getLithiumKarachiThermalSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Professional Commissioning, DC Circuit Protection')) {
            $content .= "\n\n".getLithiumInstallationCommissioningSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, '10-Year Levelized Cost of Storage (LCOS) vs Lead-Acid Economics')) {
            $content .= "\n\n".getLithiumFinancialEconomicsSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    $data['content'] = $content;

    // Generate comprehensive JSON-LD Schema
    $data['schema_markup'] = buildLithiumSchemaMarkup($service, $data);

    return $data;
}

function detectLithiumCluster($slug)
{
    $residentialSlugs = [
        'residential-lithium-batteries', 'home-lithium-battery',
        'lithium-battery-for-home-solar-system', 'lithium-battery-for-home-ups',
        'lithium-battery-for-home-backup', 'lithium-battery-for-household-inverter',
        '12v-100ah-lithium-battery', '12v-200ah-lithium-battery',
        '24v-100ah-lithium-battery', '24v-200ah-lithium-battery',
        '48v-100ah-lithium-battery', '512v-100ah-solar-battery',
        '5kwh-home-lithium-battery', '10kwh-home-battery-storage',
        'home-solar-energy-storage-battery',
    ];

    $commercialSlugs = [
        'commercial-industrial-lithium-batteries-karachi',
        'commercial-industrial-lithium-batteries',
        'commercial-solar-battery-storage', 'commercial-energy-storage-system',
        'lithium-battery-for-office-backup', 'lithium-battery-for-shop-backup',
        'lithium-battery-for-warehouse', 'lithium-battery-for-factory',
        'lithium-battery-for-industrial-solar-system', '10kwh-commercial-lithium-battery',
        '15kwh-commercial-battery-storage', '20kwh-commercial-lithium-battery',
        '30kwh-commercial-battery-storage', '50kwh-commercial-lithium-battery',
        '100kwh-commercial-energy-storage', '200kwh-industrial-battery-storage',
        'high-capacity-lifepo4-battery', 'three-phase-inverter-battery-storage',
        'industrial-lithium-battery-bank',
    ];

    $pricingSlugs = [
        'lithium-battery-prices-karachi', 'lithium-battery-prices-in-karachi',
        'residential-lithium-battery-prices', 'commercial-lithium-battery-prices',
        'industrial-lithium-battery-prices', 'wholesale-lithium-battery-prices',
    ];

    if (in_array($slug, $residentialSlugs)) {
        return 'residential';
    }

    if (in_array($slug, $commercialSlugs)) {
        return 'commercial';
    }

    if (in_array($slug, $pricingSlugs)) {
        return 'pricing';
    }

    return 'pillar';
}

function getLithiumDedicatedImage($slug)
{
    // 12V and 24V deep-cycle battery packs
    if (in_array($slug, [
        '12v-100ah-lithium-battery', '12v-200ah-lithium-battery',
        '24v-100ah-lithium-battery', '24v-200ah-lithium-battery',
        'lithium-battery-for-home-ups', 'lithium-battery-for-household-inverter',
    ])) {
        return '/images/services/lithium/lithium-12v-24v-battery-pack.webp';
    }

    // Dealer showroom & retail pricing
    if (in_array($slug, [
        'lithium-battery-dealer-in-karachi', 'lithium-battery-prices-karachi',
        'lithium-battery-prices-in-karachi', 'residential-lithium-battery-prices',
        'commercial-lithium-battery-prices', 'industrial-lithium-battery-prices',
        'lithium-battery-for-shop-backup', 'lithium-batteries-karachi',
        'lithium-battery-in-karachi',
    ])) {
        return '/images/services/lithium/lithium-battery-dealer-showroom.webp';
    }

    // Supplier warehouse & wholesale
    if (in_array($slug, [
        'lithium-battery-supplier-in-karachi', 'lithium-battery-wholesale-in-karachi',
        'commercial-lithium-battery-supplier', 'wholesale-lithium-battery-prices',
        'lithium-battery-products-services', 'lithium-battery-for-warehouse',
        'lithium-battery-for-factory',
    ])) {
        return '/images/services/lithium/lithium-battery-supplier-warehouse.webp';
    }

    // Commercial & industrial server racks and BESS
    if (in_array($slug, [
        'commercial-industrial-lithium-batteries-karachi',
        'commercial-industrial-lithium-batteries',
        'commercial-solar-battery-storage', 'commercial-energy-storage-system',
        'lithium-battery-for-office-backup', 'lithium-battery-for-industrial-solar-system',
        '10kwh-commercial-lithium-battery', '15kwh-commercial-battery-storage',
        '20kwh-commercial-lithium-battery', '30kwh-commercial-battery-storage',
        '50kwh-commercial-lithium-battery', '100kwh-commercial-energy-storage',
        '200kwh-industrial-battery-storage', 'industrial-lithium-battery-bank',
    ])) {
        return '/images/services/lithium/lithium-server-rack-battery-48v.webp';
    }

    // Default to sleek 48V Powerwall for residential and general solar lithium
    return '/images/services/lithium/lithium-lifepo4-powerwall-48v.webp';
}

function buildLithiumSchemaMarkup($service, $data)
{
    $url = url('/service/'.$service->slug);
    $imageUrl = url($data['featured_image']);
    $title = $data['title'];
    $description = $data['meta_description'];

    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Service',
                '@id' => $url.'#service',
                'name' => $title,
                'description' => $description,
                'url' => $url,
                'image' => $imageUrl,
                'provider' => [
                    '@type' => 'LocalBusiness',
                    '@id' => url('/').'#organization',
                    'name' => 'FWB Ventures',
                    'url' => url('/'),
                    'telephone' => '+92-300-0000000',
                    'priceRange' => 'PKR 75,000 - PKR 10,500,000',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Main Shahrah-e-Faisal',
                        'addressLocality' => 'Karachi',
                        'addressRegion' => 'Sindh',
                        'addressCountry' => 'PK',
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => '24.8607',
                        'longitude' => '67.0011',
                    ],
                ],
                'areaServed' => [
                    '@type' => 'City',
                    'name' => 'Karachi',
                ],
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name' => 'Lithium Battery Energy Storage Solutions',
                    'itemListElement' => [
                        [
                            '@type' => 'Offer',
                            'itemOffered' => [
                                '@type' => 'Product',
                                'name' => $title,
                                'description' => $description,
                            ],
                        ],
                    ],
                ],
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => $url.'#breadcrumb',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => url('/'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Lithium Batteries',
                        'item' => url('/service/lithium-batteries-karachi'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $title,
                        'item' => $url,
                    ],
                ],
            ],
        ],
    ];

    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}
