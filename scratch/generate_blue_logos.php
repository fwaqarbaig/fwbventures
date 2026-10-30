<?php

function recolorLogo(string $srcPath, string $dstPath, int $targetR, int $targetG, int $targetB): void
{
    $src = imagecreatefrompng($srcPath);
    $w = imagesx($src);
    $h = imagesy($src);

    $dst = imagecreatetruecolor($w, $h);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);

    $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
    imagefilledrectangle($dst, 0, 0, $w, $h, $transparent);

    for ($x = 0; $x < $w; $x++) {
        for ($y = 0; $y < $h; $y++) {
            $rgba = imagecolorat($src, $x, $y);
            $colors = imagecolorsforindex($src, $rgba);

            $a = $colors['alpha'];
            if ($a == 127) {
                // Fully transparent
                continue;
            }

            $r = $colors['red'];
            $g = $colors['green'];
            $b = $colors['blue'];

            // Calculate perceived brightness / grayscale (0 to 1)
            $lum = ($r * 0.299 + $g * 0.587 + $b * 0.114) / 255.0;

            if ($lum > 0.85) {
                // Crisp white text ("fwb" and "one stop solutions")
                // Keep it white
                $color = imagecolorallocatealpha($dst, 255, 255, 255, $a);
            } else {
                // Dark/black element -> interpolate towards target blue based on luminance and alpha
                // For pure black (lum = 0): $newR = $targetR, $newG = $targetG, $newB = $targetB
                // For anti-aliased edge (lum between 0 and 0.85): blend between target blue and white
                $blendFactor = $lum / 0.85;
                $newR = (int) round($targetR + (255 - $targetR) * $blendFactor);
                $newG = (int) round($targetG + (255 - $targetG) * $blendFactor);
                $newB = (int) round($targetB + (255 - $targetB) * $blendFactor);

                $newR = max(0, min(255, $newR));
                $newG = max(0, min(255, $newG));
                $newB = max(0, min(255, $newB));

                $color = imagecolorallocatealpha($dst, $newR, $newG, $newB, $a);
            }

            imagesetpixel($dst, $x, $y, $color);
        }
    }

    imagepng($dst, $dstPath, 9);
    imagedestroy($src);
    imagedestroy($dst);
    echo "Saved recolored logo to: {$dstPath}\n";
}

$source = 'd:/CMS/fwb/public/images/fwb-logo-official.png';

// 1. Sky-600 / Corporate Blue (#0284c7: R=2, G=132, B=199)
recolorLogo($source, 'd:/CMS/fwb/public/images/fwb-logo-blue.png', 2, 132, 199);

// 2. Sky-700 / Rich Clean Energy Blue (#0369a1: R=3, G=105, B=161)
recolorLogo($source, 'd:/CMS/fwb/public/images/fwb-logo-sky700.png', 3, 105, 161);

// 3. Vibrant Electric Corporate Blue (#0066cc: R=0, G=102, B=204)
recolorLogo($source, 'd:/CMS/fwb/public/images/fwb-logo-electric.png', 0, 102, 204);
