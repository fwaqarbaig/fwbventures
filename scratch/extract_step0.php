<?php

$json = file_get_contents(__DIR__.'/step0_raw.json');
$data = json_decode($json, true);
file_put_contents(__DIR__.'/step0_content.txt', $data['content']);
echo 'Saved content to scratch/step0_content.txt. Length: '.strlen($data['content'])."\n";
