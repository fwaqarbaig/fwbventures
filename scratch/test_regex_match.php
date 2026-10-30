<?php

$text = '<p>Surging electricity tariffs across Pakistan, coupled with fuel cost adjustments (FCA), fixed capacity charges, and persistent grid load shedding, have made solar energy not merely an environmentally conscious choice, but an urgent financial imperative. This authoritative technical guide to <strong>How to Prepare Your Roof for Solar Panel Installation in Karachi</strong> delivers actionable engineering methodologies, mathematical load calculations, component comparisons, regulatory net-metering blueprints, and real-world financial models specifically tailored for property owners and facilities in Karachi and Pakistan.</p>';

$kw = 'net-metering';
$pattern = '/\b('.preg_quote($kw, '/').')\b/i';
echo "Testing pattern: $pattern\n";
if (preg_match($pattern, $text, $m)) {
    echo 'Matched: '.$m[1]."\n";
} else {
    echo "No match for $kw\n";
}

$kw2 = 'solar energy';
$pattern2 = '/\b('.preg_quote($kw2, '/').')\b/i';
if (preg_match($pattern2, $text, $m)) {
    echo 'Matched: '.$m[1]."\n";
} else {
    echo "No match for $kw2\n";
}
