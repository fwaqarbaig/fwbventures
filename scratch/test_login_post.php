<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$session = $app['session']->driver();
$session->start();

$request = Request::create('/login', 'POST', [
    'email' => 'admin@example.com',
    'password' => 'password',
    '_token' => $session->token(),
]);
$request->setLaravelSession($session);

$response = $kernel->handle($request);
echo 'Login POST Status: '.$response->getStatusCode()."\n";
echo 'Redirect Location: '.$response->headers->get('Location')."\n";
echo 'Session user_id: '.$session->get('auth.2fa.user_id')."\n";

$kernel->terminate($request, $response);
