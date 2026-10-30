<?php

$data = json_decode(file_get_contents(__DIR__.'/all_blog_topics_clean.json'), true);

echo '=== SOLAR TOPICS ('.count($data['solar']).") ===\n";
echo "First 5:\n";
for ($i = 0; $i < 5; $i++) {
    echo '  '.($i + 1).'. '.$data['solar'][$i]."\n";
}
echo "Last 5:\n";
for ($i = count($data['solar']) - 5; $i < count($data['solar']); $i++) {
    echo '  '.($i + 1).'. '.$data['solar'][$i]."\n";
}

echo "\n=== SOLAR FRAME TOPICS (".count($data['solar_frame']).") ===\n";
echo "First 5:\n";
for ($i = 0; $i < 5; $i++) {
    echo '  '.($i + 1).'. '.$data['solar_frame'][$i]."\n";
}
echo "Last 5:\n";
for ($i = count($data['solar_frame']) - 5; $i < count($data['solar_frame']); $i++) {
    echo '  '.($i + 1).'. '.$data['solar_frame'][$i]."\n";
}
