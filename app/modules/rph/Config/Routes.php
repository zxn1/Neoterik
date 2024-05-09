<?php

use App\Modules\Rph\Controllers\Main;

$routes->group('rph', function ($routes) {
    $routes->get('teacher_main',                   [Main::class,     'teacher_main']);
});