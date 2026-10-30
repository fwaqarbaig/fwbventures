<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use Illuminate\Contracts\Console\Kernel;

echo "Current Root Menu Items:\n";
$items = MenuItem::whereNull('parent_id')->orWhere('parent_id', 0)->orderBy('order')->get();
foreach ($items as $item) {
    echo "ID: {$item->id} | Order: {$item->order} | Title: {$item->title} | URL: {$item->url}\n";
}

// Find if Blogs or Blog already exists
$blogItem = MenuItem::where(function ($q) {
    $q->where('title', 'Blogs')
        ->orWhere('title', 'Blog')
        ->orWhere('url', '/blog')
        ->orWhere('route_name', 'blog.index');
})->where(function ($q) {
    $q->whereNull('parent_id')->orWhere('parent_id', 0);
})->first();

if (! $blogItem) {
    echo "\nCreating 'Blogs' menu item...\n";
    // Adjust orders of About Us and Contact Us
    $about = MenuItem::where('title', 'like', '%About%')->whereNull('parent_id')->first();
    $contact = MenuItem::where('title', 'like', '%Contact%')->whereNull('parent_id')->first();

    $blogItem = MenuItem::create([
        'title' => 'Blogs',
        'url' => '/blog',
        'route_name' => 'blog.index',
        'type' => 'standard',
        'target' => '_self',
        'order' => 6,
        'is_active' => true,
        'location' => 'header',
        'parent_id' => null,
    ]);

    if ($about) {
        $about->update(['order' => 7]);
    }
    if ($contact) {
        $contact->update(['order' => 8]);
    }
} else {
    echo "\nUpdating existing Blog menu item ID {$blogItem->id}...\n";
    $blogItem->update([
        'title' => 'Blogs',
        'url' => '/blog',
        'route_name' => 'blog.index',
        'order' => 6,
        'is_active' => true,
        'location' => 'header',
    ]);
}

echo "\nUpdated Root Menu Items:\n";
$items = MenuItem::whereNull('parent_id')->orWhere('parent_id', 0)->orderBy('order')->get();
foreach ($items as $item) {
    echo "ID: {$item->id} | Order: {$item->order} | Title: {$item->title} | Route: {$item->route_name} | URL: {$item->url}\n";
}
