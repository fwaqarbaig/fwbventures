<?php

$data = json_decode(file_get_contents(__DIR__.'/all_blog_topics_clean.json'), true);
$solar = $data['solar'];

echo 'Solar Topics Count: '.count($solar)."\n\n";
foreach ($solar as $i => $title) {
    echo ($i + 1).'. '.$title."\n";
}
