<?php

/**
 * FWB Ventures - Advanced Solar Frame Content Generation Engine
 * Generates 2,050+ words of unique, high-authority, technical SEO content
 * specifically calibrated for Solar Mounting Structures in Karachi, Sindh, Pakistan.
 */

require_once __DIR__.'/solar_frame_engineering_extensions.php';
require_once __DIR__.'/solar_frame_builders_pillar.php';
require_once __DIR__.'/solar_frame_builders_types.php';
require_once __DIR__.'/solar_frame_builders_materials.php';
require_once __DIR__.'/solar_frame_builders_local_pricing.php';

function generateSolarFrameServiceData($service)
{
    $slug = $service->slug;
    $title = $service->title;

    $cluster = detectSolarFrameCluster($slug);

    switch ($cluster) {
        case 'types':
            $data = buildSolarFrameTypesContent($service);
            break;
        case 'materials':
            $data = buildSolarFrameMaterialsContent($service);
            break;
        case 'local_pricing':
            $data = buildSolarFrameLocalPricingContent($service);
            break;
        case 'pillar':
        default:
            $data = buildSolarFramePillarContent($service);
            break;
    }

    // Assign topic-specific high-resolution image
    $data['featured_image'] = getSolarFrameDedicatedImage($slug);
    $data['og_image'] = $data['featured_image'];

    // Ensure strict 2,050+ word requirement with deep structural, wind, and metallurgical extensions
    $content = $data['content'];
    $wc = str_word_count(strip_tags($content));

    if ($wc < 2050) {
        if (! str_contains($content, 'Structural Wind Aerodynamics & SBCA Uplift Engineering')) {
            $content .= "\n\n".getSolarFrameWindEngineeringSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'ASTM A123 Hot-Dip Galvanizing Metallurgy & Marine Salt-Fog Protection')) {
            $content .= "\n\n".getSolarFrameGalvanizationSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Precision Chemical Anchoring & RCC Roof Slab Waterproofing Integrity')) {
            $content .= "\n\n".getSolarFrameRoofAnchoringSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Material Engineering Matrix: Hot-Dip Steel vs Aluminum 6063-T5 vs FRP Composites')) {
            $content .= "\n\n".getSolarFrameMaterialComparisonSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Optimal Tilt Angle & Southern Azimuth Solar Geometry in Karachi')) {
            $content .= "\n\n".getSolarFrameTiltOrientationSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    if ($wc < 2050) {
        if (! str_contains($content, 'Electrical Grounding, Lightning Protection & Zone 2B Seismic Design')) {
            $content .= "\n\n".getSolarFrameSeismicEarthingSection($data['title']);
        }
        $wc = str_word_count(strip_tags($content));
    }

    $data['content'] = $content;

    // Generate comprehensive JSON-LD Schema
    $data['schema_markup'] = buildSolarFrameSchemaMarkup($service, $data);

    return $data;
}

function detectSolarFrameCluster($slug)
{
    $typesSlugs = [
        'solar-pergola-structure-in-karachi',
        'solar-carport-structure-in-karachi',
        'solar-parking-shade-structure-in-karachi',
        'solar-canopy-structure-in-karachi',
        'solar-structure-for-parking-lots-in-karachi',
        'solar-structure-for-carports-in-karachi',
        'solar-structure-for-petrol-pumps-in-karachi',
        'ground-mounted-solar-structure-in-karachi',
        'rooftop-solar-mounting-structure-in-karachi',
        'residential-solar-panel-structure-in-karachi',
        'utility-scale-solar-farm-structure-in-karachi',
        'large-scale-solar-farm-mounting-structure-in-karachi',
        'solar-panel-support-structure-in-karachi',
        'fixed-tilt-solar-farm-structure-in-karachi',
        'adjustable-solar-panel-mounting-structure-in-karachi',
        'single-axis-solar-tracker-structure-in-karachi',
        'dual-axis-solar-tracker-structure-in-karachi',
        'solar-farm-structure-installation-in-karachi',
    ];

    $materialsSlugs = [
        'galvanized-steel-solar-structure-in-karachi',
        'hot-dip-galvanized-solar-mounting-structure-in-karachi',
        'aluminium-solar-panel-mounting-structure-in-karachi',
        'heavy-duty-solar-farm-structure-in-karachi',
        'wind-resistant-solar-mounting-structure-in-karachi',
        'corrosion-resistant-solar-structure-in-karachi',
        'solar-structure-materials-in-karachi',
        'solar-structure-types-in-karachi',
        'wind-resistant-solar-structure-design-in-karachi',
        'solar-structure-for-karachis-hot-and-humid-climate',
        'solar-structure-design-for-coastal-areas-in-karachi',
        'solar-farm-structure-maintenance-in-karachi',
        'solar-farm-structure-repair-in-karachi',
    ];

    $localPricingSlugs = [
        'structure-installation-areas-in-karachi',
        'solar-structure-installation-in-dha-karachi',
        'solar-structure-installation-in-korangi-karachi',
        'solar-structure-installation-in-site-industrial-area-karachi',
        'solar-structure-installation-in-port-qasim-karachi',
        'solar-structure-installation-in-landhi-karachi',
        'solar-structure-installation-in-malir-karachi',
        'solar-structure-installation-in-north-karachi',
        'solar-structure-installation-in-gulshan-e-iqbal-karachi',
        'solar-structure-installation-in-shahrah-e-faisal-karachi',
        'solar-farm-structure-price-in-karachi',
        'solar-panel-mounting-structure-price-in-karachi',
        'ground-mounted-solar-structure-cost-in-karachi',
        'rooftop-solar-structure-price-in-karachi',
        'galvanized-solar-structure-price-in-karachi',
        'aluminium-solar-mounting-structure-price-in-karachi',
        'solar-mounting-structure-per-kw-price-in-karachi',
        'solar-structure-for-5kw-solar-system-in-karachi',
        'solar-structure-for-7kw-solar-system-in-karachi',
        'solar-structure-for-10kw-solar-system-in-karachi',
        'solar-structure-for-15kw-solar-system-in-karachi',
        'solar-structure-for-50kw-solar-system-in-karachi',
        'solar-structure-for-100kw-solar-system-in-karachi',
        'solar-structure-for-500kw-solar-farm-in-karachi',
        'solar-structure-for-1mw-solar-power-plant-in-karachi',
        'solar-structures-by-capacity',
        'solar-structures-by-application',
        'solar-structure-for-industrial-projects-in-karachi',
        'solar-structure-for-commercial-buildings-in-karachi',
        'solar-structure-for-factory-rooftops-in-karachi',
        'solar-structure-for-warehouse-rooftops-in-karachi',
        'solar-structure-for-industrial-sheds-in-karachi',
        'industrial-solar-mounting-structure-in-karachi',
        'commercial-solar-mounting-structure-in-karachi',
    ];

    if (in_array($slug, $typesSlugs)) {
        return 'types';
    }

    if (in_array($slug, $materialsSlugs)) {
        return 'materials';
    }

    if (in_array($slug, $localPricingSlugs)) {
        return 'local_pricing';
    }

    return 'pillar';
}

function getSolarFrameDedicatedImage($slug)
{
    // Carports, canopies, parking shades, petrol pumps
    if (in_array($slug, [
        'solar-carport-structure-in-karachi', 'solar-parking-shade-structure-in-karachi',
        'solar-canopy-structure-in-karachi', 'solar-structure-for-parking-lots-in-karachi',
        'solar-structure-for-carports-in-karachi', 'solar-structure-for-petrol-pumps-in-karachi',
    ])) {
        return '/images/services/structures/solar-carport-parking-structure.webp';
    }

    // Pergola structures and terrace architectural frames
    if (in_array($slug, [
        'solar-pergola-structure-in-karachi', 'residential-solar-panel-structure-in-karachi',
        'rooftop-solar-mounting-structure-in-karachi', 'rooftop-solar-structure-price-in-karachi',
        'solar-structure-installation-in-dha-karachi', 'solar-structure-installation-in-gulshan-e-iqbal-karachi',
    ])) {
        return '/images/services/structures/solar-pergola-frame-structure.webp';
    }

    // FRP composite, corrosion-resistant, coastal design
    if (in_array($slug, [
        'corrosion-resistant-solar-structure-in-karachi',
        'solar-structure-for-karachis-hot-and-humid-climate',
        'solar-structure-design-for-coastal-areas-in-karachi',
        'aluminium-solar-panel-mounting-structure-in-karachi',
        'aluminium-solar-mounting-structure-price-in-karachi',
    ])) {
        return '/images/services/structures/solar-frp-composite-mounting-structure.webp';
    }

    // Commercial & industrial sheds, 50kW to 1MW utility scale
    if (in_array($slug, [
        'industrial-solar-mounting-structure-in-karachi',
        'commercial-solar-mounting-structure-in-karachi',
        'solar-structure-for-industrial-projects-in-karachi',
        'solar-structure-for-commercial-buildings-in-karachi',
        'solar-structure-for-factory-rooftops-in-karachi',
        'solar-structure-for-warehouse-rooftops-in-karachi',
        'solar-structure-for-industrial-sheds-in-karachi',
        'solar-structure-for-50kw-solar-system-in-karachi',
        'solar-structure-for-100kw-solar-system-in-karachi',
        'solar-structure-for-500kw-solar-farm-in-karachi',
        'solar-structure-for-1mw-solar-power-plant-in-karachi',
        'utility-scale-solar-farm-structure-in-karachi',
        'large-scale-solar-farm-mounting-structure-in-karachi',
        'ground-mounted-solar-structure-in-karachi',
        'ground-mounted-solar-structure-cost-in-karachi',
        'solar-structure-installation-in-site-industrial-area-karachi',
        'solar-structure-installation-in-port-qasim-karachi',
        'solar-structure-installation-in-korangi-karachi',
        'solar-structure-installation-in-landhi-karachi',
    ])) {
        return '/images/services/solar/solar-commercial-industrial-karachi.webp';
    }

    // Default: heavy-duty hot-dip galvanized elevated structure
    return '/images/services/structures/solar-hot-dip-galvanized-elevated-structure.webp';
}

function buildSolarFrameSchemaMarkup($service, $data)
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
                    'priceRange' => 'PKR 45,000 - PKR 8,800,000',
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
                    'name' => 'Solar Mounting Structure Engineering Solutions',
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
                        'name' => 'Solar Mounting Structures',
                        'item' => url('/service/solar-frame-structure-karachi'),
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
