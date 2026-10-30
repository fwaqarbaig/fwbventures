<?php

// 1. Primary Website Logo (Light Backgrounds, Header)
$logoSvg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 78" width="350" height="78" fill="none">
    <defs>
        <!-- Radiant Solar Orange Gradient -->
        <linearGradient id="solarOrangeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#FF5400" />
            <stop offset="45%" stop-color="#FF7A00" />
            <stop offset="100%" stop-color="#FFB300" />
        </linearGradient>

        <!-- Electric Sky Light Blue Gradient -->
        <linearGradient id="skyBlueGrad" x1="0%" y1="100%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#0284C7" />
            <stop offset="50%" stop-color="#0EA5E9" />
            <stop offset="100%" stop-color="#38BDF8" />
        </linearGradient>

        <!-- Dynamic Brand Divider Gradient -->
        <linearGradient id="brandDivider" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#FF7A00" />
            <stop offset="35%" stop-color="#FFB300" />
            <stop offset="65%" stop-color="#38BDF8" />
            <stop offset="100%" stop-color="#0284C7" />
        </linearGradient>

        <!-- Subtle Spark Glow -->
        <filter id="sparkGlow" x="-30%" y="-30%" width="160%" height="160%">
            <feGaussianBlur stdDeviation="1.2" result="blur" />
            <feComposite in="SourceGraphic" in2="blur" operator="over" />
        </filter>
    </defs>

    <!-- ================= BRAND ICON / EMBLEM ================= -->
    <g transform="translate(6, 5)">
        <!-- Outer Tech Ring -->
        <circle cx="34" cy="34" r="32" fill="#F8FAFC" stroke="#E2E8F0" stroke-width="1.2" />
        <circle cx="34" cy="34" r="28.5" fill="none" stroke="#0EA5E9" stroke-width="0.9" stroke-dasharray="3.5 2.5" opacity="0.45" />

        <!-- Solar Energy Arc (Top/Left Wing) -->
        <path d="M 14,33 C 14,19 23,10 36,9 C 48,8 57,15 60,26 C 60.5,28 58.5,29.5 56.5,28.5 C 50,25 43,24 36,26 C 26,29 19,37 17.5,47 C 17,50 14,49.5 14,47 C 14,42 14,37 14,33 Z" 
              fill="url(#solarOrangeGrad)" />
        
        <!-- Solar PV Cell Cuts -->
        <line x1="26" y1="15" x2="30" y2="24" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.95" />
        <line x1="35" y1="13" x2="38" y2="22" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.95" />
        <line x1="44" y1="15" x2="46" y2="23" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.95" />

        <!-- Electric Sky Light Blue Arc (Bottom/Right Wing - CCTV Security & Structure) -->
        <path d="M 54,35 C 54,49 45,58 32,59 C 20,60 11,53 8,42 C 7.5,40 9.5,38.5 11.5,39.5 C 18,43 25,44 32,42 C 42,39 49,31 50.5,21 C 51,18 54,18.5 54,21 C 54,26 54,31 54,35 Z" 
              fill="url(#skyBlueGrad)" />

        <!-- CCTV Surveillance Eye & Lens Dots -->
        <circle cx="28" cy="48" r="3" fill="#FFFFFF" />
        <circle cx="28" cy="48" r="1.5" fill="#0284C7" />
        <circle cx="39" cy="46" r="2.2" fill="#FFFFFF" opacity="0.85" />
        <circle cx="19" cy="44" r="1.8" fill="#FFFFFF" opacity="0.85" />

        <!-- Central 4-Point Solar/Tech Spark -->
        <path d="M 34,26 Q 34,34 26,34 Q 34,34 34,42 Q 34,34 42,34 Q 34,34 34,26 Z" 
              fill="#FFFFFF" 
              filter="url(#sparkGlow)" />
        <circle cx="34" cy="34" r="2.2" fill="url(#solarOrangeGrad)" />
    </g>

    <!-- ================= TYPOGRAPHY & LOGOTYPE ================= -->
    <g transform="translate(86, 6)">
        <!-- "FWB" Geometric Vector Letterforms -->
        <!-- F -->
        <path d="M 0,11 L 20,11 L 20,17.5 L 7,17.5 L 7,23.5 L 17,23.5 L 17,29.5 L 7,29.5 L 7,40 L 0,40 Z" fill="#0F172A" />
        <!-- W with Orange Central Apex Accent -->
        <path d="M 23,11 L 30,40 L 35.5,40 L 40.5,21 L 45.5,40 L 51,40 L 58,11 L 50.5,11 L 47,30 L 42.5,11 L 38.5,11 L 34,30 L 30.5,11 Z" fill="#0F172A" />
        <polygon points="40.5,11 43.5,22 37.5,22" fill="url(#solarOrangeGrad)" />
        <!-- B -->
        <path d="M 62,11 L 79,11 C 84.5,11 88,13.5 88,18 C 88,21.5 85.5,23.5 82.5,24.5 C 86.5,25.5 89.5,28 89.5,32.5 C 89.5,37.5 85.5,40 79.5,40 L 62,40 Z M 69,17 L 77.5,17 C 80.5,17 82,18 82,20.5 C 82,23 80.5,24 77.5,24 L 69,24 Z M 69,27.5 L 78.5,27.5 C 81.5,27.5 83,29 83,31.5 C 83,34 81.5,35 78.5,35 L 69,35 Z" fill="#0F172A" />

        <!-- Dynamic Solar Dot over Brand -->
        <circle cx="94" cy="14" r="3.5" fill="url(#solarOrangeGrad)" />
        <circle cx="94" cy="14" r="1.5" fill="#FFFFFF" />

        <!-- "VENTURES" Precision Subtitle in Electric Sky Blue -->
        <text x="1" y="52" 
              fill="#0284C7" 
              font-family="'Plus Jakarta Sans', 'Red Hat Display', 'Segoe UI', -apple-system, sans-serif" 
              font-weight="800" 
              font-size="11.5" 
              letter-spacing="0.32em">VENTURES</text>

        <!-- Duo-Color Brand Divider Line -->
        <rect x="1" y="57" width="240" height="2" rx="1" fill="url(#brandDivider)" />

        <!-- 4 Engineering Pillars Tagline -->
        <text x="1" y="66" 
              fill="#64748B" 
              font-family="'Plus Jakarta Sans', 'Red Hat Display', 'Segoe UI', -apple-system, sans-serif" 
              font-weight="700" 
              font-size="6.8" 
              letter-spacing="0.14em">SOLAR • STRUCTURES • CCTV • LITHIUM</text>
    </g>
</svg>
SVG;

// 2. White / Footer Logo (Dark Backgrounds)
$logoWhiteSvg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 78" width="350" height="78" fill="none">
    <defs>
        <!-- Radiant Solar Orange Gradient -->
        <linearGradient id="solarOrangeGradWhite" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#FF6B00" />
            <stop offset="45%" stop-color="#FF8C00" />
            <stop offset="100%" stop-color="#FFB703" />
        </linearGradient>

        <!-- Electric Sky Light Blue Gradient -->
        <linearGradient id="skyBlueGradWhite" x1="0%" y1="100%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#0EA5E9" />
            <stop offset="50%" stop-color="#38BDF8" />
            <stop offset="100%" stop-color="#7DD3FC" />
        </linearGradient>

        <!-- Dynamic Brand Divider Gradient -->
        <linearGradient id="brandDividerWhite" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#FF8C00" />
            <stop offset="35%" stop-color="#FFB703" />
            <stop offset="65%" stop-color="#38BDF8" />
            <stop offset="100%" stop-color="#7DD3FC" />
        </linearGradient>

        <filter id="sparkGlowWhite" x="-30%" y="-30%" width="160%" height="160%">
            <feGaussianBlur stdDeviation="1.5" result="blur" />
            <feComposite in="SourceGraphic" in2="blur" operator="over" />
        </filter>
    </defs>

    <!-- ================= BRAND ICON / EMBLEM ================= -->
    <g transform="translate(6, 5)">
        <!-- Outer Tech Ring (Dark Mode) -->
        <circle cx="34" cy="34" r="32" fill="#0F172A" stroke="#334155" stroke-width="1.2" />
        <circle cx="34" cy="34" r="28.5" fill="none" stroke="#38BDF8" stroke-width="0.9" stroke-dasharray="3.5 2.5" opacity="0.6" />

        <!-- Solar Energy Arc -->
        <path d="M 14,33 C 14,19 23,10 36,9 C 48,8 57,15 60,26 C 60.5,28 58.5,29.5 56.5,28.5 C 50,25 43,24 36,26 C 26,29 19,37 17.5,47 C 17,50 14,49.5 14,47 C 14,42 14,37 14,33 Z" 
              fill="url(#solarOrangeGradWhite)" />
        
        <!-- Solar PV Cell Cuts -->
        <line x1="26" y1="15" x2="30" y2="24" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.95" />
        <line x1="35" y1="13" x2="38" y2="22" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.95" />
        <line x1="44" y1="15" x2="46" y2="23" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.95" />

        <!-- Electric Sky Light Blue Arc -->
        <path d="M 54,35 C 54,49 45,58 32,59 C 20,60 11,53 8,42 C 7.5,40 9.5,38.5 11.5,39.5 C 18,43 25,44 32,42 C 42,39 49,31 50.5,21 C 51,18 54,18.5 54,21 C 54,26 54,31 54,35 Z" 
              fill="url(#skyBlueGradWhite)" />

        <!-- CCTV Lens Dots -->
        <circle cx="28" cy="48" r="3" fill="#FFFFFF" />
        <circle cx="28" cy="48" r="1.5" fill="#0284C7" />
        <circle cx="39" cy="46" r="2.2" fill="#FFFFFF" opacity="0.9" />
        <circle cx="19" cy="44" r="1.8" fill="#FFFFFF" opacity="0.9" />

        <!-- Central Spark -->
        <path d="M 34,26 Q 34,34 26,34 Q 34,34 34,42 Q 34,34 42,34 Q 34,34 34,26 Z" 
              fill="#FFFFFF" 
              filter="url(#sparkGlowWhite)" />
        <circle cx="34" cy="34" r="2.2" fill="url(#solarOrangeGradWhite)" />
    </g>

    <!-- ================= TYPOGRAPHY & LOGOTYPE ================= -->
    <g transform="translate(86, 6)">
        <!-- "FWB" Vector Letterforms (Pure White) -->
        <!-- F -->
        <path d="M 0,11 L 20,11 L 20,17.5 L 7,17.5 L 7,23.5 L 17,23.5 L 17,29.5 L 7,29.5 L 7,40 L 0,40 Z" fill="#FFFFFF" />
        <!-- W with Radiant Solar Accent -->
        <path d="M 23,11 L 30,40 L 35.5,40 L 40.5,21 L 45.5,40 L 51,40 L 58,11 L 50.5,11 L 47,30 L 42.5,11 L 38.5,11 L 34,30 L 30.5,11 Z" fill="#FFFFFF" />
        <polygon points="40.5,11 43.5,22 37.5,22" fill="url(#solarOrangeGradWhite)" />
        <!-- B -->
        <path d="M 62,11 L 79,11 C 84.5,11 88,13.5 88,18 C 88,21.5 85.5,23.5 82.5,24.5 C 86.5,25.5 89.5,28 89.5,32.5 C 89.5,37.5 85.5,40 79.5,40 L 62,40 Z M 69,17 L 77.5,17 C 80.5,17 82,18 82,20.5 C 82,23 80.5,24 77.5,24 L 69,24 Z M 69,27.5 L 78.5,27.5 C 81.5,27.5 83,29 83,31.5 C 83,34 81.5,35 78.5,35 L 69,35 Z" fill="#FFFFFF" />

        <!-- Dynamic Solar Dot over Brand -->
        <circle cx="94" cy="14" r="3.5" fill="url(#solarOrangeGradWhite)" />
        <circle cx="94" cy="14" r="1.5" fill="#FFFFFF" />

        <!-- "VENTURES" Subtitle in Luminous Light Blue -->
        <text x="1" y="52" 
              fill="#38BDF8" 
              font-family="'Plus Jakarta Sans', 'Red Hat Display', 'Segoe UI', -apple-system, sans-serif" 
              font-weight="800" 
              font-size="11.5" 
              letter-spacing="0.32em">VENTURES</text>

        <!-- Duo-Color Brand Divider Line -->
        <rect x="1" y="57" width="240" height="2" rx="1" fill="url(#brandDividerWhite)" />

        <!-- 4 Pillars Tagline in Silver Ice -->
        <text x="1" y="66" 
              fill="#94A3B8" 
              font-family="'Plus Jakarta Sans', 'Red Hat Display', 'Segoe UI', -apple-system, sans-serif" 
              font-weight="700" 
              font-size="6.8" 
              letter-spacing="0.14em">SOLAR • STRUCTURES • CCTV • LITHIUM</text>
    </g>
</svg>
SVG;

// 3. Browser Favicon (64x64 Square Icon for Browser Tabs)
$faviconSvg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64" fill="none">
    <defs>
        <linearGradient id="favSolarGrad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#FF5400" />
            <stop offset="50%" stop-color="#FF7A00" />
            <stop offset="100%" stop-color="#FFB703" />
        </linearGradient>
        <linearGradient id="favSkyGrad" x1="0%" y1="100%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#0284C7" />
            <stop offset="50%" stop-color="#0EA5E9" />
            <stop offset="100%" stop-color="#38BDF8" />
        </linearGradient>
        <filter id="favGlow" x="-20%" y="-20%" width="140%" height="140%">
            <feGaussianBlur stdDeviation="1" result="blur" />
            <feComposite in="SourceGraphic" in2="blur" operator="over" />
        </filter>
    </defs>

    <!-- Rounded Squircle Dark Navy Base -->
    <rect width="64" height="64" rx="15" fill="#0B132B" />
    <rect x="1" y="1" width="62" height="62" rx="14" fill="none" stroke="#1E293B" stroke-width="1.2" />

    <!-- Outer Tech Dashed Arc -->
    <circle cx="32" cy="32" r="26" fill="none" stroke="#38BDF8" stroke-width="0.8" stroke-dasharray="3 2" opacity="0.5" />

    <!-- Solar Orange Arc -->
    <path d="M 13,31 C 13,18 22,9 34,8 C 45,7 54,14 57,24 C 57.5,26 55.5,27.5 53.5,26.5 C 47,23 40,22 34,24 C 24,27 18,35 16.5,44 C 16,47 13,46.5 13,44 C 13,39 13,35 13,31 Z" 
          fill="url(#favSolarGrad)" />
    
    <!-- PV Cuts -->
    <line x1="24" y1="13" x2="28" y2="22" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.9" />
    <line x1="33" y1="11" x2="36" y2="20" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.9" />
    <line x1="42" y1="13" x2="44" y2="21" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" opacity="0.9" />

    <!-- Sky Light Blue Arc -->
    <path d="M 51,33 C 51,46 42,55 30,56 C 19,57 10,50 7,40 C 6.5,38 8.5,36.5 10.5,37.5 C 17,41 24,42 30,40 C 40,37 46,29 47.5,20 C 48,17 51,17.5 51,20 C 51,24 51,29 51,33 Z" 
          fill="url(#favSkyGrad)" />

    <!-- CCTV Camera Lens Dots -->
    <circle cx="27" cy="46" r="2.8" fill="#FFFFFF" />
    <circle cx="27" cy="46" r="1.3" fill="#0284C7" />
    <circle cx="37" cy="44" r="2" fill="#FFFFFF" opacity="0.9" />
    <circle cx="18" cy="42" r="1.6" fill="#FFFFFF" opacity="0.9" />

    <!-- Central 4-Point Solar Spark -->
    <path d="M 32,24 Q 32,32 24,32 Q 32,32 32,40 Q 32,32 40,32 Q 32,32 32,24 Z" 
          fill="#FFFFFF" 
          filter="url(#favGlow)" />
    <circle cx="32" cy="32" r="2.2" fill="url(#favSolarGrad)" />
</svg>
SVG;

// Write all target logo files
file_put_contents(__DIR__.'/../public/images/fwb-logo.svg', $logoSvg);
file_put_contents(__DIR__.'/../public/images/fwb-logo-white.svg', $logoWhiteSvg);
file_put_contents(__DIR__.'/../public/favicon.svg', $faviconSvg);

// Also mirror to storage/app/public/uploads/branding/
$storageBranding = __DIR__.'/../storage/app/public/uploads/branding';
if (! is_dir($storageBranding)) {
    mkdir($storageBranding, 0755, true);
}
$publicStorageBranding = __DIR__.'/../public/storage/uploads/branding';
if (! is_dir($publicStorageBranding)) {
    mkdir($publicStorageBranding, 0755, true);
}

file_put_contents($storageBranding.'/fwb-logo.svg', $logoSvg);
file_put_contents($publicStorageBranding.'/fwb-logo.svg', $logoSvg);
file_put_contents($storageBranding.'/fwb-logo-white.svg', $logoWhiteSvg);
file_put_contents($publicStorageBranding.'/fwb-logo-white.svg', $logoWhiteSvg);
file_put_contents($storageBranding.'/favicon.svg', $faviconSvg);
file_put_contents($publicStorageBranding.'/favicon.svg', $faviconSvg);

echo "Brand logos successfully created and synced!\n";
