<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Str;

require __DIR__.'/blog_builder_cctv.php';

$allData = json_decode(file_get_contents(__DIR__.'/all_blog_topics_clean.json'), true);
$cctvTopics = $allData['cctv'];

$category = Category::findOrFail(46); // CCTV & Electronic Security

echo "=== DEPLOYING 100 CCTV BLOG POSTS TO CATEGORY {$category->id} ({$category->name}) ===\n";

$deployed = 0;
$totalWords = 0;

foreach ($cctvTopics as $index => $title) {
    $slug = Str::slug($title);

    // Build unique topic data
    $topicData = [
        'focus_keyword' => strtolower($title),
        'primary_angle' => "Surveillance engineering and installation guide for {$title} in Karachi and Sindh",
        'target_audience' => "Homeowners, commercial enterprises, facility managers, and IT security officers focusing on {$title}",
    ];

    $postData = buildCctvBlogPost($slug, $title, $topicData);
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

    echo sprintf("[%03d/100] ID %d: '%s' (%s words) -> /%s\n", $deployed, $post->id, Str::limit($title, 45), number_format($wordCount), $slug);
}

echo "\n============================================\n";
echo "SUCCESSFULLY DEPLOYED {$deployed} CCTV BLOG POSTS!\n";
echo 'Total Words Published: '.number_format($totalWords)." words\n";
echo 'Average Words per Post: '.number_format($totalWords / $deployed)." words\n";
echo 'Category 46 Current Post Count: '.$category->posts()->count()."\n";
