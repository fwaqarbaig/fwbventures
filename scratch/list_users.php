<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

$users = User::all();
echo 'Total users in database: '.$users->count()."\n";
foreach ($users as $u) {
    echo "ID: {$u->id} | Name: {$u->name} | Email: {$u->email} | Role: {$u->role} | is_active: {$u->is_active} | two_factor: ".($u->hasTwoFactorEnabled() ? 'ENABLED' : 'DISABLED')."\n";
}
