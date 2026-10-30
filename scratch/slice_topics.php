<?php

$text = file_get_contents(__DIR__.'/user_blog_topics_request_full.txt');
$lines = explode("\n", $text);

// Clean lines
$cleanLines = [];
foreach ($lines as $i => $l) {
    $cleanLines[$i + 1] = trim($l);
}

// 1. Lithium
$lithium = [];
for ($i = 5; $i < 68; $i++) {
    $l = $cleanLines[$i] ?? '';
    if (! empty($l) && ! preg_match('/^[0-9]+\.\s+/', $l)) {
        $lithium[] = $l;
    }
}

// 2. CCTV
$cctv = [];
for ($i = 69; $i < 175; $i++) {
    $l = $cleanLines[$i] ?? '';
    if (! empty($l)) {
        $cctv[] = $l;
    }
}

// 3. Solar
$solar = [];
for ($i = 176; $i < 284; $i++) {
    $l = $cleanLines[$i] ?? '';
    if (! empty($l)) {
        $solar[] = $l;
    }
}

// 4. Solar Frame
$solarFrame = [];
for ($i = 285; $i <= count($cleanLines); $i++) {
    $l = $cleanLines[$i] ?? '';
    if (! empty($l) && ! str_starts_with($l, '<') && ! str_starts_with($l, '- C:/') && ! str_starts_with($l, 'You can embed')) {
        $solarFrame[] = $l;
    }
}

echo "Accurate Topic Counts:\n";
echo 'Lithium topics: '.count($lithium)."\n";
echo 'CCTV topics: '.count($cctv)."\n";
echo 'Solar topics: '.count($solar)."\n";
echo 'Solar Frame topics: '.count($solarFrame)."\n";

$data = [
    'lithium' => $lithium,
    'cctv' => $cctv,
    'solar' => $solar,
    'solar_frame' => $solarFrame,
];

file_put_contents(__DIR__.'/all_blog_topics_clean.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "Saved clean topics to scratch/all_blog_topics_clean.json\n";
