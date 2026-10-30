<?php

$img = imagecreatefrompng('d:/CMS/fwb/public/images/fwb-logo-official.png');
$w = imagesx($img);
$h = imagesy($img);

$blackCount = 0;
$whiteCount = 0;
$transparentCount = 0;
$otherCount = 0;

for ($x = 0; $x < $w; $x++) {
    for ($y = 0; $y < $h; $y++) {
        $c = imagecolorsforindex($img, imagecolorat($img, $x, $y));
        if ($c['alpha'] == 127) {
            $transparentCount++;
        } elseif ($c['red'] < 50 && $c['green'] < 50 && $c['blue'] < 50) {
            $blackCount++;
        } elseif ($c['red'] > 200 && $c['green'] > 200 && $c['blue'] > 200) {
            $whiteCount++;
        } else {
            $otherCount++;
        }
    }
}

echo 'Total pixels: '.($w * $h)."\n";
echo "Transparent pixels: $transparentCount (".round($transparentCount / ($w * $h) * 100, 1)."%)\n";
echo "Black/Dark pixels: $blackCount (".round($blackCount / ($w * $h) * 100, 1)."%)\n";
echo "White/Light pixels: $whiteCount (".round($whiteCount / ($w * $h) * 100, 1)."%)\n";
echo "Antialiased/Grey pixels: $otherCount (".round($otherCount / ($w * $h) * 100, 1)."%)\n";
