<?php

use App\Modules\Administrative\Controllers\Main;

$routes->group('administrative', function ($routes) {
    $routes->get('view_teacher_cluster',                        [Main::class,     'view_teacher_cluster'],                  ['as' => 'view_teacher_cluster']);
    $routes->post('teacher_cluster_class_mapping',              [Main::class,     'teacher_cluster_class_mapping'],         ['as' => 'teacher_cluster_class_mapping']);
    $routes->post('get_cluster_years',                          [Main::class,     'get_cluster_years'],                     ['as' => 'get_cluster_years']);
    $routes->post('allocate_teacher_cluster_class',             [Main::class,     'allocate_teacher_cluster_class'],        ['as' => 'allocate_teacher_cluster_class']);
    
});