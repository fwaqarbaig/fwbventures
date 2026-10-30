<?php

$pngData = base64_encode(file_get_contents('public/images/fwb-logo.png'));
$whitePngData = base64_encode(file_get_contents('public/images/fwb-logo-white.png'));
$favData = base64_encode(file_get_contents('public/images/favicon-32x32.png'));
$favLargeData = base64_encode(file_get_contents('public/apple-touch-icon.png'));

// 1. Light theme logo SVG (for navbar)
$svgLight = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 323 90" width="323" height="90">
  <image href="data:image/png;base64,{$pngData}" width="323" height="90" />
</svg>
SVG;
file_put_contents('public/images/fwb-logo.svg', $svgLight);

// 2. Dark theme logo SVG (for footer)
$svgWhite = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 323 90" width="323" height="90">
  <image href="data:image/png;base64,{$whitePngData}" width="323" height="90" />
</svg>
SVG;
file_put_contents('public/images/fwb-logo-white.svg', $svgWhite);

// 3. Favicon SVG
$svgFav = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90" width="90" height="90">
  <clipPath id="favClip">
    <rect width="90" height="90" rx="18" />
  </clipPath>
  <g clip-path="url(#favClip)">
    <image href="data:image/png;base64,{$favLargeData}" width="90" height="90" />
  </g>
</svg>
SVG;
file_put_contents('public/favicon.svg', $svgFav);
file_put_contents('public/images/favicon.svg', $svgFav);

echo "SVGs created successfully!\n";
