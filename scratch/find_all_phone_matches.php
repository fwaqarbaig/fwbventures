<?php

$dirs = ['resources', 'tests', 'app', 'config', 'database/seeders'];
$matches = [];

foreach ($dirs as $dirName) {
    $targetDir = __DIR__.'/../'.$dirName;
    if (! is_dir($targetDir)) {
        continue;
    }

    $dir = new RecursiveDirectoryIterator($targetDir);
    $ite = new RecursiveIteratorIterator($dir);

    foreach ($ite as $cur) {
        if ($cur->isDir()) {
            continue;
        }
        $filePath = $cur->getPathname();
        $rel = str_replace(realpath(__DIR__.'/../').DIRECTORY_SEPARATOR, '', $filePath);

        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        if (! in_array($ext, ['php', 'json', 'js', 'md', 'env'])) {
            continue;
        }

        $content = file_get_contents($filePath);
        if (preg_match_all('/(923000000000|\+92[\s\-]?300[\s\-]?0000000|wa\.me\/92300|300[\s\-]?0000000)/i', $content, $m)) {
            $matches[$rel] = count($m[0]);
        }
    }
}

ksort($matches);
foreach ($matches as $file => $count) {
    echo "$file: $count matches\n";
}
