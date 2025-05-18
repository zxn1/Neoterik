<?php

use App\Modules\Login\Controllers\Main;

$routes->group('login', function ($routes) {
    $routes->get('/',                   [Main::class,     'index'],             ['as' => 'login']);
    $routes->get('dashboard',           [Main::class,     'dashboard']);
    $routes->post('attempt_login',      [Main::class,     'attempt_login']);
    $routes->get('logout',              [Main::class,     'logout'],            ['as' => 'logout']);
});


// route - e-school registeration - linked to Neoterik
$routes->get('generate-account',    [Main::class,     'generate_account'],  ['as' => 'gen_acc']);
// route = /generate-account?recid_id=<recid_id>&password=<password>
// if no password passed - it will use ic number as password