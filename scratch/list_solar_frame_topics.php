<?php

$data = json_decode(file_get_contents(__DIR__.'/all_blog_topics_clean.json'), true);
$solarFrame = array_slice($data['solar_frame'], 0, 51);

echo 'Solar Frame Topics Count: '.count($solarFrame)."\n\n";
foreach ($solarFrame as $i => $title) {
    echo ($i + 1).'. '.$title."\n";
}
