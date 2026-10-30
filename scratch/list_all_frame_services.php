<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Contracts\Console\Kernel;

// In FWB Ventures, services with ID between 171 and 248 (and potentially others) belong to the Solar Frame Structure cluster!
$frameServices = Service::whereBetween('id', [171, 250])->get();
echo 'Total Services in range 171-250: '.$frameServices->count()."\n";
foreach ($frameServices as $s) {
    $wc = str_word_count(strip_tags($s->content ?? ''));
    echo "ID: {$s->id} | Words: {$wc} | Slug: {$s->slug} | Title: {$s->title}\n";
}

// Check if any other services exist outside this range
$otherFrameServices = Service::whereNotIn('id', $frameServices->pluck('id'))
    ->where(function ($q) {
        $q->where('title', 'like', '%Solar Frame%')
            ->orWhere('title', 'like', '%Mounting Structure%')
            ->orWhere('slug', 'like', '%solar-frame%')
            ->orWhere('slug', 'like', '%mounting-structure%');
    })->get();

echo "\nOther Frame Services outside 171-250: ".$otherFrameServices->count()."\n";
foreach ($otherFrameServices as $s) {
    $wc = str_word_count(strip_tags($s->content ?? ''));
    echo "ID: {$s->id} | Words: {$wc} | Slug: {$s->slug} | Title: {$s->title}\n";
}
