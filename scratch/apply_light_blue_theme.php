<?php

$dir = new RecursiveDirectoryIterator(__DIR__.'/../resources/views');
$iterator = new RecursiveIteratorIterator($dir);
$regex = new RegexIterator($iterator, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$regexPatterns = [
    '/hover:from-amber-700 hover:to-emerald-600/' => 'hover:from-sky-700 hover:to-blue-600',
    '/hover:to-amber-700/' => 'hover:to-blue-700',
    '/accent-amber-500/' => 'accent-sky-500',
    '/shadow-amber-(\d+)\/(\d+)/' => 'shadow-sky-$1/$2',
    '/shadow-amber-(\d+)/' => 'shadow-sky-$1',
    '/via-amber-200 to-yellow-400/' => 'via-cyan-300 to-blue-400',
    '/via-amber-(\d+)/' => 'via-cyan-$1',
    '/from-amber-(\d+)/' => 'from-sky-$1',
    '/to-amber-(\d+)/' => 'to-blue-$1',
    '/bg-amber-(\d+)/' => 'bg-sky-$1',
    '/text-amber-(\d+)/' => 'text-sky-$1',
    '/border-amber-(\d+)/' => 'border-sky-$1',
    '/hover:bg-amber-(\d+)/' => 'hover:bg-sky-$1',
    '/hover:text-amber-(\d+)/' => 'hover:text-sky-$1',
    '/hover:border-amber-(\d+)/' => 'hover:border-sky-$1',
];

$totalCount = 0;
$modifiedFiles = 0;

foreach ($regex as $match) {
    $file = $match[0];
    $content = file_get_contents($file);
    $orig = $content;
    foreach ($regexPatterns as $pattern => $replacement) {
        $content = preg_replace($pattern, $replacement, $content, -1, $c);
        $totalCount += $c;
    }
    if ($content !== $orig) {
        file_put_contents($file, $content);
        $modifiedFiles++;
    }
}

echo "Regex cleanup: $totalCount replacements in $modifiedFiles files.\n";
