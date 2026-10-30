<?php

$im = imagecreatefrompng('public/images/fwb-logo-official.png');
$rgb = imagecolorat($im, 0, 0);
$colors = imagecolorsforindex($im, $rgb);
echo "Pixel (0,0): R={$colors['red']}, G={$colors['green']}, B={$colors['blue']}, Alpha={$colors['alpha']}\n";

$rgbBox = imagecolorat($im, 10, 10);
$colorsBox = imagecolorsforindex($im, $rgbBox);
echo "Pixel (10,10): R={$colorsBox['red']}, G={$colorsBox['green']}, B={$colorsBox['blue']}, Alpha={$colorsBox['alpha']}\n";
