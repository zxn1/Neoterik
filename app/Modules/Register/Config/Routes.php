<?php

use App\Modules\Register\Controllers\Main;

$routes->group('register', function ($routes) {
    $routes->get('/',                   [Main::class,     'index']);
});