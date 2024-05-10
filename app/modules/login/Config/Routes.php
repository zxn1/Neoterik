<?php

use App\Modules\Login\Controllers\Main;

$routes->group('login', function ($routes) {
    $routes->get('/',                   [Main::class,     'index']);
    $routes->get('dashboard',           [Main::class,     'dashboard']);
    $routes->post('attempt_login',          [Main::class,     'attempt_login']);
    $routes->get('logout',          [Main::class,     'logout']);
});
