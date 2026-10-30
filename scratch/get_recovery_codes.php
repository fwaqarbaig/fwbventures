<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

$u = User::where('email', 'farrukh@generatordubai.com')->first();
echo "=== USER Farrukh ===\n";
echo 'Email: '.$u->email."\n";
echo "Password: password\n";
echo '2FA Secret: '.$u->two_factor_secret."\n";
echo "Recovery Codes:\n";
print_r($u->two_factor_recovery_codes);

$admin = User::find(1);
echo "\n=== USER Admin ===\n";
echo 'Email: '.$admin->email."\n";
echo "Password: password\n";
echo '2FA Secret: '.$admin->two_factor_secret."\n";
print_r($admin->two_factor_recovery_codes);
