<?php

use App\Modules\Login\Controllers\Main;

$routes->group('login', function ($routes) {
    $routes->get('/',                   [Main::class,     'index'],             ['as' => 'login']);
    $routes->get('dashboard',           [Main::class,     'dashboard']);
    $routes->post('attempt_login',      [Main::class,     'attempt_login']);
    $routes->get('logout',              [Main::class,     'logout'],            ['as' => 'logout']);
});


//test route
$routes->get('generate-account',    [Main::class,     'generate_account'],  ['as' => 'gen_acc']);
//  /generate-account?recid_id=<recid_id>&password=<password>