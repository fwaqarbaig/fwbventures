<?php

// Generate PNG fallbacks and favicon ICO using PHP GD

function drawEmblem($im, $ox, $oy, $scale = 1.0, bool $dark = false)
{
    // Colors
    $cyan = imagecolorallocate($im, 56, 189, 248);   // #38bdf8
    $sky = imagecolorallocate($im, 14, 165, 233);   // #0ea5e9
    $blue = imagecolorallocate($im, 2, 132, 199);    // #0284c7
    $deep = imagecolorallocate($im, 3, 105, 161);    // #0369a1
    $white = imagecolorallocate($im, 255, 255, 255);
    $darkCore = imagecolorallocate($im, 15, 23, 42);

    $pts = function ($coords) use ($ox, $oy, $scale) {
        $out = [];
        for ($i = 0; $i < count($coords); $i += 2) {
            $out[] = (int) round($ox + $coords[$i] * $scale);
            $out[] = (int) round($oy + $coords[$i + 1] * $scale);
        }

        return $out;
    };

    // Top Apex Facet
    $topPts = $pts([32, 4,  58, 19,  45, 26.5,  32, 19,  19, 26.5,  6, 19]);
    imagefilledpolygon($im, $topPts, $cyan);

    // Left Flank
    $leftPts = $pts([6, 22,  19, 29.5,  19, 46.5,  6, 39]);
    imagefilledpolygon($im, $leftPts, $sky);

    // Right Flank
    $rightPts = $pts([58, 22,  58, 39,  45, 46.5,  45, 29.5]);
    imagefilledpolygon($im, $rightPts, $blue);

    // Bottom Foundation
    $botPts = $pts([6, 42,  19, 49.5,  32, 42,  45, 49.5,  58, 42,  32, 60]);
    imagefilledpolygon($im, $botPts, $deep);

    // Center Core Diamond
    $corePts = $pts([32, 23.5,  41.5, 32,  32, 40.5,  22.5, 32]);
    imagefilledpolygon($im, $corePts, $dark ? $darkCore : $white);

    // Center Dot
    $cx = (int) round($ox + 32 * $scale);
    $cy = (int) round($oy + 32 * $scale);
    $r = max(2, (int) round(3.2 * $scale));
    imagefilledellipse($im, $cx, $cy, $r * 2, $r * 2, $dark ? $cyan : $blue);
}

// 1. Generate Favicon PNGs (64x64, 32x32, 16x16, 180x180)
function makeFavicon(int $size, string $path)
{
    $im = imagecreatetruecolor($size, $size);
    imagealphablending($im, false);
    imagesavealpha($im, true);
    $trans = imagecolorallocatealpha($im, 0, 0, 0, 127);
    imagefill($im, 0, 0, $trans);
    imagealphablending($im, true);

    $scale = $size / 64.0;
    drawEmblem($im, 0, 0, $scale, false);

    imagepng($im, $path);
    imagedestroy($im);
}

makeFavicon(180, __DIR__.'/../public/apple-touch-icon.png');
makeFavicon(180, __DIR__.'/../public/images/apple-touch-icon.png');
makeFavicon(90, __DIR__.'/../public/favicon.png');
makeFavicon(32, __DIR__.'/../public/images/favicon-32x32.png');
makeFavicon(16, __DIR__.'/../public/images/favicon-16x16.png');

// 2. Generate ICO
function writeIco(array $pngFiles, string $icoPath)
{
    $count = count($pngFiles);
    $header = pack('vvv', 0, 1, $count);
    $entries = '';
    $dataOffset = 6 + ($count * 16);
    $imagesData = '';

    foreach ($pngFiles as $file) {
        $data = file_get_contents($file);
        $size = strlen($data);
        $info = getimagesize($file);
        $w = $info[0] >= 256 ? 0 : $info[0];
        $h = $info[1] >= 256 ? 0 : $info[1];

        $entries .= pack('CCCCvvVV', $w, $h, 0, 0, 1, 32, $size, $dataOffset);
        $dataOffset += $size;
        $imagesData .= $data;
    }

    file_put_contents($icoPath, $header.$entries.$imagesData);
}

writeIco([
    __DIR__.'/../public/images/favicon-32x32.png',
    __DIR__.'/../public/images/favicon-16x16.png',
], __DIR__.'/../public/favicon.ico');

// 3. Generate Logo PNGs (330x80)
function makeLogoPng(bool $dark, string $path)
{
    $w = 330;
    $h = 80;
    $im = imagecreatetruecolor($w, $h);
    imagealphablending($im, false);
    imagesavealpha($im, true);
    $trans = imagecolorallocatealpha($im, 0, 0, 0, 127);
    imagefill($im, 0, 0, $trans);
    imagealphablending($im, true);

    drawEmblem($im, 8, 8, 1.0, $dark);

    // Render wordmark using GD built-in or TTF font
    $fontFile = 'C:\\Windows\\Fonts\\segoeuib.ttf';
    if (! file_exists($fontFile)) {
        $fontFile = 'C:\\Windows\\Fonts\\arialbd.ttf';
    }

    $textColor = $dark ? imagecolorallocate($im, 255, 255, 255) : imagecolorallocate($im, 15, 23, 42);
    $skyColor = $dark ? imagecolorallocate($im, 56, 189, 248) : imagecolorallocate($im, 2, 132, 199);
    $tagColor = $dark ? imagecolorallocate($im, 148, 163, 184) : imagecolorallocate($im, 100, 116, 139);
    $cyanDot = imagecolorallocate($im, 14, 165, 233);

    if (file_exists($fontFile) && function_exists('imagettftext')) {
        // "FWB"
        imagettftext($im, 25, 0, 86, 38, $textColor, $fontFile, 'FWB');

        // Dot
        imagefilledellipse($im, 168, 26, 7, 7, $cyanDot);

        // "VENTURES"
        $fontRegular = 'C:\\Windows\\Fonts\\segoeui.ttf';
        if (! file_exists($fontRegular)) {
            $fontRegular = $fontFile;
        }

        $vText = 'V E N T U R E S';
        imagettftext($im, 11, 0, 182, 34, $skyColor, $fontFile, $vText);

        // Divider Beam
        imagefilledrectangle($im, 86, 47, 320, 49, $skyColor);

        // Tagline
        imagettftext($im, 7, 0, 86, 64, $tagColor, $fontFile, 'ONE STOP SOLUTIONS  •  SOLAR  •  SECURITY');
    } else {
        // Fallback to built-in fonts
        imagestring($im, 5, 86, 18, 'FWB VENTURES', $textColor);
        imageline($im, 86, 47, 320, 47, $skyColor);
        imagestring($im, 2, 86, 52, 'ONE STOP SOLUTIONS - SOLAR - SECURITY', $tagColor);
    }

    imagepng($im, $path);
    imagedestroy($im);
}

makeLogoPng(false, __DIR__.'/../public/images/fwb-logo.png');
makeLogoPng(true, __DIR__.'/../public/images/fwb-logo-white.png');

echo "Generated PNG and ICO assets successfully.\n";
