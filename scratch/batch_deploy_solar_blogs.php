<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Str;

require __DIR__.'/blog_builder_solar.php';

$allData = json_decode(file_get_contents(__DIR__.'/all_blog_topics_clean.json'), true);
$solarTopics = $allData['solar'];

$category = Category::findOrFail(43); // Solar Installation Guides

echo "=== DEPLOYING 105 SOLAR INSTALLATION BLOG POSTS TO CATEGORY {$category->id} ({$category->name}) ===\n";

$deployed = 0;
$totalWords = 0;

foreach ($solarTopics as $index => $title) {
    $slug = Str::slug($title);

    // Build unique topic data
    $topicData = [
        'focus_keyword' => strtolower($title),
        'primary_angle' => "Engineering and installation guide for {$title} in Karachi and Sindh",
        'target_audience' => "Homeowners, businesses, factory managers, and EPC contractors focusing on {$title}",
    ];

    $postData = buildSolarInstallationBlogPost($slug, $title, $topicData);
    $postData['user_id'] = 1;

    $post = Post::updateOrCreate(
        ['slug' => $slug],
        $postData
    );

    // Sync category
    $post->categories()->syncWithoutDetaching([$category->id]);

    $wordCount = str_word_count(strip_tags($postData['content']));
    $totalWords += $wordCount;
    $deployed++;

    echo sprintf("[%03d/105] ID %d: '%s' (%s words) -> /%s\n", $deployed, $post->id, Str::limit($title, 45), number_format($wordCount), $slug);
}

echo "\n============================================\n";
echo "SUCCESSFULLY DEPLOYED {$deployed} SOLAR INSTALLATION BLOG POSTS!\n";
echo 'Total Words Published: '.number_format($totalWords)." words\n";
echo 'Average Words per Post: '.number_format($totalWords / $deployed)." words\n";
echo 'Category 43 Current Post Count: '.$category->posts()->count()."\n";
