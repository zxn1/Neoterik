<?php

use App\Modules\Assessment\Controllers\Main;

$routes->group('assessment', function ($routes) {
    $routes->get('/',                       [Main::class,     'index']);
    $routes->get('student-management',      [Main::class,     'student_management']);
    $routes->get('overall-report',          [Main::class,     'overall_report']);
});
