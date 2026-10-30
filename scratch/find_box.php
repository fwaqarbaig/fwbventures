<?php

$im = imagecreatefrompng('public/images/fwb-logo-official.png');
$w = imagesx($im);
$h = imagesy($im);

// Let's find where the left box ends
$boxRight = 0;
for ($x = 0; $x < $w; $x++) {
    $c = imagecolorsforindex($im, imagecolorat($im, $x, (int) ($h / 2)));
    if ($c['alpha'] == 0 && $c['red'] < 60) {
        $boxRight = $x;
    } elseif ($boxRight > 0 && $c['alpha'] == 127) {
        break;
    }
}
echo "Left Box extends from x=0 to x=$boxRight (Height: $h)\n";
