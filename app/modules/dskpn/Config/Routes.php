<?php

use App\Modules\Dskpn\Controllers\Main;
use App\Modules\Dskpn\Controllers\TopicMain;
use App\Modules\Dskpn\Controllers\SubjectMain;

$routes->group('dskpn', function ($routes) {
    /*           Route Path                   Class Controller  function                        Route Name        */
    $routes->get('/',                           [Main::class,     'index']);
    $routes->get('mapping-static-field',        [Main::class,     'map_static'],                    ['as' => 'mapping_standard_learning']);
    $routes->get('tp-maintenance',              [Main::class,     'tp_maintenance'],                ['as' => 'tp_maintenance']);
    $routes->get('topic-list-in-cluster',       [Main::class,     'topic_list_in_cluster'],         ['as' => 'cluster_topic']);
    $routes->get('list-registered-dskpn',       [Main::class,     'list_registered_dskpn'],         ['as' => 'list_dskpn']);
    $routes->get('domain-mapping',              [Main::class,     'domain_mapping'],                ['as' => 'domain_mapping']);
    $routes->get('mapping-kompetensi-teras',    [Main::class,     'mapping_kompetensi_teras'],      ['as' => 'mapping_core']);
    $routes->get('mapping-spesifikasi-dskpn',   [Main::class,     'mapping_spesifikasi_dskpn'],     ['as' => 'mapping_dynamic_dskpn']);
    $routes->get('mapping-aktiviti-pentaksiran',[Main::class,     'activity_and_assessment'],       ['as' => 'activity_n_assessment']);
    $routes->get('complete',                    [Main::class,     'mapping_successfully'],          ['as' => 'dskpn_complete']);
    $routes->get('review-dskpn',                [Main::class,     'review_dskpn'],                  ['as' => 'review_dskpn']);

    $routes->post('store-standard-learning',    [Main::class,     'store_standard_learning'],       ['as' => 'store_std_learn']);
    $routes->post('store-tahap-penguasaan',     [Main::class,     'store_standard_performance'],    ['as' => 'store_std_perfm']);
    $routes->post('store-domain-mapping',       [Main::class,     'store_domain_mapping'],          ['as' => 'store_domain_map']);
    $routes->post('store-create-cluster',       [Main::class,     'store_create_cluster'],          ['as' => 'store_create_cluster']);
    $routes->post('store-core-mapping',         [Main::class,     'store_core_mapping'],            ['as' => 'store_core_map']);
    $routes->post('store-specification-mapping',[Main::class,     'store_specification_mapping'],   ['as' => 'store-spec-map']);
    $routes->post('store-activity-assessment',  [Main::class,     'store_activity_assessment'],     ['as' => 'store_actv_asses']);
    $routes->post('store-image-return-url',     [Main::class,     'store_image_ckeditor'],          ['as' => 'store_image_ckedit']);

    $routes->get('dskpn-by-topic/(:any)',       [Main::class,     'dskpn_by_topic/$1'],             ['as' => 'dskpn_by_topic']);
    $routes->get('dskpn-by-topic-list',         [Main::class,     'dskpn_by_topic_list'],           ['as' => 'dskpn_by_topic_list']);
    $routes->get('view-subject',                [Main::class,     'view_subject'],                  ['as' => 'view_subject']);
    $routes->get('view-cluster',                [Main::class,     'view_cluster'],                  ['as' => 'view_cluster']);

    $routes->get('create-dskpn/(:any)',         [Main::class,     'create_dskpn/$1'],               ['as' => 'create_dskpn']);
    $routes->get('dskpn-learning-standard',     [Main::class,     'dskpn_learning_standard'],       ['as' => 'dskpn_learning_standard']);
    $routes->get('dskpn-view/(:any)',           [Main::class,     'dskpn_view/$1'],                 ['as' => 'dskpn_view']);
    $routes->get('dskpn-details',               [Main::class,     'dskpn_details'],                 ['as' => 'dskpn_details']);

    $routes->get('approve-dskpn/(:any)',        [Main::class,     'approve_dskpn/$1'],              ['as' => 'approve_dskpn']);
    $routes->post('reject-dskpn',               [Main::class,     'reject_dskpn'],                  ['as' => 'reject_dskpn']);
    $routes->get('request-to-delete-dskpn',     [Main::class,     'request_to_delete_dskpn'],       ['as' => 'req_delete_dskpn']);
    $routes->get('delete-dskpn',                [Main::class,     'to_delete_dskpn'],               ['as' => 'delete_dskpn']);
    $routes->get('reject-to-delete-dskpn',      [Main::class,     'cancel_to_delete_dskpn'],        ['as' => 'reject_delete_dskpn']);
    $routes->get('get-to-delete-reason',        [Main::class,     'get_delete_reason'],             ['as' => 'delete_dskpn_reason']);

    $routes->post('store-cluster-subject-mapping',               [Main::class,     'store_cluster_subject_mapping'],                  ['as' => 'store_cluster_subject_mapping']);
    $routes->post('check-and-store-dskpn-code', [Main::class,     'checkAndSetDSKPNCodeSession'],   ['as' => 'checkstore_dskpn_code']);
    $routes->get('initialize_edit_dskpn/(:any)',[Main::class,     'set_session_edit_dskpn/$1'],     ['as' => 'edit_dskpn_initializer']);

    //Topic Main
    $routes->group('topic', function ($routes) {
        $routes->post('create',                         [TopicMain::class,     'create'],                  ['as' => 'create_topic']);
        $routes->delete('delete/(:num)',                [TopicMain::class,     'delete/$1'],               ['as' => 'delete_topic']);
        $routes->get('get-topic-by-kluster/(:num)',     [TopicMain::class,     'getTopicByKluster/$1'],    ['as' => 'topic_by_kluster']);
        $routes->get('get-year-by-tm-id/(:num)',        [TopicMain::class,     'getYear/$1'],              ['as' => 'get_year_by_tm_id']);
    });

      // Subject Main
    $routes->group('subject', function ($routes) {
        $routes->post('store-create-subject',           [SubjectMain::class,     'store_create_subject'],         ['as' => 'store_create_subject']);
        $routes->delete('delete/(:num)',                [SubjectMain::class,     'delete_subject/$1'],            ['as' => 'delete_subject']);
        $routes->get('get-default-sm-id/(:any)',        [SubjectMain::class,     'get_default_subject_ID'],       ['as' => 'default_sm_id']);
    });


    //SETTING MAPPING INITIALIZER
    $routes->get('initialize-domain-mapping-database', [Main::class,   'mappingInit']);
    $routes->get('debugcheckallsession', [Main::class, 'debugcheckallsession']);
});
