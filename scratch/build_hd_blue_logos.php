<?php

// High-res supersampled upscale and recolor of original logo
$src = imagecreatefrompng('d:/CMS/fwb/public/images/fwb-logo-official.png');
$w = imagesx($src);
$h = imagesy($src);

// 3x Super-resolution dimensions (969 x 270)
$scale = 3;
$targetW = $w * $scale;
$targetH = $h * $scale;

$dst = imagecreatetruecolor($targetW, $targetH);
imagealphablending($dst, false);
imagesavealpha($dst, true);

$transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
imagefilledrectangle($dst, 0, 0, $targetW, $targetH, $transparent);

// Use bicubic interpolation for smooth scaling
imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetW, $targetH, $w, $h);

// Now apply crisp recoloring on the 3x supersampled image
$final = imagecreatetruecolor($targetW, $targetH);
imagealphablending($final, false);
imagesavealpha($final, true);
imagefilledrectangle($final, 0, 0, $targetW, $targetH, $transparent);

// Primary Brand Blue: #0284c7 (Sky-600) / #0369a1 (Sky-700)
$targetR = 2;
$targetG = 132;
$targetB = 199;

// White version target for dark footer
$whiteDst = imagecreatetruecolor($targetW, $targetH);
imagealphablending($whiteDst, false);
imagesavealpha($whiteDst, true);
imagefilledrectangle($whiteDst, 0, 0, $targetW, $targetH, $transparent);

for ($x = 0; $x < $targetW; $x++) {
    for ($y = 0; $y < $targetH; $y++) {
        $rgba = imagecolorat($dst, $x, $y);
        $colors = imagecolorsforindex($dst, $rgba);
        $a = $colors['alpha'];

        if ($a == 127) {
            continue;
        }

        $r = $colors['red'];
        $g = $colors['green'];
        $b = $colors['blue'];
        $lum = ($r * 0.299 + $g * 0.587 + $b * 0.114) / 255.0;

        // 1. Blue version (for light backgrounds)
        if ($lum > 0.80) {
            // Crisp White
            $blueColor = imagecolorallocatealpha($final, 255, 255, 255, $a);
        } else {
            $factor = $lum / 0.80;
            $newR = (int) round($targetR + (255 - $targetR) * $factor);
            $newG = (int) round($targetG + (255 - $targetG) * $factor);
            $newB = (int) round($targetB + (255 - $targetB) * $factor);
            $blueColor = imagecolorallocatealpha($final, $newR, $newG, $newB, $a);
        }
        imagesetpixel($final, $x, $y, $blueColor);

        // 2. White & Sky version (for dark backgrounds / footer)
        // Box is sky blue (#0284c7), fwb is white, VENTURES is pure white (#ffffff), ribbon is sky blue
        if ($lum > 0.80) {
            $whiteColor = imagecolorallocatealpha($whiteDst, 255, 255, 255, $a);
        } else {
            // For dark background, render crisp pure white (#ffffff) or sky blue
            $factor = $lum / 0.80;
            $wR = (int) round(56 + (255 - 56) * $factor);   // #38bdf8 sky-400
            $wG = (int) round(189 + (255 - 189) * $factor);
            $wB = (int) round(248 + (255 - 248) * $factor);
            $whiteColor = imagecolorallocatealpha($whiteDst, $wR, $wG, $wB, $a);
        }
        imagesetpixel($whiteDst, $x, $y, $whiteColor);
    }
}

imagepng($final, 'd:/CMS/fwb/public/images/fwb-logo.png', 9);
imagepng($whiteDst, 'd:/CMS/fwb/public/images/fwb-logo-white.png', 9);

echo "Generated public/images/fwb-logo.png ({$targetW}x{$targetH})\n";
echo "Generated public/images/fwb-logo-white.png ({$targetW}x{$targetH})\n";

// Generate SVG files embedding the crisp PNG data URI
$pngData = base64_encode(file_get_contents('d:/CMS/fwb/public/images/fwb-logo.png'));
$svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 323 90" width="323" height="90">
    <image href="data:image/png;base64,{$pngData}" x="0" y="0" width="323" height="90" preserveAspectRatio="xMidYMid meet" />
</svg>
SVG;
file_put_contents('d:/CMS/fwb/public/images/fwb-logo.svg', $svg);

$whitePngData = base64_encode(file_get_contents('d:/CMS/fwb/public/images/fwb-logo-white.png'));
$whiteSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 323 90" width="323" height="90">
    <image href="data:image/png;base64,{$whitePngData}" x="0" y="0" width="323" height="90" preserveAspectRatio="xMidYMid meet" />
</svg>
SVG;
file_put_contents('d:/CMS/fwb/public/images/fwb-logo-white.svg', $whiteSvg);

echo "Generated public/images/fwb-logo.svg and fwb-logo-white.svg\n";
