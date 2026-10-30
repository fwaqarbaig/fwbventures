<?php

$img = imagecreatefrompng('d:/CMS/fwb/public/images/fwb-logo-official.png');
$w = imagesx($img);
$h = imagesy($img);

echo "Dimensions: {$w}x{$h}\n";
echo 'Truecolor: '.(imageistruecolor($img) ? 'YES' : 'NO')."\n";

// Sample background color (e.g. top-right or top-left)
$rgb0 = imagecolorat($img, 0, 0);
$colors0 = imagecolorsforindex($img, $rgb0);
echo "Pixel (0,0): R={$colors0['red']} G={$colors0['green']} B={$colors0['blue']} Alpha={$colors0['alpha']}\n";

$rgbRight = imagecolorat($img, $w - 1, 0);
$colorsRight = imagecolorsforindex($img, $rgbRight);
echo "Pixel ($w-1, 0): R={$colorsRight['red']} G={$colorsRight['green']} B={$colorsRight['blue']} Alpha={$colorsRight['alpha']}\n";

// Count transparent vs opaque pixels
$hasAlpha = false;
for ($x = 0; $x < $w; $x += 10) {
    for ($y = 0; $y < $h; $y += 10) {
        $c = imagecolorsforindex($img, imagecolorat($img, $x, $y));
        if ($c['alpha'] > 0) {
            $hasAlpha = true;
            break 2;
        }
    }
}
echo 'Has transparency: '.($hasAlpha ? 'YES' : 'NO')."\n";
