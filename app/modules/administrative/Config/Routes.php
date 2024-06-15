<?php

use App\Modules\Administrative\Controllers\Main;

$routes->group('administrative', function ($routes) {
    $routes->get('view_teacher_cluster',        [Main::class,     'view_teacher_cluster'],      ['as' => 'view_teacher_cluster']);
});