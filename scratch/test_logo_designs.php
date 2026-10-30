<?php

// Let's create high-end SVG logo designs and inspect them

function createLogoSvgLight(string $type = 'hex'): string
{
    // ViewBox 0 0 320 80
    // Emblem at x=10..74 (width 64, height 64, y=8..72)
    // Wordmark at x=88..310

    return <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 80" width="320" height="80">
  <defs>
    <!-- Gradients for Emblem -->
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
      <stop offset="100%" stop-color="#0f172a" />
    </linearGradient>
    <linearGradient id="accentBeam" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#38bdf8" />
    </linearGradient>
    <linearGradient id="badgeGrad" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#0ea5e9" />
    </linearGradient>
    
    <!-- Subtle drop shadow for depth -->
    <filter id="softGlow" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="3" stdDeviation="4" flood-color="#0284c7" flood-opacity="0.25" />
    </filter>
  </defs>

  <!-- ICON / EMBLEM (No black box! Pure floating vector) -->
  <g transform="translate(10, 8)" filter="url(#softGlow)">
    <!-- Outer Hexagonal / Dynamic Shield Frame -->
    <!-- Top-left facet (Wing F) -->
    <path d="M 32 4 L 58 19 L 45 27 L 32 19 L 19 27 L 6 19 Z" fill="url(#facetCyan)" />
    
    <!-- Left vertical facet -->
    <path d="M 6 22 L 19 30 L 19 46 L 6 38 Z" fill="url(#facetBlue)" />
    
    <!-- Right vertical facet -->
    <path d="M 58 22 L 58 38 L 45 46 L 45 30 Z" fill="url(#facetBlue)" />
    
    <!-- Bottom V facet (Foundation / W) -->
    <path d="M 6 41 L 19 49 L 32 41 L 45 49 L 58 41 L 32 60 Z" fill="url(#facetDeep)" />
    
    <!-- Center Core: Solar Diamond / Aperture Nexus -->
    <path d="M 32 23 L 42 32 L 32 41 L 22 32 Z" fill="#ffffff" opacity="0.95" />
    <circle cx="32" cy="32" r="3.5" fill="#0284c7" />
  </g>

  <!-- WORDMARK (Light Navbar Version) -->
  <g transform="translate(86, 0)">
    <!-- "FWB" Bold Modern Monogram -->
    <text x="0" y="38" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="33" 
          font-weight="900" 
          letter-spacing="-0.5" 
          fill="#0f172a">FWB</text>
    
    <!-- Cyan Energy Dot Accent -->
    <circle cx="82" cy="24" r="3.5" fill="#0ea5e9" />

    <!-- "VENTURES" Tracked Sub-header -->
    <text x="92" y="34" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="16" 
          font-weight="800" 
          letter-spacing="4.5" 
          fill="#0284c7">VENTURES</text>

    <!-- Sleek Tagline Divider Bar -->
    <rect x="0" y="47" width="224" height="2" rx="1" fill="url(#accentBeam)" opacity="0.85" />

    <!-- Tagline: "ONE STOP SOLUTIONS" with Division Icons/Dots -->
    <text x="0" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="9.5" 
          font-weight="700" 
          letter-spacing="2.2" 
          fill="#475569">ONE STOP SOLUTIONS</text>
    
    <text x="145" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="8.5" 
          font-weight="600" 
          letter-spacing="1.2" 
          fill="#0ea5e9">• SOLAR • SECURITY</text>
  </g>
</svg>
SVG;
}

echo "Created SVG generator\n";
