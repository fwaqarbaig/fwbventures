<?php

$data = json_decode(file_get_contents(__DIR__.'/all_blog_topics_clean.json'), true);
$cctv = $data['cctv'];

echo 'CCTV Topics Count: '.count($cctv)."\n\n";
echo "First 5:\n";
for ($i = 0; $i < 5; $i++) {
    echo ($i + 1).'. '.$cctv[$i]."\n";
}
echo "Last 5:\n";
for ($i = count($cctv) - 5; $i < count($cctv); $i++) {
    echo ($i + 1).'. '.$cctv[$i]."\n";
}
