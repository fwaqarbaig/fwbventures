<?php

$text = file_get_contents(__DIR__.'/user_blog_topics_request_full.txt');
$lines = explode("\n", $text);

$groups = [
    'lithium' => [],
    'cctv' => [],
    'solar' => [],
    'solar_frame' => [],
];

$currentGroup = 'lithium';

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line) || str_starts_with($line, '<') || str_starts_with($line, 'The current local time') || str_starts_with($line, 'The user has uploaded') || str_starts_with($line, 'You can embed') || str_starts_with($line, '- C:/Users')) {
        continue;
    }
    if ($line === 'CCTV') {
        $currentGroup = 'cctv';

        continue;
    }
    if ($line === 'SOLAR' || $line === 'SOLAR INSTALLATION' || preg_match('/^SOLAR\b/i', $line) && ! str_contains($line, 'FRAME')) {
        $currentGroup = 'solar';

        continue;
    }
    if ($line === 'SOLAR FRAME' || $line === 'SOLAR FRAME STRUCTURE') {
        $currentGroup = 'solar_frame';

        continue;
    }
    // Filter out section headers like "1. Lithium Battery Products & Services" or "4. Lithium Battery Prices"
    if (preg_match('/^[0-9]+\.\s+/', $line)) {
        continue;
    }
    if (str_starts_with($line, 'i am going to giev')) {
        continue;
    }

    $groups[$currentGroup][] = $line;
}

echo "Detected Topic Counts:\n";
echo 'Lithium: '.count($groups['lithium'])."\n";
echo 'CCTV: '.count($groups['cctv'])."\n";
echo 'Solar: '.count($groups['solar'])."\n";
echo 'Solar Frame: '.count($groups['solar_frame'])."\n";

file_put_contents(__DIR__.'/extracted_categorized_topics.json', json_encode($groups, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "Saved to scratch/extracted_categorized_topics.json\n";
