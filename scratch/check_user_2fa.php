<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

$u = User::where('email', 'farrukh@generatordubai.com')->first();
echo 'User: '.$u->email."\n";
echo 'two_factor_secret: '.$u->two_factor_secret."\n";
echo 'two_factor_recovery_codes: '.$u->two_factor_recovery_codes."\n";
echo 'two_factor_confirmed_at: '.$u->two_factor_confirmed_at."\n";
