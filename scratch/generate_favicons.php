<?php

function createFwbIcon(int $size)
{
    $img = imagecreatetruecolor($size, $size);
    imagealphablending($img, false);
    imagesavealpha($img, true);

    $trans = imagecolorallocatealpha($img, 0, 0, 0, 127);
    imagefill($img, 0, 0, $trans);
    imagealphablending($img, true);

    $slateBg = imagecolorallocate($img, 15, 23, 42); // #0f172a
    $amber = imagecolorallocate($img, 245, 158, 11); // #f59e0b
    $orange = imagecolorallocate($img, 234, 88, 12);  // #ea580c
    $emerald = imagecolorallocate($img, 16, 185, 129); // #10b981
    $white = imagecolorallocate($img, 255, 255, 255);

    // Rounded rectangle background
    $radius = max(2, (int) ($size * 0.22));
    imagefilledellipse($img, $radius, $radius, $radius * 2, $radius * 2, $slateBg);
    imagefilledellipse($img, $size - $radius, $radius, $radius * 2, $radius * 2, $slateBg);
    imagefilledellipse($img, $radius, $size - $radius, $radius * 2, $radius * 2, $slateBg);
    imagefilledellipse($img, $size - $radius, $size - $radius, $radius * 2, $radius * 2, $slateBg);
    imagefilledrectangle($img, $radius, 0, $size - $radius, $size, $slateBg);
    imagefilledrectangle($img, 0, $radius, $size, $size - $radius, $slateBg);

    // Hexagon points
    $cx = $size / 2.0;
    $cy = $size / 2.0;
    $r = $size * 0.38;

    $hexPoints = [];
    for ($i = 0; $i < 6; $i++) {
        $angle = deg2rad(60 * $i - 30);
        $hexPoints[] = (int) ($cx + $r * cos($angle));
        $hexPoints[] = (int) ($cy + $r * sin($angle));
    }

    // Draw hexagon outline
    imagesetthickness($img, max(1, (int) ($size * 0.05)));
    for ($i = 0; $i < 6; $i++) {
        $x1 = $hexPoints[$i * 2];
        $y1 = $hexPoints[$i * 2 + 1];
        $x2 = $hexPoints[(($i + 1) % 6) * 2];
        $y2 = $hexPoints[((($i + 1) % 6) * 2) + 1];
        $col = ($i < 3) ? $amber : $emerald;
        imageline($img, $x1, $y1, $x2, $y2, $col);
    }

    // Solar Center Core
    $coreR = (int) ($size * 0.18);
    imagefilledellipse($img, (int) $cx, (int) $cy, $coreR * 2, $coreR * 2, $orange);

    // Cross Rays
    $rayLen = (int) ($size * 0.28);
    $rayInner = (int) ($size * 0.19);
    imagesetthickness($img, max(1, (int) ($size * 0.06)));
    imageline($img, (int) $cx, (int) ($cy - $rayLen), (int) $cx, (int) ($cy - $rayInner), $amber);
    imageline($img, (int) $cx, (int) ($cy + $rayInner), (int) $cx, (int) ($cy + $rayLen), $amber);
    imageline($img, (int) ($cx - $rayLen), (int) $cy, (int) ($cx - $rayInner), (int) $cy, $amber);
    imageline($img, (int) ($cx + $rayInner), (int) $cy, (int) ($cx + $rayLen), (int) $cy, $amber);

    // Diagonal Rays
    $diagLen = (int) ($rayLen * 0.75);
    $diagInner = (int) ($rayInner * 0.75);
    imageline($img, (int) ($cx - $diagLen), (int) ($cy - $diagLen), (int) ($cx - $diagInner), (int) ($cy - $diagInner), $emerald);
    imageline($img, (int) ($cx + $diagInner), (int) ($cy + $diagInner), (int) ($cx + $diagLen), (int) ($cy + $diagLen), $emerald);
    imageline($img, (int) ($cx - $diagLen), (int) ($cy + $diagLen), (int) ($cx - $diagInner), (int) ($cy + $diagInner), $emerald);
    imageline($img, (int) ($cx + $diagInner), (int) ($cy - $diagInner), (int) ($cx + $diagLen), (int) ($cy - $diagLen), $emerald);

    // White Center Core
    $innerWhiteR = max(1, (int) ($size * 0.08));
    imagefilledellipse($img, (int) $cx, (int) $cy, $innerWhiteR * 2, $innerWhiteR * 2, $white);

    return $img;
}

// 1. Generate 180x180 Apple Touch Icon
$img180 = createFwbIcon(180);
imagepng($img180, __DIR__.'/../public/images/apple-touch-icon.png');
imagepng($img180, __DIR__.'/../public/apple-touch-icon.png');

// 2. Generate 64x64 favicon.png
$img64 = createFwbIcon(64);
imagepng($img64, __DIR__.'/../public/favicon.png');

// 3. Generate 32x32
$img32 = createFwbIcon(32);
imagepng($img32, __DIR__.'/../public/images/favicon-32x32.png');

// 4. Generate 16x16
$img16 = createFwbIcon(16);
imagepng($img16, __DIR__.'/../public/images/favicon-16x16.png');

// 5. Generate binary .ico file for public/favicon.ico containing 32x32 and 16x16
// Basic Windows ICO format writer
function writeIco(array $pngFiles, string $icoPath)
{
    $count = count($pngFiles);
    $header = pack('vvv', 0, 1, $count); // Reserved, Type=1 (ICO), Image count
    $entries = '';
    $dataOffset = 6 + ($count * 16);
    $imagesData = '';

    foreach ($pngFiles as $file) {
        $data = file_get_contents($file);
        $size = strlen($data);
        $info = getimagesize($file);
        $w = $info[0] >= 256 ? 0 : $info[0];
        $h = $info[1] >= 256 ? 0 : $info[1];

        // ICONDIRENTRY: Width, Height, Colors, Reserved, Planes, BPP, BytesInRes, ImageOffset
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

echo "Favicons successfully generated!\n";
