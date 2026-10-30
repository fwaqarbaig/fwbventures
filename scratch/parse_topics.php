<?php

$text = file_get_contents(__DIR__.'/user_blog_topics_request_full.txt');
// Split by lines
$lines = explode("\n", $text);
$section = '';
$topics = [];

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line) || str_starts_with($line, '<') || str_starts_with($line, 'The current local time') || str_starts_with($line, 'The user has uploaded')) {
        continue;
    }
    if (preg_match('/^[0-9]+\.\s+(.+)$/', $line, $matches)) {
        $section = $matches[1];
        echo "\n=== SECTION: ".$section." ===\n";

        continue;
    }
    echo '  - '.$line."\n";
    $topics[$section][] = $line;
}

echo "\nSummary of Sections & Topic counts:\n";
foreach ($topics as $sec => $list) {
    echo "$sec: ".count($list)." topics\n";
}
