<?php

$targetFiles = [
    'resources/views/layouts/app.blade.php',
    'resources/views/frontend/about.blade.php',
    'resources/views/frontend/blog/show.blade.php',
    'resources/views/frontend/contact.blade.php',
    'resources/views/frontend/home.blade.php',
    'resources/views/frontend/partials/service-sidebar.blade.php',
    'resources/views/frontend/services/index.blade.php',
    'resources/views/frontend/services/show.blade.php',
    'resources/views/errors/404.blade.php',
    'resources/views/frontend/pages/industries.blade.php',
    'resources/views/frontend/pages/location-detail.blade.php',
    'resources/views/frontend/pages/locations.blade.php',
    'resources/views/frontend/pages/used-generators.blade.php',
    'resources/views/frontend/products/index.blade.php',
    'resources/views/frontend/products/show.blade.php',
    'resources/views/frontend/search.blade.php',
    'database/seeders/FwbAllLeafServicesSeeder.php',
    'tests/Feature/FrontendBlogTest.php',
    'tests/Feature/FwbVenturesSiteTest.php',
    'tests/Feature/ProductsAndServicesTest.php',
    'tests/Feature/SiteSearchTest.php',
];

$replacements = [
    // Formatted numbers
    '+92 300 0000000' => '+92 301 2118111',
    '+971 56 921 3754' => '+92 301 2118111',
    '+971 56 9213754' => '+92 301 2118111',
    '+971569213754' => '+92 301 2118111', // when displayed in text or tel: we'll handle tel below
    '+923000000000' => '+923012118111',
    '923000000000' => '923012118111',
    '971569213754' => '923012118111',
];

foreach ($targetFiles as $file) {
    $fullPath = __DIR__.'/../'.$file;
    if (! file_exists($fullPath)) {
        echo "File not found: $file\n";

        continue;
    }

    $content = file_get_contents($fullPath);
    $orig = $content;

    // Special fix for tel:+971569213754 -> tel:+923012118111
    $content = str_replace('tel:+971569213754', 'tel:+923012118111', $content);
    $content = str_replace('tel:+923000000000', 'tel:+923012118111', $content);
    $content = str_replace('tel:+92 300 0000000', 'tel:+923012118111', $content);

    // Legacy greetings in wa.me links
    $content = str_replace('Hello Generator Dubai,', 'Hello FWB Ventures,', $content);
    $content = str_replace('Hello+Generator+Dubai,', 'Hello+FWB+Ventures,', $content);
    $content = str_replace('Hello Rental Power UAE,', 'Hello FWB Ventures,', $content);
    $content = str_replace('Generator Dubai', 'FWB Ventures', $content);

    // Standard replacements
    foreach ($replacements as $from => $to) {
        $content = str_replace($from, $to, $content);
    }

    // Fix any tel:+92 301 2118111 that might have resulted from replacing +971569213754 inside href="tel:..."
    $content = str_replace('href="tel:+92 301 2118111"', 'href="tel:+923012118111"', $content);

    if ($content !== $orig) {
        file_put_contents($fullPath, $content);
        echo "Updated: $file\n";
    } else {
        echo "No changes: $file\n";
    }
}
