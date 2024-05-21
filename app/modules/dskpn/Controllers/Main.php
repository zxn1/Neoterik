<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

//model
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Dskpn\Models\TopicMainModel;
use App\Modules\Dskpn\Models\SubjectMainModel;
use App\Modules\Dskpn\Models\LearningStandardModel;
use App\Modules\Dskpn\Models\ObjectivePerformanceModel;
use App\Modules\Dskpn\Models\StandardPerformanceModel;

//mapping model import
use App\Modules\Dskpn\Models\DomainGroupModel;
use App\Modules\Dskpn\Models\DomainMappingModel;
use App\Modules\Dskpn\Models\DomainModel;
//-----

class Main extends BaseController
{

    protected $cluster_model;
    protected $topic_model;
    protected $subject_model;
    protected $learning_standard_model;
    protected $objective_performance_model;
    protected $standard_performance_model;

    //mapping model sets
    protected $domain_group_model;
    protected $domain_model;
    protected $domain_mapping_model;
    //-----------------
    protected $db;

    public function __construct()
    {
        $this->session                  = service('session');
        $this->cluster_model            = new ClusterMainModel();
        $this->topic_model              = new TopicMainModel();
        $this->subject_model            = new SubjectMainModel();
        $this->learning_standard_model  = new LearningStandardModel();
        $this->objective_performance_model = new ObjectivePerformanceModel();
        $this->standard_performance_model  = new StandardPerformanceModel();

        //mapping model init
        $this->domain_group_model       = new DomainGroupModel();
        $this->domain_model             = new DomainModel();
        $this->domain_mapping_model     = new DomainMappingModel();
        //-----------------
        $this->db                       = $this->db = \Config\Database::connect();
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

        $data['parameters'] = $this->request->getGet();
        if(!empty($data['parameters']))
        {
            //step 1 - get Cluster
            $data['cluster_desc'] = $this->cluster_model
                                    ->where('cm_id', $data['parameters']['cluster_id'])->first();

            //step 2 - get Topic
            $data['topic_desc'] = $this->topic_model
                                    ->where('tm_id', $data['parameters']['topic_id'])->first();

            //step 3 - get Subject Via Learning Standard
            foreach($data['parameters']['learning_standard_id'] as $ls_id)
            {
                $query = $this->db->table('subject_main')
                    ->select('subject_main.*')
                    ->join('learning_standard', 'learning_standard.sm_id = subject_main.sm_id')
                    ->where('learning_standard.ls_id', $ls_id)
                    ->get();

                $data['subjects'][] = $query->getResult();
            }
        }

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

        //steps 1 - get all subjects related to iterate horizontally

        //steps 2 - get 4 mapping group components
        //steps 2.1 - get all id for 4 group_name
        $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Kualiti Keperibadian', 'Kemandirian', 'Pengetahuan Asas', '7 Kemahiran Insaniah'])->find();
    
        //steps 2.2 - get all item for all group
        //steps 2.3 - store all retrieved item
        foreach($allGroup as $group)
        {
            $data[$group['dg_title']] = $this->domain_model->select('d_name')->where('gd_id', $group['dg_id'])->orderBy('d_id', 'ASC')->find();
        }
        
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
                    
                    $data['learning_standard_id'][] = $this->learning_standard_model->insertID();
                }
            }
        
        $parameters = http_build_query($data);
        return redirect()->to(route_to('tp_maintenance') . '?' . $parameters);

        // var_dump($parameters);
        //var_dump($data); //data ni perlu simpan dalam table baru called Steps. 'Standard Pembelajaran Insertion'.
    }

    public function store_standard_performance()
    {
        $allData = $this->request->getPost();

        foreach($allData as $key => $data)
        {
            $parts = explode('-', $key);
            //first repeatition max is only 4/5.
            $tempSubject = $this->subject_model->where('sm_code', $parts[1])->first();

            foreach($data as $index => $item)
            {
                $tpLevel = $index + 1;
                $this->standard_performance_model->insert([
                    'sp_tp_level' => $tpLevel,
                    'sp_tp_level_desc' => $item,
                    'sm_id' => $tempSubject['sm_id'],
                    'dskpn_id' => null
                ]);
            }
        }
        
        return redirect()->to(route_to('mapping_dynamic_dskpn'));
    }


    //private routes - internal uses
    public function mappingInit()
    {
        //1. Pengetahuan asas
        $tempAName = "Pengetahuan Asas";
        $tempAAtt = [
            ['DKM1: Literasi (L)', 0],
            ['DKM2: Numerasi (N)', 0],
            ['DKM3: Literasi Saintifik (LS)', 0],
            ['DKM4: Literasi ICT (LICT)', 0],
            ['(DKM5) Literasi Kewangan (LW)', 0],
            ['(DKM6) Literasi Kebudayaan Sivik dan Nilai (LKSN)', 0]
        ];

        //2. Kemandirian
        $tempBName = "Kemandirian";
        $tempBAtt = [
            ['(DKM7) Pemikiran Kritis & Penyelesaian Masalah (PKPM)', 0],
            ['(DKM8) Kreativiti (Kr)', 0],
            ['(DKM9) Komunikasi (Kom)', 0],
            ['(DKM10) Kolaborasi (K)', 0]
        ];

        //3. Kualiti Keperibadian
        $tempCName = "Kualiti Keperibadian";
        $tempCAtt = [
            ['(DKM11) Inkuiri (Ik)', 0],
            ['(DKM12) Inisiatif', 0],
            ['(DKM13) Kegigihan', 0],
            ['(DKM14) Penyesuaian Diri (PD)', 0],
            ['(DKM15) Kesedaran Sosial & Budaya (KSB)', 0],
            ['(DKM16) Kepimpinan (Kp)', 0]
        ];

        //4. 7 Kemahiran Insaniah
        $tempDName = "7 Kemahiran Insaniah";
        $tempDAtt = [
            ['(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Masalah', 0],
            ['(KI2) Kemahiran Komunikasi', 0],
            ['(KI3) Kemahiran Kepimpinan', 0],
            ['(KI4) Kemahiran Kerja Berpasukan', 0],
            ['(KI5) Pembelajaran Berterusan Dan Pengurusan Maklumat', 0],
            ['(KI6) Kemahiran Keusahawanan', 0],
            ['(KI7) Moral dan Etika Profesional', 0]
        ];

        //before start - check if exist no need
        if(!empty($this->domain_group_model->where('dg_title', $tempAName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempBName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempCName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempDName)->first()))
            return "Already initiated";

        //calling
        if($this->_mappingInitializer($tempAName, $tempAAtt) && 
            $this->_mappingInitializer($tempBName, $tempBAtt) && 
            $this->_mappingInitializer($tempCName, $tempCAtt) &&
            $this->_mappingInitializer($tempDName, $tempDAtt))
            return "OK!";
        return "Fails!";
    }

    //private use function
    private function _mappingInitializer($name, $attributes) //attributes is array of an array of 2 elements (domain name and not_sureYet_id).
    {
        //steps 1 - domain group
        if($this->domain_group_model->insert([
            'dg_title' => $name
        ]))
        {
            //step 2 - add domain inside domain_group
            $lastID = $this->domain_group_model->insertID();
            $flag = false;
            foreach($attributes as $item)
            {
                if($this->domain_model->insert([
                    'd_name' => $item[0],
                    'gd_id' => $lastID,
                    'not_sureYet_id' => null //temporary first
                ]))
                {
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            if($flag == false)
                return true;
        }
        return false;
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
