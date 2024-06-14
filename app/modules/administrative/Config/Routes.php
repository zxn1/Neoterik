<?php

use App\Modules\Administrative\Controllers\Main;

$routes->group('administrative', function ($routes) {
    $routes->get('teacher_list',                   [Main::class,     'teacher_list']);
});