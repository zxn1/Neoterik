<?php

use App\Modules\Assessment\Controllers\Main;

$routes->group('assessment', function ($routes) {
    $routes->get('/',                   [Main::class,     'index'],     ['as' => 'dashboard']);
    $routes->get('student-management',                   [Main::class,     'student_management']);
});
