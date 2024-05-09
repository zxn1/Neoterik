<?php

use App\Modules\Dskpn\Controllers\Main;

$routes->group('dskpn', function ($routes) {
    $routes->get('/',                         [Main::class,     'index']);
    $routes->get('mapping-static-field',      [Main::class,     'map_static']);
});
