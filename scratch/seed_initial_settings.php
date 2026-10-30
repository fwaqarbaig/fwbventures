<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;
use Illuminate\Contracts\Console\Kernel;

Setting::set('site_logo', '/images/fwb-logo.svg', 'branding');
Setting::set('site_logo_white', '/images/fwb-logo-white.svg', 'branding');
Setting::set('site_favicon', '/favicon.svg', 'branding');
Setting::set('logo_height_desktop', '44', 'branding');
Setting::set('logo_height_mobile', '36', 'branding');
Setting::set('logo_height_footer', '40', 'branding');
Setting::set('site_title', 'FWB Ventures', 'branding');

echo "Settings seeded successfully!\n";
foreach (Setting::allCached() as $k => $v) {
    echo "  $k => $v\n";
}
