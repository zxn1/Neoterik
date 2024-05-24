<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

//model
use App\Modules\Dskpn\Models\DskpnModel;
use App\Modules\Dskpn\Models\DomainModel;
use App\Modules\Dskpn\Models\ExtraAdditionalFieldModel;
use App\Modules\Dskpn\Models\TopicMainModel;
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Dskpn\Models\DomainGroupModel;
use App\Modules\Dskpn\Models\LearningAidModel;

use App\Modules\Dskpn\Models\SubjectMainModel;
use App\Modules\Dskpn\Models\DomainMappingModel;
use App\Modules\Dskpn\Models\LearningStandardModel;
use App\Modules\Dskpn\Models\ActivityAssessmentModel;

//mapping model import
use App\Modules\Dskpn\Models\StandardPerformanceModel;
use App\Modules\Dskpn\Models\ObjectivePerformanceModel;
//-----

class Main extends BaseController
{

    protected $cluster_model;
    protected $topic_model;
    protected $subject_model;
    protected $learning_standard_model;
    protected $objective_performance_model;
    protected $activity_assessment_model;
    protected $standard_performance_model;
    protected $dskpn_model;

    //mapping model sets
    protected $domain_group_model;
    protected $domain_model;
    protected $domain_mapping_model;
    //-----------------
    protected $extra_additional_field_model;
    protected $learning_aid_model;
    protected $db;

    public function __construct()
    {
        $this->session                      = service('session');
        $this->cluster_model                = new ClusterMainModel();
        $this->topic_model                  = new TopicMainModel();
        $this->subject_model                = new SubjectMainModel();
        $this->learning_standard_model      = new LearningStandardModel();
        $this->objective_performance_model  = new ObjectivePerformanceModel();
        $this->activity_assessment_model    = new ActivityAssessmentModel();
        $this->standard_performance_model   = new StandardPerformanceModel();
        $this->dskpn_model                  = new dskpnModel();
        //mapping model init
        $this->domain_group_model       = new DomainGroupModel();
        $this->domain_model             = new DomainModel();
        $this->domain_mapping_model     = new DomainMappingModel();
        //-----------------
        $this->extra_additional_field_model = new ExtraAdditionalFieldModel();
        $this->learning_aid_model       = new LearningAidModel();
        $this->db                       = $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [];
        $this->render_login('login', $data);

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
        if (!empty($data['parameters'])) {
            //step 1 - get Cluster
            $data['cluster_desc'] = $this->cluster_model
                ->where('cm_id', $data['parameters']['cluster_id'])->first();

            //step 2 - get Topic
            $data['topic_desc'] = $this->topic_model
                ->where('tm_id', $data['parameters']['topic_id'])->first();

            //step 3 - get Subject Via Learning Standard
            foreach ($data['parameters']['learning_standard_id'] as $ls_id) {
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
        $data['cluster_listing'] = $this->cluster_model->findAll();
        $data['years'] = range(1, 6); // Hardcoding years from 1 to 6

        $selectedYear = $this->request->getGet('year');
        if (empty($selectedYear)) {
            return redirect()->to(route_to('cluster_topic') . '?year=1');
        }

        if ($selectedYear) {
            // Filter topics by selected year
            $data['topik_main'] = $this->topic_model->where('tm_year', $selectedYear)->findAll();
            $data['selectedYear'] = $selectedYear;

            // Get clusters that have topics for the selected year
            $data['cluster'] = $this->cluster_model->select('cluster_main.*')
                ->join('topic_main', 'cluster_main.cm_id = topic_main.cm_id', 'inner')
                ->where('topic_main.tm_year', $selectedYear)
                ->groupBy('cluster_main.cm_id')
                ->findAll();

            // Set the hasData flag
            $data['hasData'] = !empty($data['topik_main']);
        } else {
            $data['topik_main'] = $this->topic_model->findAll();
            $data['selectedYear'] = '';

            // Get all clusters
            $data['cluster'] = $data['cluster_listing'];

            // Set the hasData flag
            $data['hasData'] = !empty($data['topik_main']);
        }

        $script = ['data', 'topic_list_in_cluster'];
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
    }

    public function dskpn_view($dskpn_id)
    {
        // Store tm_id in session
        $this->session->set('dskpn_id', $dskpn_id);
        // Redirect or load a view if needed
        return redirect()->to(route_to('dskpn_details'));
    }

    public function dskpn_details()
    {
        $dskpn_id = $this->session->get('dskpn_id');
        $dskpn_details = $this->dskpn_model->where('dskpn_id', $dskpn_id)->first();
        // Get DSKPN learning_standard
        $learning_standard = $this->learning_standard_model
            ->where('dskpn_id', $dskpn_id)
            ->findAll();

        $learning_standard_subject = $this->learning_standard_model
            ->select('learning_standard.sm_id, subject_main.sm_desc')
            ->join('subject_main', 'subject_main.sm_id = learning_standard.sm_id')
            ->where('dskpn_id', $dskpn_id)
            ->groupBy('sm_id')
            ->findAll();


        // Get standard_performance
        $standard_performance = $this->standard_performance_model
            ->join('subject_main', 'subject_main.sm_id = standard_performance.sm_id')
            ->where('dskpn_id', $dskpn_id)
            ->findAll();

        $objective_performance = $this->objective_performance_model->where('op_id', $dskpn_details['op_id'])->first();
        $activity_assessment = $this->activity_assessment_model->where('aa_id', $dskpn_details['aa_id'])->first();

        $core_competency    = $this->domain_model->where('dskpn_id', $dskpn_id)->findAll();

        $data = [
            'dskpn_details'             => $dskpn_details,
            'learning_standard_subject' => $learning_standard_subject,
            'learning_standard'         => $learning_standard,
            'standard_performance'      => $standard_performance,
            'objective_performance'     => $objective_performance,
            'activity_assessment'       => $activity_assessment,
            'core_competency'           => $core_competency,
            'dskpn_id'                  => $dskpn_id,
        ];

        $script = ['data', 'dynamic-input'];
        $style = ['static-field'];

        $this->render_jscss('dskpn_view', $data, $script, $style);
    }


    // 16 Domain Mapping View
    public function domain_mapping()
    {
        $data = [];

        $data['dskpn_id'] = $this->request->getVar('dskpn');
        $data['subjects'] = [];
        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            //steps 1 - get all subjects related to iterate horizontally
            //steps 1.1 - get learning standard to get list of subject.
            $data['subjects'] = $this->subject_model->select('subject_main.sm_code, subject_main.sm_desc')
                ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                ->where('ls.dskpn_id', $data['dskpn_id'])->find();
        }

        //steps 2 - get 4 mapping group components
        //steps 2.1 - get all id for 4 group_name
        $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Kualiti Keperibadian', 'Kemandirian', 'Pengetahuan Asas', '7 Kemahiran Insaniah'])->find();

        //steps 2.2 - get all item for all group
        //steps 2.3 - store all retrieved item

        foreach ($allGroup as $group) {
            $data[$group['dg_title']] = $this->domain_model->select('d_name, d_id')->where('gd_id', $group['dg_id'])->orderBy('d_id', 'ASC')->find();
        }

        $script = ['data', 'dynamic-input'];
        $style = ['static-field'];
        $this->render_jscss('domain_mapping', $data, $script, $style);
    }

    public function mapping_kompetensi_teras()
    {
        $data = [];

        $data['dskpn_id'] = $this->request->getVar('dskpn');
        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            //steps 1 - get all subjects related to iterate horizontally
            //steps 1.1 - get learning standard to get list of subject.
            $data['subjects'] = $this->subject_model->select('subject_main.sm_code, subject_main.sm_desc')
                ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                ->where('ls.dskpn_id', $data['dskpn_id'])->find();
        }

        $script = ['kompetensi-teras'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_kompetensi_teras', $data, $script, $style);
    }
    public function mapping_spesifikasi_dskpn()
    {
        $data = [];
        $data['dskpn_id'] = $this->request->getVar('dskpn');

        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();
        }

        //steps 1 - get 4 mapping group components
        //steps 1.1 - get all id for 4 group_name
        $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Reka Bentuk Instruksi', 'Integrasi Teknologi', 'Pendekatan', 'Kaedah'])->find();

        //steps 2.1 - get all item for all group
        //steps 2.2 - store all retrieved item

        foreach ($allGroup as $group) {
            $data[$group['dg_title']] = $this->domain_model->select('d_name, d_id')->where('gd_id', $group['dg_id'])->orderBy('d_id', 'ASC')->find();
        }

        $script = ['data', 'tp-dynamic-field', 'tp-autoload'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_spesifikasi_dskpn', $data, $script, $style);
    }

    public function activity_and_assessment()
    {
        $data = [];
        $data['dskpn_id'] = $this->request->getVar('dskpn');

        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();
        }

        $script = ['activity_assessment'];
        $style = ['static-field'];
        $this->render_jscss('mapping_assessment_and_activity', $data, $script, $style);
    }

    public function store_activity_assessment()
    {
        $dskpn_id = $this->request->getVar('dskpn');

        $abm = $this->request->getPost('abm');
        $pentaksiran = $this->request->getPost('pentaksiran');
        $idea_pengajaran = $this->request->getPost('idea-pengajaran');
        $parent_involve = $this->request->getPost('parent-involvement');

        if(!isset($parent_involve))
            $parent_involve = 'N';

        $success = true;

        if($this->activity_assessment_model->insert([
            'aa_activity_desc' => $idea_pengajaran,
            'aa_assessment_desc' => $pentaksiran,
            'aa_is_parental_involved' => $parent_involve
        ]))
        {
            if($this->dskpn_model->update($dskpn_id, ['aa_id' => $this->learning_aid_model->insertID()]))
            {} else {
                $success = false;
            }
            foreach ($abm as $data) {
                if($this->learning_aid_model->insert([
                    'la_desc' => $data,
                    'dskpn_id' => $dskpn_id
                ]))
                {} else {
                    $success = false;
                }
            }
        }

        if ($success)
            return redirect()->to(route_to('dskpn_complete'));
        return redirect()->back();
    }

    public function mapping_successfully()
    {
        $data = [];

        $script = [];
        $style = [];
        $this->render_jscss('mapping_successfully', $data, $script, $style);
    }

    public function store_specification_mapping()
    {
        $data = [];
        $dskpn_id = $this->request->getVar('dskpn');

        $allData = $this->request->getPost();

        $success = true;

        //structure data first
        foreach ($allData as $key => $data) {
            if($key != 'input-lain')
            {
                $parts = explode('-', $key);
                if ($parts[0] == 'input') {
                    $d_id = $parts[1];

                    if ($this->domain_mapping_model->insert([
                        'dm_isChecked' => 'Y',
                        'd_id' => $d_id,
                        'ls_id' => null,
                        'dskpn_id' => $dskpn_id
                    ])) {
                        // do nothing
                    } else {
                        $success = false;
                    }
                }
            } else {
                if ($this->domain_mapping_model->insert([
                    'dm_isChecked' => 'Y',
                    'd_id' => $data,
                    'ls_id' => null,
                    'dskpn_id' => $dskpn_id
                ])) {
                    // insert lain2 information
                    $inputlain = $allData['lain-lain-input'];
                    if($this->extra_additional_field_model->insert([
                        'eaf_desc' => $inputlain,
                        'dm_id' => $this->domain_mapping_model->insertID()
                    ]))
                    {
                        //do nothing
                    } else {
                        $success = false;
                    }
                } else {
                    $success = false;
                }
            }
        }

        if ($success)
            return redirect()->to(route_to('activity_n_assessment') . "?dskpn=" . $dskpn_id);
        return redirect()->back();
    }

    public function store_standard_learning()
    {
        $data = [];

        // Retrieve tm_id from session
        $sm_id          = $this->session->get('sm_id');

        $allSubject     = $this->request->getPost('subject');
        $allDescription = $this->request->getPost('subject_description');
        $objective      = $this->request->getPost('objective');
        $kluster        = $this->request->getPost('kluster');
        $topik          = $this->request->getPost('topik');
        $tema           = $this->request->getPost('tema');
        $subtema        = $this->request->getPost('subtema');

        $data['cluster_id'] = $kluster;
        $data['topic_id'] = $topik;

        //step 1 - add objective performance
        if ($this->objective_performance_model->insert([
            'op_desc' => $objective
        ]))
            if (is_array($allSubject) && is_array($allDescription)) {
                $data['objective_performance_id'] = $this->objective_performance_model->insertID();

                //create DSKPN
                $this->dskpn_model->insert([
                    'dskpn_theme'       => $tema,
                    'dskpn_sub_theme'   => $subtema,
                    'tm_id'             => $data['topic_id'],
                    'op_id'             => $data['objective_performance_id'],
                    'created_by'        => $sm_id,
                    'aa_id'             => null
                ]);

                $data['dskpn_id'] = $this->dskpn_model->insertID();

                foreach ($allSubject as $index => $subject) {
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
                        'dskpn_id' => $data['dskpn_id'] //temporary null
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
        $dskpn_id = $this->request->getVar('dskpn');

        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            //first repeatition max is only 4/5.
            $tempSubject = $this->subject_model->where('sm_code', $parts[1])->first();

            foreach ($data as $index => $item) {
                $tpLevel = $index + 1;
                $this->standard_performance_model->insert([
                    'sp_tp_level' => $tpLevel,
                    'sp_tp_level_desc' => $item,
                    'sm_id' => $tempSubject['sm_id'],
                    'dskpn_id' => $dskpn_id
                ]);
            }
        }
        return redirect()->to(route_to('domain_mapping') . "?dskpn=" . $dskpn_id);
    }

    public function store_domain_mapping()
    {
        $allData = $this->request->getPost();
        $dskpn_id = $this->request->getVar('dskpn');

        $success = true;

        //probably loop 2/3/4 time only. because input were put in arrays.
        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            if ($parts[0] == 'input') {
                //first repeatition max is only 4/5.
                $ls_id = $this->learning_standard_model->select('learning_standard.ls_id')
                    ->join('subject_main', 'subject_main.sm_code = ' . $this->db->escape($parts[1]))
                    ->where('learning_standard.sm_id = subject_main.sm_id')->first();

                foreach ($data as $d_id) {
                    if ($this->domain_mapping_model->insert([
                        'dm_isChecked' => 'Y',
                        'd_id' => $d_id,
                        'ls_id' => $ls_id['ls_id'],
                        'dskpn_id' => $dskpn_id
                    ])) {
                        // do nothing
                    } else {
                        $success = false;
                    }
                }
            }
        }

        if ($success)
            return redirect()->to(route_to('mapping_core') . "?dskpn=" . $dskpn_id);
        return redirect()->back();
    }

    public function store_core_mapping()
    {
        $allData = $this->request->getPost();
        $dskpn_id = $this->request->getVar('dskpn');

        //check if not exist create new one
        $kompetensi_domain_group = $this->domain_group_model->where('dg_title', 'Kompetensi Teras')->first();

        if (empty($kompetensi_domain_group)) {
            $this->domain_group_model->insert([
                'dg_title' => 'Kompetensi Teras'
            ]);

            $kompetensi_domain_group['dg_id'] = $this->domain_group_model->insertID();
        }

        $processedData = [];

        //structure data first
        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            if ($parts[0] == 'input') {
                $inputIndex = $parts[1];
                foreach ($data as $index => $value) {
                    $processedData[$inputIndex][] = [
                        'value' => $value,
                        'checked' => (($allData['checked-' . $inputIndex][$index]) == 'off') ? 'N' : 'Y'
                    ];
                }
            }
        }

        //loop to store
        //1. loop to get key - subject
        foreach ($processedData as $key => $inputCode) {
            //1.1 get sm_id based on inputCodeKey
            $sm_id = $this->subject_model->where('sm_code', $key)->first()['sm_id'];

            //1.2 get ls_id based on $sm_id
            $ls_id = $this->learning_standard_model->where('dskpn_id', $dskpn_id)->where('sm_id', $sm_id)->first()['ls_id'];

            //2. loop to get value inside that inputcode
            foreach ($inputCode as $input) {
                //3. store domain first.
                $this->domain_model->insert([
                    'd_name' => $input['value'],
                    'gd_id' => $kompetensi_domain_group['dg_id'],
                    'sm_id' => $sm_id,
                    'dskpn_id' => $dskpn_id
                ]);

                $d_id = $this->domain_model->insertID();

                //4. do mapping part
                $this->domain_mapping_model->insert([
                    'dm_isChecked' => $input['checked'],
                    'd_id' => $d_id,
                    'ls_id' => $ls_id,
                    'dskpn_id' => $dskpn_id
                ]);
            }
        }

        return redirect()->to(route_to('mapping_dynamic_dskpn') . "?dskpn=" . $dskpn_id);
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

        //5. Reka Bentuk Instruksi
        $tempEName = "Reka Bentuk Instruksi";
        $tempEAtt = [
            ['Active Learning', 0],
            ['Collaborative Learning', 0],
            ['Constructive Learning', 0],
            ['Authentic Learning', 0],
            ['Goal-Directed Learning', 0]
        ];

        //6. Integrasi Teknologi
        $tempFName = "Integrasi Teknologi";
        $tempFAtt = [
            ['Entry Level', 0],
            ['Adaptation Level', 0],
            ['Infussion Level', 0],
            ['Transformation Level', 0],
            ['Goal-Directed Learning', 0]
        ];

        //7. Pendekatan
        $tempGName = "Pendekatan";
        $tempGAtt = [
            ['Inkuiri', 0],
            ['Berasaskan Masalah', 0],
            ['Berasaskan Projek', 0],
            ['Pembelajaran Masteri', 0],
            ['Kontekstual', 0],
            ['Berasaskan Pengalaman', 0]
        ];

        //8. Kaedah
        $tempHName = "Kaedah";
        $tempHAtt = [
            ['Simulasi', 0],
            ['Main Peranan', 0],
            ['Nyanyian', 0],
            ['Bercerita', 0],
            ['Lain-lain', 0]
        ];

        //before start - check if exist no need
        if (
            !empty($this->domain_group_model->where('dg_title', $tempAName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempBName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempCName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempDName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempEName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempFName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempGName)->first()) &&
            !empty($this->domain_group_model->where('dg_title', $tempHName)->first())
        )
            return "Already initiated";

        //calling
        if (
            $this->_mappingInitializer($tempAName, $tempAAtt) &&
            $this->_mappingInitializer($tempBName, $tempBAtt) &&
            $this->_mappingInitializer($tempCName, $tempCAtt) &&
            $this->_mappingInitializer($tempDName, $tempDAtt) &&
            $this->_mappingInitializer($tempEName, $tempEAtt) &&
            $this->_mappingInitializer($tempFName, $tempFAtt) &&
            $this->_mappingInitializer($tempGName, $tempGAtt) &&
            $this->_mappingInitializer($tempHName, $tempHAtt)
        )
            return "OK!";
        return "Fails!";
    }

    //private use function
    private function _mappingInitializer($name, $attributes) //attributes is array of an array of 2 elements (domain name and not_sureYet_id).
    {
        //steps 1 - domain group
        if ($this->domain_group_model->insert([
            'dg_title' => $name
        ])) {
            //step 2 - add domain inside domain_group
            $lastID = $this->domain_group_model->insertID();
            $flag = false;
            foreach ($attributes as $item) {
                if ($this->domain_model->insert([
                    'd_name' => $item[0],
                    'gd_id' => $lastID,
                    'sm_id' => null,
                    'dskpn_id' => null
                ])) {
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            if ($flag == false)
                return true;
        }
        return false;
    }

    private function _generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Display List of DSKPN by ID
    public function dskpn_by_topic($tm_id)
    {
        // Store tm_id in session
        $this->session->set('tm_id', $tm_id);
        // Redirect or load a view if needed
        return redirect()->to(route_to('dskpn_by_topic_list'));
    }
    // Displays a list of DSKPN page
    public function dskpn_by_topic_list()
    {
        // Retrieve tm_id from session
        $tm_id = $this->session->get('tm_id');
        // Check if tm_id is set in the session
        if (!$tm_id) {
            dd('error');
        }

        // Query to get the list of DSKPN
        $data['dskpn'] = $this->dskpn_model
            ->join('topic_main', 'dskpn.tm_id = topic_main.tm_id', 'left')
            ->where('dskpn.tm_id', $tm_id)
            ->findAll();

        // Query get kluster data
        $data['kluster'] = $this->cluster_model->findAll();

        // Query get topic data
        $data['topic'] = $this->topic_model
            ->join('cluster_main', 'topic_main.cm_id = cluster_main.cm_id', 'left')
            ->where('topic_main.tm_id', $tm_id)
            ->first();

        // Scripts and styles
        $script = ['dynamic-input'];
        $style = ['static-field'];

        // Render the view
        $this->render_jscss('dskpn_by_topic', $data, $script, $style);
    }


    public function create_dskpn($tm_id)
    {
        // Store tm_id in session
        $this->session->set('tm_id', $tm_id);
        // Redirect or load a view if needed
        return redirect()->to(route_to('dskpn_learning_standard') . "?flag=true");
    }

    public function dskpn_learning_standard()
    {

        $tm_id = $this->session->get('tm_id');
        $data['flag'] = $this->request->getVar('flag');
        // Query get topic data
        if (!empty($data['flag'])) {
            $data['topic'] = $this->topic_model
                ->join('cluster_main', 'topic_main.cm_id = cluster_main.cm_id', 'left')
                ->where('topic_main.tm_id', $tm_id)
                ->first();
        } else {
            $data['kluster'] = $this->cluster_model->findAll();
        }

        $script = ['data', 'dynamic-input'];
        $style = ['static-field'];
        $this->render_jscss('learning_standard', $data, $script, $style);
    }

    public function store_create_cluster()
    {
        $data = [
            'cm_code' => $this->request->getVar('cm_code'),
            'cm_desc' => $this->request->getVar('cm_desc')
        ];

        if ($this->cluster_model->insert($data)) {
            return redirect()->back()->with('success', 'Berjaya menambah Cluster!');
        }

        return redirect()->back()->with('fail', 'Maaf, aksi menambah Cluster tidak berjaya!');
    }
}
