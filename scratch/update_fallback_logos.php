<?php

$src = 'd:/CMS/fwb/public/images/fwb-logo.png';
copy($src, 'd:/CMS/fwb/public/images/logo.png');
echo "Updated public/images/logo.png with new blue logo\n";

// Generate 177x27 version
$img = imagecreatefrompng($src);
$w = imagesx($img);
$h = imagesy($img);

$tW = 177;
$tH = (int) round($h * (177 / $w));

$dst = imagecreatetruecolor($tW, $tH);
imagealphablending($dst, false);
imagesavealpha($dst, true);
$trans = imagecolorallocatealpha($dst, 0, 0, 0, 127);
imagefilledrectangle($dst, 0, 0, $tW, $tH, $trans);

imagecopyresampled($dst, $img, 0, 0, 0, 0, $tW, $tH, $w, $h);
imagepng($dst, 'd:/CMS/fwb/public/images/logo-177x27.png', 9);
echo "Updated public/images/logo-177x27.png ({$tW}x{$tH})\n";
