<?php

$text = file_get_contents(__DIR__.'/user_blog_topics_request_full.txt');
$lines = explode("\n", $text);

foreach ($lines as $i => $line) {
    $trimmed = trim($line);
    // Check if line looks like a header or all caps or starts with numbers
    if (preg_match('/^(CCTV|SOLAR|FRAME|BATTERY|[0-9]+\.)/i', $trimmed) || strlen($trimmed) < 25 && ctype_upper(str_replace(' ', '', $trimmed)) && ! empty($trimmed)) {
        echo 'Line '.($i + 1).': ['.$trimmed."]\n";
    }
}
