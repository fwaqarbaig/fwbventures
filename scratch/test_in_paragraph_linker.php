<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

function injectInParagraphLinks(string $html, array $keywordsToLinks): string
{
    // Match only <p>...</p> blocks that are not inside other complex tags
    return preg_replace_callback('/<p>(.*?)<\/p>/is', function ($pMatch) use (&$keywordsToLinks) {
        $pContent = $pMatch[1];

        // Skip if this paragraph already contains too many links (e.g. > 2)
        if (substr_count($pContent, '<a ') >= 2) {
            return $pMatch[0];
        }

        foreach ($keywordsToLinks as $kw => $linkData) {
            if ($linkData['used']) {
                continue; // Only link each keyword once per article!
            }

            // Word boundary regex that does not match inside existing <a...>...</a>
            // We split by existing tags to only replace within raw text nodes
            $parts = preg_split('/(<[^>]+>)/i', $pContent, -1, PREG_SPLIT_DELIM_CAPTURE);
            $replaced = false;

            for ($i = 0; $i < count($parts); $i++) {
                // If this is an opening <a> tag, skip until closing </a>
                if (preg_match('/^<a\b/i', $parts[$i])) {
                    while ($i < count($parts) && ! preg_match('/^<\/a>/i', $parts[$i])) {
                        $i++;
                    }

                    continue;
                }

                // If this is an HTML tag, skip
                if (preg_match('/^<[^>]+>$/', $parts[$i])) {
                    continue;
                }

                // Otherwise, it's a raw text node! Check if keyword matches
                $pattern = '/\b('.preg_quote($kw, '/').')\b/i';
                if (preg_match($pattern, $parts[$i])) {
                    $replacement = sprintf(
                        '<a href="%s" class="text-sky-600 hover:text-sky-800 font-semibold underline" title="%s">$1</a>',
                        htmlspecialchars($linkData['url']),
                        htmlspecialchars($linkData['title'])
                    );
                    $parts[$i] = preg_replace($pattern, $replacement, $parts[$i], 1);
                    $keywordsToLinks[$kw]['used'] = true;
                    $replaced = true;
                    break;
                }
            }

            if ($replaced) {
                $pContent = implode('', $parts);
            }
        }

        return "<p>{$pContent}</p>";
    }, $html);
}

// Test on Post ID 1107
$p = Post::find(1107);
$keywords = [
    'net-metering' => ['url' => '/service/solar-solutions-karachi', 'title' => 'K-Electric Net-Metering Turnkey Solutions', 'used' => false],
    'solar system' => ['url' => '/service/solar-panel-installation-karachi', 'title' => 'Solar Panel Installation in Karachi', 'used' => false],
    'K-Electric' => ['url' => '/service/solar-solutions-karachi', 'title' => 'K-Electric Distributed Generation', 'used' => false],
    'solar customers' => ['url' => '/service/solar-installation-karachi', 'title' => 'Karachi Solar Engineering Services', 'used' => false],
];

echo "Original paragraph preview:\n";
preg_match('/<p>(.*?)<\/p>/is', $p->content, $m);
echo substr($m[1] ?? '', 0, 200)."\n\n";

$result = injectInParagraphLinks($p->content, $keywords);

echo "Modified paragraph preview:\n";
preg_match('/<p>(.*?)<\/p>/is', $result, $m);
echo substr($m[1] ?? '', 0, 300)."\n";
