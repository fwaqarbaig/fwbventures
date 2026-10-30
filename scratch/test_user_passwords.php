<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

foreach (User::all() as $u) {
    echo "ID: {$u->id} | {$u->email} | Pass 'password': ".(password_verify('password', $u->password) ? 'YES' : 'NO')." | Pass 'admin123': ".(password_verify('admin123', $u->password) ? 'YES' : 'NO')." | Pass '12345678': ".(password_verify('12345678', $u->password) ? 'YES' : 'NO').' | 2FA: '.($u->hasTwoFactorEnabled() ? 'ENABLED' : 'DISABLED')."\n";
}
