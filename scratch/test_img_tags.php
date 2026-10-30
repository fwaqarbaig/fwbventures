<?php

$c = file_get_contents('http://127.0.0.1:8000/service/on-grid-solar-systems-in-karachi');
preg_match_all('/<img[^>]+src="([^">]+)"[^>]*alt="([^">]*)"[^>]*>/', $c, $m, PREG_SET_ORDER);
foreach ($m as $img) {
    echo 'SRC: '.$img[1].' | ALT: '.$img[2]."\n";
}
