<?php

use App\Modules\Rph\Controllers\Main;

$routes->group('rph', function ($routes) {
    $routes->get('teacher_main',                   [Main::class,     'teacher_main']);
    $routes->get('teacher_suggestion',             [Main::class,     'teacher_suggestion']);
    $routes->get('teacher_custom',                 [Main::class,     'teacher_custom']);
});