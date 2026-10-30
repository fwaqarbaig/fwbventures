<?php

$handle = fopen('C:/Users/Farrukh/.gemini/antigravity/brain/c4d17b3c-9fab-4a50-9b4c-6e6f81ac5ab6/.system_generated/logs/transcript.jsonl', 'r');
$lineNum = 0;
while (($line = fgets($handle)) !== false) {
    $lineNum++;
    $data = json_decode($line, true);
    if ($data && ($data['type'] ?? '') === 'USER_INPUT') {
        if (strpos($data['content'] ?? '', 'i am going to giev you blogs topics') !== false) {
            echo "Line $lineNum, step_index: ".$data['step_index']."\n";
            file_put_contents(__DIR__.'/user_blog_topics_request.txt', $data['content']);
            echo 'Saved content to scratch/user_blog_topics_request.txt ('.strlen($data['content'])." bytes)\n";
        }
    }
}
fclose($handle);
