<?php

$lines = file('C:/Users/Farrukh/.gemini/antigravity/brain/c4d17b3c-9fab-4a50-9b4c-6e6f81ac5ab6/.system_generated/steps/1199/output.txt');
$jsonLine = '';
foreach ($lines as $line) {
    if (str_starts_with(trim($line), '{')) {
        $jsonLine = trim($line);
        break;
    }
}
$data = json_decode($jsonLine, true);
if (isset($data['failures'])) {
    foreach ($data['failures'] as $i => $f) {
        echo ($i + 1).'. '.$f['test']."\n   ".str_replace("\n", ' ', substr($f['message'], 0, 150))."\n";
    }
} else {
    echo "Could not decode json\n";
}
