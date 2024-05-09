<?php

use App\Modules\Login\Controllers\Main;

$routes->group('login', function ($routes) {
    $routes->get('/',                   [Main::class,     'index']);
    $routes->get('dashboard',           [Main::class,     'dashboard']);
    
});