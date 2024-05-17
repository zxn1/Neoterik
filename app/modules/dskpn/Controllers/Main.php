<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

//model
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Dskpn\Models\TopicMainModel;

class Main extends BaseController
{

    protected $cluster_model;
    protected $topic_model;

    public function __construct()
    {
        $this->session          = service('session');
        $this->cluster_model    = new ClusterMainModel();
        $this->topic_model      = new TopicMainModel();
    }

    public function index()
    {
        $data = [];
        $this->render_login('login',$data);
        
        // return view('App\\Modules\\Login\\Views\\login');
    }

    public function map_static()
    {
        $data = [];
        $script = ['data', 'dynamic-input'];
        $style = ['static-field'];
        $this->render_jscss('map_static_field', $data, $script, $style);
    }

    public function tp_maintenance()
    {
        $data = [];
        $script = ['data', 'tp-dynamic-field', 'tp-autoload'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('tp_maintenance', $data, $script, $style);
    }

    public function topic_list_in_cluster()
    {
        $data = [];
        $data['cluster'] = $this->cluster_model->findAll();
        $data['topik_main'] = $this->topic_model->findAll();

        $script = ['data','topic_list_in_cluster'];
        $style = ['topic_list_in_cluster'];
        $this->render_jscss('topic_list_in_cluster', $data, $script, $style);
    }

    public function list_registered_dskpn()
    {
        $data = [];
        $script = ['data', 'dynamic-input'];
        $style = ['static-field'];
        $this->render_jscss('list_registered_dskpn', $data, $script, $style);

        // return view('list-registered-dskpn');
    }

    public function dskpn_view()
    {
        $data = [];
        $this->render('dskpn_view', $data);
    }


    // 16 Domain Mapping View
    public function domain_mapping()
    {
        $data = [];
        $script = ['data', 'dynamic-input'];
        $style = ['static-field'];
        $this->render_jscss('domain_mapping', $data, $script, $style);

    }
    
    public function mapping_kompetensi_teras()
    {
        $data = [];
        $script = ['data', 'tp-dynamic-field', 'tp-autoload'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_kompetensi_teras', $data, $script, $style);

    }
    public function mapping_spesifikasi_dskpn()
    {
        $data = [];
        $script = ['data', 'tp-dynamic-field', 'tp-autoload'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_spesifikasi_dskpn', $data, $script, $style);
    }    
}
