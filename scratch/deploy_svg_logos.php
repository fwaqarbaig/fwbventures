<?php

// 1. Generate public/images/fwb-logo.svg (Light Theme / White Navbar)
$svgLight = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 80" width="330" height="80">
  <defs>
    <linearGradient id="facetCyan" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="100%" stop-color="#0284c7" />
    </linearGradient>
    <linearGradient id="facetBlue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#1d4ed8" />
    </linearGradient>
    <linearGradient id="facetDeep" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#0369a1" />
    </linearGradient>
    <linearGradient id="beamGrad" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#38bdf8" />
    </linearGradient>
    <filter id="softGlow" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="#0284c7" flood-opacity="0.25" />
    </filter>
  </defs>

  <!-- EMBLEM: Floating Hexagonal Solar-Tech Nexus (Zero Black Box!) -->
  <g transform="translate(8, 8)" filter="url(#softGlow)">
    <!-- Top Apex Facet (Solar Wing) -->
    <path d="M 32 4 L 58 19 L 45 26.5 L 32 19 L 19 26.5 L 6 19 Z" fill="url(#facetCyan)" />
    <!-- Left Flank (Structural Beam) -->
    <path d="M 6 22 L 19 29.5 L 19 46.5 L 6 39 Z" fill="url(#facetBlue)" />
    <!-- Right Flank (Security Aperture) -->
    <path d="M 58 22 L 58 39 L 45 46.5 L 45 29.5 Z" fill="url(#facetBlue)" />
    <!-- Bottom Foundation (Energy Storage Base) -->
    <path d="M 6 42 L 19 49.5 L 32 42 L 45 49.5 L 58 42 L 32 60 Z" fill="url(#facetDeep)" />
    <!-- Center Solar Diamond Core -->
    <path d="M 32 23.5 L 41.5 32 L 32 40.5 L 22.5 32 Z" fill="#ffffff" />
    <circle cx="32" cy="32" r="3.2" fill="#0284c7" />
  </g>

  <!-- WORDMARK: Modern Corporate Typography -->
  <g transform="translate(86, 0)">
    <!-- FWB Monogram -->
    <text x="0" y="38" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="34" 
          font-weight="900" 
          letter-spacing="-0.5" 
          fill="#0f172a">FWB</text>
    
    <!-- Energy Dot -->
    <circle cx="82" cy="23" r="3.5" fill="#0ea5e9" />

    <!-- VENTURES Sub-brand -->
    <text x="94" y="34" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="16" 
          font-weight="800" 
          letter-spacing="4.5" 
          fill="#0284c7">VENTURES</text>

    <!-- Sleek Tagline Beam -->
    <rect x="0" y="47" width="234" height="2" rx="1" fill="url(#beamGrad)" />

    <!-- Authentic Brand Tagline & Divisions -->
    <text x="0" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="9.5" 
          font-weight="700" 
          letter-spacing="2.2" 
          fill="#64748b">ONE STOP SOLUTIONS</text>
    
    <text x="145" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="8.5" 
          font-weight="600" 
          letter-spacing="1" 
          fill="#0ea5e9">• SOLAR • SECURITY</text>
  </g>
</svg>
SVG;

// 2. Generate public/images/fwb-logo-white.svg (Dark Theme / Slate Footer)
$svgDark = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 80" width="330" height="80">
  <defs>
    <linearGradient id="facetCyanW" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="100%" stop-color="#0ea5e9" />
    </linearGradient>
    <linearGradient id="facetBlueW" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#2563eb" />
    </linearGradient>
    <linearGradient id="facetDeepW" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#0369a1" />
    </linearGradient>
    <linearGradient id="beamGradW" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="100%" stop-color="#0ea5e9" />
    </linearGradient>
    <filter id="softGlowW" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="2" stdDeviation="4" flood-color="#38bdf8" flood-opacity="0.4" />
    </filter>
  </defs>

  <!-- EMBLEM: Floating Hexagonal Solar-Tech Nexus -->
  <g transform="translate(8, 8)" filter="url(#softGlowW)">
    <!-- Top Apex Facet -->
    <path d="M 32 4 L 58 19 L 45 26.5 L 32 19 L 19 26.5 L 6 19 Z" fill="url(#facetCyanW)" />
    <!-- Left Flank -->
    <path d="M 6 22 L 19 29.5 L 19 46.5 L 6 39 Z" fill="url(#facetBlueW)" />
    <!-- Right Flank -->
    <path d="M 58 22 L 58 39 L 45 46.5 L 45 29.5 Z" fill="url(#facetBlueW)" />
    <!-- Bottom Foundation -->
    <path d="M 6 42 L 19 49.5 L 32 42 L 45 49.5 L 58 42 L 32 60 Z" fill="url(#facetDeepW)" />
    <!-- Center Solar Diamond Core -->
    <path d="M 32 23.5 L 41.5 32 L 32 40.5 L 22.5 32 Z" fill="#0f172a" />
    <circle cx="32" cy="32" r="3.2" fill="#38bdf8" />
  </g>

  <!-- WORDMARK: Dark Background Contrast -->
  <g transform="translate(86, 0)">
    <!-- FWB Monogram (Pure White) -->
    <text x="0" y="38" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="34" 
          font-weight="900" 
          letter-spacing="-0.5" 
          fill="#ffffff">FWB</text>
    
    <!-- Energy Dot -->
    <circle cx="82" cy="23" r="3.5" fill="#38bdf8" />

    <!-- VENTURES Sub-brand (Ice Sky Blue) -->
    <text x="94" y="34" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="16" 
          font-weight="800" 
          letter-spacing="4.5" 
          fill="#38bdf8">VENTURES</text>

    <!-- Sleek Tagline Beam -->
    <rect x="0" y="47" width="234" height="2" rx="1" fill="url(#beamGradW)" />

    <!-- Authentic Brand Tagline & Divisions -->
    <text x="0" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="9.5" 
          font-weight="700" 
          letter-spacing="2.2" 
          fill="#94a3b8">ONE STOP SOLUTIONS</text>
    
    <text x="145" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="8.5" 
          font-weight="600" 
          letter-spacing="1" 
          fill="#38bdf8">• SOLAR • SECURITY</text>
  </g>
</svg>
SVG;

// 3. Generate public/favicon.svg (Square Mark)
$faviconSvg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <defs>
    <linearGradient id="favCyan" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="100%" stop-color="#0284c7" />
    </linearGradient>
    <linearGradient id="favBlue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#1d4ed8" />
    </linearGradient>
    <linearGradient id="favDeep" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#0369a1" />
    </linearGradient>
  </defs>

  <!-- Hexagonal Solar-Tech Nexus Emblem -->
  <!-- Top Apex -->
  <path d="M 32 4 L 58 19 L 45 26.5 L 32 19 L 19 26.5 L 6 19 Z" fill="url(#favCyan)" />
  <!-- Left Flank -->
  <path d="M 6 22 L 19 29.5 L 19 46.5 L 6 39 Z" fill="url(#favBlue)" />
  <!-- Right Flank -->
  <path d="M 58 22 L 58 39 L 45 46.5 L 45 29.5 Z" fill="url(#favBlue)" />
  <!-- Bottom Foundation -->
  <path d="M 6 42 L 19 49.5 L 32 42 L 45 49.5 L 58 42 L 32 60 Z" fill="url(#favDeep)" />
  <!-- Center Core -->
  <path d="M 32 23.5 L 41.5 32 L 32 40.5 L 22.5 32 Z" fill="#ffffff" />
  <circle cx="32" cy="32" r="3.2" fill="#0284c7" />
</svg>
SVG;

file_put_contents(__DIR__.'/../public/images/fwb-logo.svg', $svgLight);
file_put_contents(__DIR__.'/../public/images/fwb-logo-white.svg', $svgDark);
file_put_contents(__DIR__.'/../public/favicon.svg', $faviconSvg);
file_put_contents(__DIR__.'/../public/images/favicon.svg', $faviconSvg);

echo "Successfully wrote SVG logo files.\n";
