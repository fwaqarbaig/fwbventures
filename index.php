<?php

/**
 * Rental Power UAE - Hostinger Production Root Entry Point
 *
 * Automatically routes all web requests directly to Laravel's public/index.php
 * even if the web server executes index.php from the root directory.
 */
define('LARAVEL_START', microtime(true));

// Forward directly to Laravel's official public/index.php front controller
require_once __DIR__.'/public/index.php';
