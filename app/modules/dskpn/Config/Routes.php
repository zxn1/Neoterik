<?php

use App\Modules\Dskpn\Controllers\Main;

$routes->group('dskpn', function ($routes) {
    $routes->get('/',                         [Main::class,     'index']);
    $routes->get('mapping-static-field',      [Main::class,     'map_static']);
    $routes->get('tp-maintenance',            [Main::class,     'tp_maintenance']);
    $routes->get('topic-list-in-cluster',     [Main::class,     'topic_list_in_cluster']);
});
