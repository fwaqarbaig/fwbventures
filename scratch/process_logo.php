<?php

$src = 'public/images/fwb-logo-official.png';
$im = imagecreatefrompng($src);
$w = imagesx($im);
$h = imagesy($im);

// 1. Save standard official logo
imagepng($im, 'public/images/fwb-logo.png');

// 2. Extract 90x90 square favicon mark (left box)
$fav90 = imagecreatetruecolor(90, 90);
imagealphablending($fav90, false);
imagesavealpha($fav90, true);
imagecopy($fav90, $im, 0, 0, 0, 0, 90, 90);

// Also create a rounded/styled version with light blue accent
$fav180 = imagecreatetruecolor(180, 180);
imagealphablending($fav180, false);
imagesavealpha($fav180, true);
imagecopyresampled($fav180, $fav90, 0, 0, 0, 0, 180, 180, 90, 90);
imagepng($fav180, 'public/apple-touch-icon.png');
imagepng($fav180, 'public/images/apple-touch-icon.png');

$fav32 = imagecreatetruecolor(32, 32);
imagealphablending($fav32, false);
imagesavealpha($fav32, true);
imagecopyresampled($fav32, $fav90, 0, 0, 0, 0, 32, 32, 90, 90);
imagepng($fav32, 'public/images/favicon-32x32.png');

$fav16 = imagecreatetruecolor(16, 16);
imagealphablending($fav16, false);
imagesavealpha($fav16, true);
imagecopyresampled($fav16, $fav90, 0, 0, 0, 0, 16, 16, 90, 90);
imagepng($fav16, 'public/images/favicon-16x16.png');

imagepng($fav90, 'public/favicon.png');

// Create ICO
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
    'public/images/favicon-32x32.png',
    'public/images/favicon-16x16.png',
], 'public/favicon.ico');

// 3. Create White / Light Blue Version for dark backgrounds
$imWhite = imagecreatetruecolor($w, $h);
imagealphablending($imWhite, false);
imagesavealpha($imWhite, true);
$trans = imagecolorallocatealpha($imWhite, 0, 0, 0, 127);
imagefill($imWhite, 0, 0, $trans);

$white = imagecolorallocate($imWhite, 255, 255, 255);
$lightBlue = imagecolorallocate($imWhite, 56, 189, 248); // #38bdf8 light blue
$skyBlue = imagecolorallocate($imWhite, 14, 165, 233);   // #0ea5e9
$darkBoxBg = imagecolorallocate($imWhite, 15, 23, 42);   // #0f172a

for ($x = 0; $x < $w; $x++) {
    for ($y = 0; $y < $h; $y++) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        if ($c['alpha'] == 127) {
            continue;
        }

        // Left box (x <= 90)
        if ($x <= 90) {
            if ($c['red'] > 200 && $c['green'] > 200 && $c['blue'] > 200) {
                // The cursive 'fwb' text - make it crisp white or sky blue
                imagesetpixel($imWhite, $x, $y, $white);
            } else {
                // The box background - on dark theme, give it a sleek dark blue/slate container
                imagesetpixel($imWhite, $x, $y, $darkBoxBg);
            }
        } else {
            // Right side: 'VENTURES' & 'one stop solutions' bar
            if ($y >= 50) {
                // The 'one stop solutions' bar
                if ($c['red'] > 200) {
                    // text inside bar -> white
                    imagesetpixel($imWhite, $x, $y, $white);
                } else {
                    // the bar background -> light blue accent!
                    imagesetpixel($imWhite, $x, $y, $skyBlue);
                }
            } else {
                // The 'VENTURES' letters -> bright white for dark backgrounds
                if ($c['red'] < 100) {
                    imagesetpixel($imWhite, $x, $y, $white);
                } else {
                    imagesetpixel($imWhite, $x, $y, $lightBlue);
                }
            }
        }
    }
}
imagepng($imWhite, 'public/images/fwb-logo-white.png');

echo "Logo and Favicon suite generated successfully!\n";
