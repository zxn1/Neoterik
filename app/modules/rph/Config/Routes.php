<?php

use App\Modules\Rph\Controllers\Main;

$routes->group('rph', function ($routes) {
    $routes->get('/',                   [Main::class,     'index']);
});