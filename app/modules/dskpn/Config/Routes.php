<?php

use App\Modules\Dskpn\Controllers\Main;
use App\Modules\Dskpn\Controllers\TopicMain;

$routes->group('dskpn', function ($routes) {
    /*           Route Path                   Class Controller  function                                  Route Name        */
    $routes->get('/',                         [Main::class,     'index']);
    $routes->get('mapping-static-field',      [Main::class,     'map_static']);
    $routes->get('tp-maintenance',            [Main::class,     'tp_maintenance'],              ['as' => 'tp_maintenance']);
    $routes->get('topic-list-in-cluster',     [Main::class,     'topic_list_in_cluster']);
    $routes->get('list-registered-dskpn',     [Main::class,     'list_registered_dskpn']);
    $routes->get('dskpn-view',                [Main::class,     'dskpn_view']);
    $routes->get('domain-mapping',            [Main::class,     'domain_mapping']);
    $routes->get('mapping-kompetensi-teras',  [Main::class,     'mapping_kompetensi_teras']);
    $routes->get('mapping-spesifikasi-dskpn', [Main::class,     'mapping_spesifikasi_dskpn']);
  
    //Topic Main
    $routes->group('topic', function ($routes) {
        $routes->post('create',                [TopicMain::class,     'create'],                  ['as' => 'create_topic']);
    });
});
