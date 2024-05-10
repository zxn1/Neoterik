<?php

use App\Modules\Dashboard\Controllers\Main;

$routes->group('dashboard', function ($routes) {
    $routes->get('/',                   [Main::class,     'index']);
});
