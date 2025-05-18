<?php

use App\Modules\Administrative\Controllers\Main;
use App\Modules\Administrative\Controllers\UserAccessController;

$routes->group('administrative', function ($routes) {
    $routes->get('view_teacher_cluster',                        [Main::class,     'view_teacher_cluster'],                  ['as' => 'view_teacher_cluster']);
    $routes->post('teacher_cluster_class_mapping',              [Main::class,     'teacher_cluster_class_mapping'],         ['as' => 'teacher_cluster_class_mapping']);
    $routes->post('get_cluster_years',                          [Main::class,     'get_cluster_years'],                     ['as' => 'get_cluster_years']);
    $routes->post('allocate_teacher_cluster_class',             [Main::class,     'allocate_teacher_cluster_class'],        ['as' => 'allocate_teacher_cluster_class']);
    $routes->post('get_subject_name',                           [Main::class,     'get_subject_name'],                      ['as' => 'get_subject_name']);
    $routes->post('get_list_of_subject_name',                   [Main::class,     'get_list_of_subject_name'],              ['as' => 'get_list_of_subject_name']);

    $routes->get('view_user_access',                            [UserAccessController::class,     'view_user_access'],          ['as' => 'view_user_access']);
    $routes->get('get_roles',                                   [UserAccessController::class,     'get_roles'],                 ['as' => 'get_roles']);
    $routes->post('save_user_roles',                            [UserAccessController::class,     'save_user_roles'],           ['as' => 'save_user_roles']);

    $routes->get('change_user_access',                          [UserAccessController::class,     'changeRoleAccess'],          ['as' => 'change_user_role']);

    $routes->post('deleteSubjectMapping',                       [Main::class,     'deleteSubjectMapping'],         ['as' => 'deleteSubjectMapping']);
    $routes->post('deleteClusterMapping',                       [Main::class,     'deleteClusterMapping'],         ['as' => 'deleteClusterMapping']);

    
});
