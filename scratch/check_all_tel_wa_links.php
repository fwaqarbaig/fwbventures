<?php

$dir = new RecursiveDirectoryIterator(__DIR__.'/../resources/views');
$ite = new RecursiveIteratorIterator($dir);

foreach ($ite as $cur) {
    if ($cur->isDir()) {
        continue;
    }
    $filePath = $cur->getPathname();
    $rel = str_replace(realpath(__DIR__.'/../resources/views').DIRECTORY_SEPARATOR, '', $filePath);

    $content = file_get_contents($filePath);
    if (preg_match_all('/(href=[\'"](?:tel:|https?:\/\/wa\.me\/)[^\'"]+[\'"])/i', $content, $m)) {
        echo "=== $rel ===\n";
        foreach ($m[1] as $link) {
            echo "   $link\n";
        }
    }
}
