<?php

// Let's create 3 distinct world-class concepts for FWB Ventures logo

function getConcept1Svg(bool $dark = false): string
{
    // Concept 1: "The Solar & Engineering Nexus"
    // Modern faceted geometric hexagon with center solar lens aperture
    $textColor = $dark ? '#ffffff' : '#0f172a';
    $subColor = $dark ? '#38bdf8' : '#0284c7';
    $tagColor = $dark ? '#94a3b8' : '#64748b';
    $barGrad1 = $dark ? '#38bdf8' : '#0284c7';
    $barGrad2 = $dark ? '#0ea5e9' : '#38bdf8';
    $accentDot = $dark ? '#38bdf8' : '#0ea5e9';
    $centerFill = $dark ? '#0f172a' : '#ffffff';
    $centerDot = $dark ? '#38bdf8' : '#0284c7';

    return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 80" width="330" height="80">
  <defs>
    <linearGradient id="c1_cyan_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="100%" stop-color="#0284c7" />
    </linearGradient>
    <linearGradient id="c1_blue_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#1d4ed8" />
    </linearGradient>
    <linearGradient id="c1_deep_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#0369a1" />
    </linearGradient>
    <linearGradient id="c1_beam_{$dark}" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="{$barGrad1}" />
      <stop offset="100%" stop-color="{$barGrad2}" />
    </linearGradient>
    <filter id="c1_glow_{$dark}" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="#0284c7" flood-opacity="0.3" />
    </filter>
  </defs>

  <!-- EMBLEM: Geometric Solar-Tech Hexagonal Nexus -->
  <g transform="translate(8, 8)" filter="url(#c1_glow_{$dark})">
    <!-- Top Apex Facet -->
    <path d="M 32 4 L 58 19 L 45 26.5 L 32 19 L 19 26.5 L 6 19 Z" fill="url(#c1_cyan_{$dark})" />
    <!-- Left Flank -->
    <path d="M 6 22 L 19 29.5 L 19 46.5 L 6 39 Z" fill="url(#c1_blue_{$dark})" />
    <!-- Right Flank -->
    <path d="M 58 22 L 58 39 L 45 46.5 L 45 29.5 Z" fill="url(#c1_blue_{$dark})" />
    <!-- Bottom Foundation (Engineered V) -->
    <path d="M 6 42 L 19 49.5 L 32 42 L 45 49.5 L 58 42 L 32 60 Z" fill="url(#c1_deep_{$dark})" />
    <!-- Center Solar Diamond Core -->
    <path d="M 32 23.5 L 41.5 32 L 32 40.5 L 22.5 32 Z" fill="{$centerFill}" />
    <circle cx="32" cy="32" r="3.2" fill="{$centerDot}" />
  </g>

  <!-- WORDMARK -->
  <g transform="translate(86, 0)">
    <text x="0" y="38" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="34" 
          font-weight="900" 
          letter-spacing="-0.5" 
          fill="{$textColor}">FWB</text>
    
    <circle cx="82" cy="23" r="3.5" fill="{$accentDot}" />

    <text x="94" y="34" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="16" 
          font-weight="800" 
          letter-spacing="4.5" 
          fill="{$subColor}">VENTURES</text>

    <!-- Sleek Tagline Accent Bar -->
    <rect x="0" y="47" width="234" height="2" rx="1" fill="url(#c1_beam_{$dark})" />

    <!-- Authentic Brand Tagline -->
    <text x="0" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="9.5" 
          font-weight="700" 
          letter-spacing="2.2" 
          fill="{$tagColor}">ONE STOP SOLUTIONS</text>
    
    <text x="145" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="8.5" 
          font-weight="600" 
          letter-spacing="1" 
          fill="{$accentDot}">• SOLAR • SECURITY</text>
  </g>
</svg>
SVG;
}

function getConcept2Svg(bool $dark = false): string
{
    // Concept 2: "Dynamic Energy Surge & Security Shield"
    // Sleek aerodynamic wings forming an energetic 'F' and 'W' with solar sunburst apex
    $textColor = $dark ? '#ffffff' : '#0f172a';
    $subColor = $dark ? '#38bdf8' : '#0284c7';
    $tagColor = $dark ? '#94a3b8' : '#64748b';
    $barGrad1 = $dark ? '#38bdf8' : '#0284c7';
    $barGrad2 = $dark ? '#0ea5e9' : '#38bdf8';
    $accentDot = $dark ? '#38bdf8' : '#0ea5e9';

    return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 80" width="330" height="80">
  <defs>
    <linearGradient id="c2_gradA_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="50%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#0284c7" />
    </linearGradient>
    <linearGradient id="c2_gradB_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#1d4ed8" />
    </linearGradient>
    <linearGradient id="c2_beam_{$dark}" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="{$barGrad1}" />
      <stop offset="100%" stop-color="{$barGrad2}" />
    </linearGradient>
    <filter id="c2_glow_{$dark}" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="#0ea5e9" flood-opacity="0.35" />
    </filter>
  </defs>

  <!-- EMBLEM: Dynamic Interlocking Aerodynamic Chevron Wings -->
  <g transform="translate(10, 10)" filter="url(#c2_glow_{$dark})">
    <!-- Wing 1: Top dynamic speed wing (F-wing) -->
    <path d="M 6 8 C 6 5.8 7.8 4 10 4 L 46 4 C 50 4 53 7 51.5 11 L 44 26 C 42.8 28.5 40 30 37 30 L 19 30 C 15 30 12 27 13.5 23 L 17 16 L 9 16 C 7.3 16 6 14.7 6 13 Z" fill="url(#c2_gradA_{$dark})" />
    
    <!-- Wing 2: Rising energy surge (W & Battery bars) -->
    <path d="M 16 35 C 16 33.3 17.3 32 19 32 L 41 32 C 44 32 46.5 34 45.5 37 L 38 52 C 37 54 34.5 56 32 56 L 14 56 C 10.5 56 8.5 52.5 10 49 L 14 41 L 7 41 C 5.3 41 4 39.7 4 38 Z" fill="url(#c2_gradB_{$dark})" opacity="0.92" />
    
    <!-- Sunburst / Optical Lens Accent Dot -->
    <circle cx="53" cy="20" r="4.5" fill="#38bdf8" />
    <circle cx="53" cy="20" r="2" fill="#ffffff" />
  </g>

  <!-- WORDMARK -->
  <g transform="translate(86, 0)">
    <text x="0" y="38" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="34" 
          font-weight="900" 
          letter-spacing="-0.5" 
          fill="{$textColor}">FWB</text>
    
    <circle cx="82" cy="23" r="3.5" fill="{$accentDot}" />

    <text x="94" y="34" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="16" 
          font-weight="800" 
          letter-spacing="4.5" 
          fill="{$subColor}">VENTURES</text>

    <rect x="0" y="47" width="234" height="2" rx="1" fill="url(#c2_beam_{$dark})" />

    <text x="0" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="9.5" 
          font-weight="700" 
          letter-spacing="2.2" 
          fill="{$tagColor}">ONE STOP SOLUTIONS</text>
    
    <text x="145" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="8.5" 
          font-weight="600" 
          letter-spacing="1" 
          fill="{$accentDot}">• SOLAR • SECURITY</text>
  </g>
</svg>
SVG;
}

function getConcept3Svg(bool $dark = false): string
{
    // Concept 3: "Precision Monogram Diamond & Clean Energy Loop"
    // Geometric isometric cube / crystalline solar cell forming an abstract F-W-B
    $textColor = $dark ? '#ffffff' : '#0f172a';
    $subColor = $dark ? '#38bdf8' : '#0284c7';
    $tagColor = $dark ? '#94a3b8' : '#64748b';
    $barGrad1 = $dark ? '#38bdf8' : '#0284c7';
    $barGrad2 = $dark ? '#0ea5e9' : '#38bdf8';
    $accentDot = $dark ? '#38bdf8' : '#0ea5e9';

    return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 80" width="330" height="80">
  <defs>
    <linearGradient id="c3_top_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#38bdf8" />
      <stop offset="100%" stop-color="#0ea5e9" />
    </linearGradient>
    <linearGradient id="c3_left_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284c7" />
      <stop offset="100%" stop-color="#0369a1" />
    </linearGradient>
    <linearGradient id="c3_right_{$dark}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0ea5e9" />
      <stop offset="100%" stop-color="#1d4ed8" />
    </linearGradient>
    <linearGradient id="c3_beam_{$dark}" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="{$barGrad1}" />
      <stop offset="100%" stop-color="{$barGrad2}" />
    </linearGradient>
    <filter id="c3_glow_{$dark}" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="#0284c7" flood-opacity="0.3" />
    </filter>
  </defs>

  <!-- EMBLEM: Isometric Energy Cube / Crystalline Solar-Storage Cell -->
  <g transform="translate(12, 10)" filter="url(#c3_glow_{$dark})">
    <!-- Top Rhombus (Solar Panel Array Surface) -->
    <polygon points="30,4 54,18 30,32 6,18" fill="url(#c3_top_{$dark})" />
    <!-- Panel Grid Lines on Top -->
    <line x1="18" y1="25" x2="42" y2="11" stroke="#ffffff" stroke-width="1" stroke-opacity="0.4" />
    <line x1="18" y1="11" x2="42" y2="25" stroke="#ffffff" stroke-width="1" stroke-opacity="0.4" />
    
    <!-- Left Face (Mounting Structure / Battery Module) -->
    <polygon points="6,21 30,35 30,59 6,45" fill="url(#c3_left_{$dark})" />
    <!-- Battery Level LED Indicators -->
    <circle cx="14" cy="33" r="1.5" fill="#38bdf8" />
    <circle cx="14" cy="38" r="1.5" fill="#38bdf8" />
    <circle cx="14" cy="43" r="1.5" fill="#38bdf8" />

    <!-- Right Face (Optical Aperture / CCTV Guard) -->
    <polygon points="30,35 54,21 54,45 30,59" fill="url(#c3_right_{$dark})" />
    <!-- Aperture / Power Pulse Symbol -->
    <path d="M 38 43 L 44 40 L 46 47 L 42 45 Z" fill="#ffffff" opacity="0.6" />
  </g>

  <!-- WORDMARK -->
  <g transform="translate(86, 0)">
    <text x="0" y="38" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="34" 
          font-weight="900" 
          letter-spacing="-0.5" 
          fill="{$textColor}">FWB</text>
    
    <circle cx="82" cy="23" r="3.5" fill="{$accentDot}" />

    <text x="94" y="34" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="16" 
          font-weight="800" 
          letter-spacing="4.5" 
          fill="{$subColor}">VENTURES</text>

    <rect x="0" y="47" width="234" height="2" rx="1" fill="url(#c3_beam_{$dark})" />

    <text x="0" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="9.5" 
          font-weight="700" 
          letter-spacing="2.2" 
          fill="{$tagColor}">ONE STOP SOLUTIONS</text>
    
    <text x="145" y="64" 
          font-family="system-ui, -apple-system, 'Segoe UI', Montserrat, Roboto, sans-serif" 
          font-size="8.5" 
          font-weight="600" 
          letter-spacing="1" 
          fill="{$accentDot}">• SOLAR • SECURITY</text>
  </g>
</svg>
SVG;
}

$c1Light = getConcept1Svg(false);
$c1Dark = getConcept1Svg(true);
$c2Light = getConcept2Svg(false);
$c2Dark = getConcept2Svg(true);
$c3Light = getConcept3Svg(false);
$c3Dark = getConcept3Svg(true);

$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<title>FWB Ventures Logo Concepts</title>
<style>
  body { font-family: sans-serif; background: #e2e8f0; padding: 40px; margin: 0; }
  .grid { display: flex; flex-direction: column; gap: 30px; max-width: 900px; margin: auto; }
  .card { background: white; padding: 25px; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.06); }
  .dark-card { background: #0f172a; padding: 25px; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
  h2 { margin: 0 0 15px 0; font-size: 16px; color: #475569; text-transform: uppercase; letter-spacing: 1px; }
  .preview { display: flex; gap: 20px; align-items: center; }
</style>
</head>
<body>
<div class="grid">
  <div class="card">
    <h2>Concept 1: Hexagonal Energy & Security Nexus (Light Navbar)</h2>
    <div class="preview">
      {$c1Light}
    </div>
  </div>
  <div class="dark-card">
    <h2 style="color: #94a3b8">Concept 1: Hexagonal Energy & Security Nexus (Dark Footer)</h2>
    <div class="preview">
      {$c1Dark}
    </div>
  </div>

  <div class="card">
    <h2>Concept 2: Dynamic Aerodynamic Energy Surge (Light Navbar)</h2>
    <div class="preview">
      {$c2Light}
    </div>
  </div>
  <div class="dark-card">
    <h2 style="color: #94a3b8">Concept 2: Dynamic Aerodynamic Energy Surge (Dark Footer)</h2>
    <div class="preview">
      {$c2Dark}
    </div>
  </div>

  <div class="card">
    <h2>Concept 3: Isometric Power Cube & Solar Array (Light Navbar)</h2>
    <div class="preview">
      {$c3Light}
    </div>
  </div>
  <div class="dark-card">
    <h2 style="color: #94a3b8">Concept 3: Isometric Power Cube & Solar Array (Dark Footer)</h2>
    <div class="preview">
      {$c3Dark}
    </div>
  </div>
</div>
</body>
</html>
HTML;

file_put_contents(__DIR__.'/preview_logos.html', $html);
echo "Generated preview_logos.html\n";
