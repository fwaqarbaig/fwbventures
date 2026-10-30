<?php

$files = glob(__DIR__.'/solar_builders_*.php');

$replacements = [
    '($V_{oc}$ at Karachi winter minimum temperatures)' => '(V_oc open circuit voltage at Karachi winter minimum temperatures)',
    '$V_{oc}$' => 'V_oc',
    '$\ge 85\,\mu\text{m}$' => '&ge; 85 &mu;m',
    '$\ge 85\,\mu\text{m}\$' => '&ge; 85 &mu;m',
    '$85\,\mu\text{m}+$' => '85 &mu;m+',
    '$85\,\mu\text{m}$' => '85 &mu;m',
    '$< 3\,\Omega$' => '&lt; 3 &Omega;',
    '$< 3.0\,\Omega$' => '&lt; 3.0 &Omega;',
    '$< 1.5\%$' => '&lt; 1.5%',
    '$< 10\,\text{ppm}$' => '&lt; 10 ppm',
    '$< 0.4\%$' => '&lt; 0.4%',
    '$-0.30\%/\text{°C}$' => '-0.30%/&deg;C',
    '$-0.30\%/\text{C}$' => '-0.30%/&deg;C',
    '$40^\circ\text{C}+$' => '40&deg;C+',
    '$42^\circ\text{C}+$' => '42&deg;C+',
    '$65^\circ\text{C}$' => '65&deg;C',
    '$25^\circ\text{C}$' => '25&deg;C',
    '$24^\circ$' => '24&deg;',
    '$26^\circ$' => '26&deg;',
    '$180^\circ$' => '180&deg;',
    '$150\,\text{km/h}$' => '150 km/h',
    '$610\,\text{g/m}^2$' => '610 g/m&sup2;',
    '$78\%$' => '78%',
    '$82\%$' => '82%',
    '$22.5\%+$' => '22.5%+',
    '$22.5\%$' => '22.5%',
    '$98.5\%+$' => '98.5%+',
    '$98.6\%+$' => '98.6%+',
    '$98.7\%+$' => '98.7%+',
    '$98.8\%+$' => '98.8%+',
    '$99.9\%$' => '99.9%',
    '$100^\circ\text{C}$' => '100&deg;C',
    '$100\times 100\times 3\,\text{mm}$' => '100 &times; 100 &times; 3 mm',
    '$\\ge 87.4\\%$' => '&ge; 87.4%',
    '$\\ge 85\\,\\mu\\text{m}$' => '&ge; 85 &mu;m',
    '$\\le$' => '&le;',
    '$\\ge$' => '&ge;',
];

foreach ($files as $file) {
    $content = file_get_contents($file);
    $orig = $content;
    foreach ($replacements as $search => $replace) {
        $content = str_replace($search, $replace, $content);
    }
    // Also remove any remaining isolated $\ge or $< or $...$
    $content = preg_replace('/\$(\d+)%/', '$1%', $content);
    $content = preg_replace('/\$< (\d+)/', '&lt; $1', $content);
    $content = preg_replace('/\$> (\d+)/', '&gt; $1', $content);
    if ($content !== $orig) {
        file_put_contents($file, $content);
        echo 'Cleaned math expressions in '.basename($file)."\n";
    }
}
