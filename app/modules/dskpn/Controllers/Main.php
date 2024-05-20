<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

//model
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Dskpn\Models\TopicMainModel;
use App\Modules\Dskpn\Models\SubjectMainModel;
use App\Modules\Dskpn\Models\LearningStandardModel;
use App\Modules\Dskpn\Models\ObjectivePerformanceModel;

class Main extends BaseController
{

    protected $cluster_model;
    protected $topic_model;
    protected $subject_model;
    protected $learning_standard_model;
    protected $objective_performance_model;

    public function __construct()
    {
        $this->session                  = service('session');
        $this->cluster_model            = new ClusterMainModel();
        $this->topic_model              = new TopicMainModel();
        $this->subject_model            = new SubjectMainModel();
        $this->learning_standard_model  = new LearningStandardModel();
        $this->objective_performance_model = new ObjectivePerformanceModel();
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
        $data['kluster'] = $this->cluster_model->findAll();

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
        $data['cluster'] = $this->cluster_model->select('cluster_main.*, topic_main.*')
        ->join('topic_main', 'topic_main.cm_id = cluster_main.cm_id')
        ->findAll();

        // dd($data['cluster']);

        $script = ['data', 'list_registered_dskpn'];
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

    public function store_standard_learning()
    {
        $data = [];

        $allSubject = $this->request->getPost('subject');
        $allDescription = $this->request->getPost('subject_description');
        $objective = $this->request->getPost('objective');
        $kluster = $this->request->getPost('kluster');
        $topik = $this->request->getPost('topik');

        $data['cluster_id'] = $kluster;
        $data['topic_id'] = $topik;

        //step 1 - add objective performance
        if($this->objective_performance_model->insert([
            'op_desc' => $objective
        ]))
            if(is_array($allSubject) && is_array($allDescription))
            {
                $data['objective_performance_id'] = $this->objective_performance_model->insertID();

                foreach($allSubject as $index => $subject)
                {
                    //step 1 - temporary only - need UI later to register subject
                    $this->subject_model->insert([
                        'sm_code' => $this->_generateRandomString(7),
                        'sm_desc' => $subject
                    ]);

                    // Get the last inserted ID
                    $lastID = $this->subject_model->insertID();
                    //end temporary

                    //step 2 - insert learning-standard
                    $this->learning_standard_model->insert([
                        'ls_details' => $allDescription[$index],
                        'sm_id' => $lastID,
                        'dskpn_id' => null //temporary null
                    ]);
                    
                    $data['learning_standard_id'] = $this->learning_standard_model->insertID();
                }
            }
        var_dump($data); //data ni perlu simpan dalam table baru called Steps. 'Standard Pembelajaran Insertion'.
    }

    private function _generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
