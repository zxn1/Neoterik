<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

//model
use App\Modules\Dskpn\Models\DskpnModel;
use App\Modules\Dskpn\Models\DomainModel;
use App\Modules\Dskpn\Models\TopicMainModel;
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Dskpn\Models\DomainGroupModel;
use App\Modules\Dskpn\Models\LearningAidModel;
use App\Modules\Dskpn\Models\SubjectMainModel;

use App\Modules\Dskpn\Models\DomainMappingModel;
use App\Modules\Dskpn\Models\LearningStandardModel;
use App\Modules\Dskpn\Models\LearningStandardItemModel;
use App\Modules\Dskpn\Models\ActivityItemModel;
use App\Modules\Dskpn\Models\StandardPerformanceModel;

//mapping model import
use App\Modules\Dskpn\Models\ObjectivePerformanceModel;
use App\Modules\Dskpn\Models\ClusterSubjectMappingModel;
//-----

class Main extends BaseController
{

    protected $cluster_model;
    protected $topic_model;
    protected $subject_model;
    protected $learning_standard_model;
    protected $learning_standard_item_model;
    protected $objective_performance_model;
    //protected $activity_assessment_model;
    protected $activity_item_model;
    protected $standard_performance_model;
    protected $dskpn_model;

    //mapping model sets
    protected $domain_group_model;
    protected $domain_model;
    protected $domain_mapping_model;

    // subject cluster mapping model
    protected $cluster_subject_mapping_model;
    //-----------------
    //protected $extra_additional_field_model;
    protected $method_extra_model;
    protected $learning_aid_model;
    protected $db;

    public function __construct()
    {
        $this->session                      = service('session');
        $this->cluster_model                = new ClusterMainModel();
        $this->topic_model                  = new TopicMainModel();
        $this->subject_model                = new SubjectMainModel();
        $this->learning_standard_model      = new LearningStandardModel();
        $this->learning_standard_item_model = new LearningStandardItemModel();
        $this->objective_performance_model  = new ObjectivePerformanceModel();
        $this->activity_item_model          = new ActivityItemModel();
        //$this->activity_assessment_model    = new ActivityAssessmentModel();
        $this->standard_performance_model   = new StandardPerformanceModel();
        $this->dskpn_model                  = new dskpnModel();
        //mapping model init
        $this->domain_group_model       = new DomainGroupModel();
        $this->domain_model             = new DomainModel();
        $this->domain_mapping_model     = new DomainMappingModel();

        $this->cluster_subject_mapping_model    = new ClusterSubjectMappingModel();
        //-----------------
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

        $data['tp_session'] = $this->session->get("tp_sess_data");

        $ex_dskpn = $this->session->get('ex_dskpn');
        $sess_data_desc = [];

        $data['parameters'] = $this->session->get();
        if (!empty($data['parameters'])) {
            //step 1 - get Cluster
            $data['cluster_desc'] = $this->cluster_model
                ->where('ctm_id', $data['parameters']['cluster_id'])->first();

            //step 2 - get Topic
            $data['topic_desc'] = $this->topic_model
                ->where('tm_id', $data['parameters']['topic_id'])->first();

            //step 3 - get Subject Via Learning Standard
            foreach ($data['parameters']['learning_standard_id'] as $ls_id) {
                $query = $this->db->table('subject_main')
                    ->select('subject_main.*')
                    ->join('learning_standard', 'learning_standard.ls_sbm_id = subject_main.sbm_id')
                    ->where('learning_standard.ls_id', $ls_id)
                    ->get();

                $data['subjects'][] = $query->getResult();
            }

            if(!empty($ex_dskpn) && empty($data['tp_session']))
            {
                $tp_ex_data = $this->standard_performance_model->where('dskpn_id', $ex_dskpn['dskpn_id'])->orderBy('sp_tp_level', 'ASC')->findAll();
                foreach($data['subjects'] as $item)
                {
                    $sess_data_desc[$item[0]->sm_desc][] = [$item[0]->sm_id];

                    $tp_listing = [];
                    foreach($tp_ex_data as $tp_item)
                    {
                        if($tp_item['sm_id'] == $item[0]->sm_id)
                        {
                            // $sess_data_desc[$item[0]->sm_desc][$item[0]->sm_id][] = $tp_item['sp_tp_level_desc'];
                            $tp_listing[] = $tp_item['sp_tp_level_desc'];
                        }
                    }

                    $sess_data_desc[$item[0]->sm_desc][0][] = $tp_listing;
                }

                $data['tp_session'] = $sess_data_desc;
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
                ->join('topic_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id', 'inner')
                ->where('topic_main.tm_year', $selectedYear)
                ->groupBy('cluster_main.ctm_id')
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

    public function view_subject()
    {
        $data = [];
        $data['subjects'] = $this->subject_model->findAll();
        // dd($data['subjects']);
        $script = ['data', 'view_subject'];
        $style = ['view_subject'];
        $this->render_jscss('view_subject', $data, $script, $style);
    }

    public function view_cluster()
    {
        $data = [];
        $data['clusters'] = $this->cluster_model->findAll();
        // dd($data['subjects']);
        $script = ['data', 'view_subject'];
        $style = ['view_subject'];
        $this->render_jscss('view_cluster', $data, $script, $style);
    }

    public function list_registered_dskpn()
    {
        $this->session->set('ex_dskpn_code_init', null); //reset
        $data = [];
        // $data['cluster'] = $this->cluster_model->select('cluster_main.*, topic_main.*')
        //     ->join('topic_main', 'topic_main.cm_id = cluster_main.cm_id')
        //     ->findAll();

        // Query to get the list of DSKPN
        $data['dskpn'] = $this->dskpn_model
            ->join('topic_main', 'dskpn.tm_id = topic_main.tm_id', 'left')
            ->join('cluster_main', 'topic_main.cm_id = cluster_main.cm_id', 'left')
            ->findAll();

        // dd($data['dskpn']);

        $script = ['data', 'list_registered_dskpn'];
        $style = ['static-field'];
        $this->render_jscss('list_registered_dskpn', $data, $script, $style);
    }

    public function request_to_delete_dskpn()
    {
        $dskpn_id = $this->request->getVar('dskpn_id');
        $reason = $this->request->getVar('reason');
        if (empty($dskpn_id))
            return "Tiada parameter DSKPN dihantar! Gagal!";

        if ($this->dskpn_model->update($dskpn_id, [
            'dskpn_status'  => 3,
            'dskpn_delete_reason' => $reason
        ])) {
            return redirect()->back()->with('success', 'Permintaan memadam DSKPN berjaya dihantar');
        }

        return redirect()->back()->with('fail', 'Permintaan memadam DSKPN gagal!');
    }

    public function get_delete_reason()
    {
        $dskpn_id = $this->request->getVar('dskpn_id');
        $response = [
            'status' => 'fail'
        ];

        $data = $this->dskpn_model->select('dskpn_delete_reason')->where('dskpn_id', $dskpn_id)->first();
        if (!empty($data)) {
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        }
        return $this->response->setJSON($response);
    }

    public function to_delete_dskpn()
    {
        $dskpn_id = $this->request->getVar('dskpn_id');
        if (empty($dskpn_id))
            return "Tiada parameter DSKPN dihantar! Gagal!";

        if ($this->dskpn_model->update($dskpn_id, [
            'dskpn_status'  => 4
        ]))
            if ($this->dskpn_model->where('dskpn_id', $dskpn_id)->delete()) {
                return redirect()->back()->with('success', 'DSKPN berjaya dipadam');
            }

        return redirect()->back()->with('fail', 'DSKPN gagal dipadam!');
    }

    public function cancel_to_delete_dskpn()
    {
        $dskpn_id = $this->request->getVar('dskpn_id');
        if (empty($dskpn_id))
            return "Tiada parameter DSKPN dihantar! Gagal!";

        if ($this->dskpn_model->update($dskpn_id, [
            'dskpn_status'  => null,
            'approved_by'   => null,
            'deleted_at'    => null,
            'dskpn_remarks' => null
        ])) {
            return redirect()->back()->with('success', 'Permintaan memadam DSKPN berjaya dibatalkan');
        }

        return redirect()->back()->with('fail', 'Permintaan memadam DSKPN gagal dibatalkan!');
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
        $db = \Config\Database::connect();

        $dskpn_id = $this->session->get('dskpn_id');
        $dskpn_details = $this->dskpn_model->where('dskpn_id', $dskpn_id)->first();
        // Get DSKPN learning_standard
        $learning_standard = $this->learning_standard_model
            ->where('dskpn_id', $dskpn_id)
            ->findAll();

        $subjects = $this->learning_standard_model
            ->select('learning_standard.sm_id, subject_main.sm_desc, subject_main.sm_code')
            ->join('subject_main', 'subject_main.sm_id = learning_standard.sm_id')
            ->where('dskpn_id', $dskpn_id)
            ->groupBy('sm_id')
            ->findAll();

        //Get topic main by tm_id
        $tm_details = $this->topic_model->where('tm_id', $dskpn_details['tm_id'])->first();

        // Get cluster based on tm_id cm_id
        $cluster_details = $this->cluster_model->where('cm_id', $tm_details['cm_id'])->first();

        // Get standard_performance
        $standard_performance = $this->standard_performance_model
            ->join('subject_main', 'subject_main.sm_id = standard_performance.sm_id')
            ->where('dskpn_id', $dskpn_id)
            ->findAll();

        $objective_performance = $this->objective_performance_model->where('op_id', $dskpn_details['op_id'])->first();
        $activity_assessment = $this->activity_assessment_model->where('aa_id', $dskpn_details['aa_id'])->first();

        $core_competency    = $this->domain_model->where('dskpn_id', $dskpn_id)->findAll();

        // Get 16 Domain List by tahap
        // Tahap Pengetahuan Asas
        $template_domain_pengetahuan_asas = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Pengetahuan Asas')->orderBy('d_id', 'ASC')->findAll();
        $domain_pengetahuan_asas = $this->domain_mapping_model->getDomain($dskpn_id, 'Pengetahuan Asas');

        // Tahap Kemandirian
        $template_domain_kemandirian = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Kemandirian')->orderBy('d_id', 'ASC')->findAll();
        $domain_kemandirian =  $this->domain_mapping_model->getDomain($dskpn_id, 'Kemandirian');

        // Tahap Pengetahuan Asas
        $template_domain_kualiti_keperibadian  = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Kualiti Keperibadian')->orderBy('d_id', 'ASC')->findAll();
        $domain_kualiti_keperibadian =  $this->domain_mapping_model->getDomain($dskpn_id, 'Kualiti Keperibadian');

        // Get 7 Kemahiran Insaniah
        $template_kemahiran_insaniah = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', '7 Kemahiran Insaniah')->orderBy('d_id', 'ASC')->findAll();
        $kemahiran_insaniah =  $this->domain_mapping_model->getDomain($dskpn_id, '7 Kemahiran Insaniah');

        // Reka bentuk Instruksi
        $template_rekabentuk_instruksi = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Reka Bentuk Instruksi')->orderBy('d_id', 'ASC')->findAll();
        $rekabentuk_instruksi =  $this->domain_mapping_model->getAtribute($dskpn_id, 'Reka Bentuk Instruksi');

        // Integrasi Teknologi
        $template_integrasi_teknologi = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Integrasi Teknologi')->orderBy('d_id', 'ASC')->findAll();
        $integrasi_teknologi =  $this->domain_mapping_model->getAtribute($dskpn_id, 'Integrasi Teknologi');

        // Pendekatan
        $template_pendekatan = $this->domain_model->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Pendekatan')->orderBy('d_id', 'ASC')->findAll();
        $pendekatan =  $this->domain_mapping_model->getAtribute($dskpn_id, 'Pendekatan');

        // Kaedah
        $template_kaedah = $this->domain_model
            ->join('domain_group', 'domain_group.dg_id = domain.gd_id')->where('domain_group.dg_title', 'Kaedah')->orderBy('d_id', 'ASC')->findAll();
        $kaedah =  $this->domain_mapping_model->getAtribute($dskpn_id, 'Kaedah');

        // abm
        $abm = $this->learning_aid_model->where('dskpn_id', $dskpn_id)->findAll();

        $data = [
            'dskpn_details'                 => $dskpn_details,
            'tm_details'                    => $tm_details,
            'cluster_details'               => $cluster_details,
            'subjects'                      => $subjects,
            'learning_standard'             => $learning_standard,
            'standard_performance'          => $standard_performance,
            'objective_performance'         => $objective_performance,
            'activity_assessment'           => $activity_assessment,
            'core_competency'               => $core_competency,
            'dskpn_id'                      => $dskpn_id,
            'domain_pengetahuan_asas'       => $domain_pengetahuan_asas,
            'domain_kemandirian'            => $domain_kemandirian,
            'domain_kualiti_keperibadian'   => $domain_kualiti_keperibadian,
            'kemahiran_insaniah'            => $kemahiran_insaniah,
            'rekabentuk_instruksi'          => $rekabentuk_instruksi,
            'integrasi_teknologi'           => $integrasi_teknologi,
            'pendekatan'                    => $pendekatan,
            'kaedah'                        => $kaedah,
            'abm'                           => $abm,

            // Template Atribute/Domain
            'template_domain_pengetahuan_asas'      => $template_domain_pengetahuan_asas,
            'template_domain_kemandirian'           => $template_domain_kemandirian,
            'template_domain_kualiti_keperibadian'  => $template_domain_kualiti_keperibadian,
            'template_kemahiran_insaniah'           => $template_kemahiran_insaniah,
            'template_rekabentuk_instruksi'         => $template_rekabentuk_instruksi,
            'template_integrasi_teknologi'          => $template_integrasi_teknologi,
            'template_pendekatan'                   => $template_pendekatan,
            'template_kaedah'                       => $template_kaedah,
        ];

        // dd($kemahiran_insaniah);
        // dd($data);

        $script = ['dynamic-input', 'dskpn_view'];
        $style = ['static-field'];

        // dd($data);
        $this->render_jscss('dskpn_view', $data, $script, $style);
    }

    public function approve_dskpn($dskpn_id)
    {
        $staff_main_id = $this->session->get('sm_id');

        // Update DSKPN table
        $this->dskpn_model->update($dskpn_id, [
            'dskpn_status'  => 1,
            'approved_by'   => $staff_main_id,
            'approved_at'   => date('Y-m-d H:i:s')
        ]);

        // Set success message and redirect back
        session()->setFlashdata('swal_success', 'DSKPN has been approved successfully.');

        return redirect()->back();
    }

    public function reject_dskpn()
    {
        $remarks        = $this->request->getPost('remarks');
        $dskpn_id       = $this->request->getPost('dskpn_id');
        $staff_main_id  = $this->session->get('sm_id');

        // Update DSKPN table
        $this->dskpn_model->update($dskpn_id, [
            'dskpn_status'  => 2,
            'approved_by'   => $staff_main_id,
            'approved_at'   => date('Y-m-d H:i:s'),
            'dskpn_remarks' => $remarks
        ]);


        // Set success message and redirect back
        session()->setFlashdata('swal_success', 'DSKPN has been rejected.');

        return redirect()->back();
    }


    // 16 Domain Mapping View
    public function domain_mapping()
    {
        $data = [];

        $data['domain_map_session'] = $this->session->get("domain_map_session");

        //if update then, get from db
        $is_update = $this->session->get("is_update");
        $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        if(isset($is_update) && empty($data['domain_map_session']))
        {
            $temp_domain_mapping_db = $this->domain_mapping_model
                                    ->join('domain', 'domain_mapping.d_id = domain.d_id', 'left')
                                    ->join('learning_standard', 'domain_mapping.ls_id = learning_standard.ls_id', 'left')
                                    ->join('subject_main', 'learning_standard.sm_id = subject_main.sm_id', 'left')
                                    ->join('domain_group', 'domain_group.dg_id = domain.gd_id')
                                    ->where('domain_mapping.dskpn_id', $ex_dskpn_id)
                                    ->whereIn('domain_group.dg_title', ['Pengetahuan Asas', 'Kemandirian', 'Kualiti Keperibadian'])
                                    ->findAll();

            $temp_domain_map = [];

            foreach($temp_domain_mapping_db as $item)
            {
                $temp_domain_map['\'' . $item['sm_code'] . '\''][] = $item['d_id'];
            }
            
            $data['domain_map_session'] = $temp_domain_map;
        }

        $data['dskpn_id'] = $this->session->get("dskpn_id");
        $data['subjects'] = [];
        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            //steps 1 - get all subjects related to iterate horizontally
            //steps 1.1 - get learning standard to get list of subject.
            $data['subjects'] = $this->subject_model->select('subject_main.sm_id, subject_main.sm_code, subject_main.sm_desc')
                ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                ->where('ls.dskpn_id', $data['dskpn_id'])->where('ls.deleted_at', null)->findAll();
        }

        //steps 2 - get 4 mapping group components
        //steps 2.1 - get all id for 4 group_name
        $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Kualiti Keperibadian', 'Kemandirian', 'Pengetahuan Asas', '7 Kemahiran Insaniah'])->find();
        $rules_7ki = [
            '(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Masalah' => [
                'DKM2: Numerasi (N)',
                'DKM3: Literasi Saintifik (LS)',
                '(DKM7) Pemikiran Kritis & Penyelesaian Masalah (PKPM)',
                '(DKM8) Kreativiti (Kr)',
                '(DKM11) Inkuiri (Ik)'
            ],
            '(KI2) Kemahiran Komunikasi' => [
                'DKM1: Literasi (L)',
                '(DKM9) Komunikasi (Kom)'
            ],
            '(KI3) Kemahiran Kepimpinan' => [
                '(DKM16) Kepimpinan (Kp)'
            ],
            '(KI4) Kemahiran Kerja Berpasukan' => [
                '(DKM10) Kolaborasi (K)'
            ],
            '(KI5) Pembelajaran Berterusan Dan Pengurusan Maklumat' => [
                'DKM4: Literasi ICT (LICT)',
                '(DKM12) Inisiatif',
                '(DKM13) Kegigihan',
                '(DKM14) Penyesuaian Diri (PD)'
            ],
            '(KI6) Kemahiran Keusahawanan' => [
                '(DKM5) Literasi Kewangan (LW)'
            ],
            '(KI7) Moral dan Etika Profesional' => [
                '(DKM6) Literasi Kebudayaan Sivik dan Nilai (LKSN)',
                '(DKM15) Kesedaran Sosial & Budaya (KSB)'
            ]
        ];
        $ki_rules = [];

        //steps 2.2 - get all item for all group
        //steps 2.3 - store all retrieved item
        $tempDomainz = [];
        foreach ($allGroup as $group) {
            $data[$group['dg_title']] = $this->domain_model->select('d_name, d_id')->where('gd_id', $group['dg_id'])->orderBy('d_id', 'ASC')->find();

            //get all domain
            foreach ($data[$group['dg_title']] as $domainz) {
                $tempDomainz[] = $domainz;
            }
        }

        //convert rules into d_id
        foreach ($rules_7ki as $key => $domainz) //loop KI
        {
            $cur_d_id = "";
            foreach ($tempDomainz as $d) {
                if ($d['d_name'] == $key) {
                    $ki_rules[$d['d_id']] = null; //create array with related key first
                    $cur_d_id = $d['d_id'];
                }
            }

            //loop rules inside KI
            foreach ($domainz as $rule) {
                foreach ($tempDomainz as $d) {
                    if ($d['d_name'] == $rule) {
                        $ki_rules[$cur_d_id][] = $d['d_id'];
                    }
                }
            }
        }

        // dd($ki_rules);
        $data['ki_rules'] = $ki_rules;

        $script = ['data', 'dynamic-input', 'kemahiran_insaniah'];
        $style = ['static-field'];
        $this->render_jscss('domain_mapping', $data, $script, $style);
    }

    public function mapping_kompetensi_teras()
    {
        $data = [];

        $data['core_map_sess'] = $this->session->get("core_map_sess");
        // $data['core_maplist_sess'] = $this->session->get("core_maplist_sess");

        //if update then, get from db
        $is_update = $this->session->get("is_update");
        $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        if(isset($is_update) && empty($data['core_map_sess']))
        {
            $temp_core_mapping_db = $this->domain_mapping_model
                                    ->join('domain', 'domain_mapping.d_id = domain.d_id', 'left')
                                    ->join('subject_main', 'domain.sm_id = subject_main.sm_id', 'left')
                                    ->join('domain_group', 'domain_group.dg_id = domain.gd_id')
                                    ->where('domain_mapping.dskpn_id', $ex_dskpn_id)
                                    ->where('domain_group.dg_title', 'Kompetensi Teras')
                                    ->findAll();

            $temp_core_map = [];
            foreach($temp_core_mapping_db as $item)
            {
                $temp_core_map[$item['sm_code']][$item['dm_id']] = [$item['d_name'], $item['dm_isChecked']];
            }

            $data['core_map_sess'] = $temp_core_map;
        }

        $data['dskpn_id'] = $this->session->get("dskpn_id");
        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            //steps 1 - get all subjects related to iterate horizontally
            //steps 1.1 - get learning standard to get list of subject.
            $data['subjects'] = $this->subject_model->select('subject_main.sm_code, subject_main.sm_desc')
                ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                ->where('ls.dskpn_id', $data['dskpn_id'])->where('ls.deleted_at', null)->findAll();
        }

        $script = ['kompetensi-teras'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_kompetensi_teras', $data, $script, $style);
    }
    public function mapping_spesifikasi_dskpn()
    {
        $data = [];
        $data['dskpn_id'] = $this->session->get("dskpn_id");

        $data['specification_maplist'] = $this->session->get("specification_mapist_sess");
        $data['specification_lain_lain'] = $this->session->get("specification_lain_lain_sess");

        //if update then, get from db
        $is_update = $this->session->get("is_update");
        $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        if(isset($is_update) && empty($data['specification_maplist']))
        {
            $temp_specification_mapping_db = $this->domain_mapping_model
                                    ->join('domain', 'domain_mapping.d_id = domain.d_id', 'left')
                                    ->join('domain_group', 'domain_group.dg_id = domain.gd_id')
                                    ->join('extra_additional_field', 'extra_additional_field.dm_id = domain_mapping.dm_id', 'left')
                                    ->where('domain_mapping.dskpn_id', $ex_dskpn_id)
                                    ->whereIn('domain_group.dg_title', ['Reka Bentuk Instruksi', 'Integrasi Teknologi', 'Pendekatan', 'Kaedah'])
                                    ->findAll();

            $temp_specification_map = [];
            foreach($temp_specification_mapping_db as $item)
            {
                $temp_specification_map[] = $item['d_id'];
                if($item['eaf_desc'] != null || !empty($item['eaf_desc']))
                    $data['specification_lain_lain'] = $item['eaf_desc'];
            }

            $data['specification_maplist'] = $temp_specification_map;
        }

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

        $script = ['mapping_spesification'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_spesifikasi_dskpn', $data, $script, $style);
    }

    public function activity_and_assessment()
    {
        $data = [];
        $data['review'] = $this->request->getVar('review');
        $data['dskpn_id'] = $this->session->get("dskpn_id");

        $data['act_assess_abm'] = $this->session->get("act_assess_abm");
        $data['act_assess_pentaksiran'] = $this->session->get("act_assess_pentaksiran");
        $data['act_assess_idea_pengajaran'] = $this->session->get("act_assess_idea_pengajaran");
        $data['act_assess_parent_involve'] = $this->session->get("act_assess_parent_involve");

        //if update then, get from db
        $is_update = $this->session->get("is_update");
        $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        if(isset($is_update) && empty($data['act_assess_idea_pengajaran']))
        {
            $temp_act_asses_mapping_db = $this->dskpn_model
                                         ->join('activity_assessment', 'activity_assessment.aa_id = dskpn.aa_id')
                                         ->where('dskpn_id', $ex_dskpn_id)
                                         ->first();
            
            $temp_abm_list = $this->learning_aid_model->select('la_desc')->where('dskpn_id', $ex_dskpn_id)->findAll();

            if(!empty($temp_act_asses_mapping_db))
            {
                $data['act_assess_pentaksiran'] = $temp_act_asses_mapping_db['aa_assessment_desc'];
                $data['act_assess_idea_pengajaran'] = $temp_act_asses_mapping_db['aa_activity_desc'];
                $data['act_assess_parent_involve'] = $temp_act_asses_mapping_db['aa_is_parental_involved'];
            }

            // Initialize
            $data['act_assess_abm'] = [];

            // Iterate over the results and add 'la_desc' values to the output array
            foreach ($temp_abm_list as $result) {
                $data['act_assess_abm'][] = $result['la_desc'];
            }
        }

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
        $dskpn_id = $this->session->get("dskpn_id");

        $abm = $this->request->getPost('abm');
        $pentaksiran = $this->request->getPost('pentaksiran');
        $idea_pengajaran = $this->request->getPost('idea-pengajaran');
        $parent_involve = $this->request->getPost('parent-involvement');

        $get_actvty_assess_map_id = $this->session->get("actvty_assess_map_id_sess");
        $get_actvty_assess_learning_aid_id = $this->session->get("actvty_assess_learning_aid_id_sess");

        if (isset($get_actvty_assess_map_id) && isset($get_actvty_assess_learning_aid_id)) {
            $this->activity_assessment_model->where('aa_id', $get_actvty_assess_map_id)
                ->delete();
            $this->learning_aid_model->whereIn('la_id', $get_actvty_assess_learning_aid_id)
                ->delete();
        }

        $this->session->set('act_assess_abm', $abm);
        $this->session->set('act_assess_pentaksiran', $pentaksiran);
        $this->session->set('act_assess_idea_pengajaran', $idea_pengajaran);
        $this->session->set('act_assess_parent_involve', $parent_involve);

        $actvty_assess_map_id = "";
        $actvty_assess_learning_aid_id = [];

        if (!isset($parent_involve))
            $parent_involve = 'N';

        $success = true;

        if ($this->activity_assessment_model->insert([
            'aa_activity_desc' => $idea_pengajaran,
            'aa_assessment_desc' => $pentaksiran,
            'aa_is_parental_involved' => $parent_involve
        ])) {
            $actvty_assess_map_id = $this->activity_assessment_model->insertID();
            if ($this->dskpn_model->update($dskpn_id, ['aa_id' => $actvty_assess_map_id])) {
            } else {
                $success = false;
            }
            foreach ($abm as $data) {
                if ($this->learning_aid_model->insert([
                    'la_desc' => $data,
                    'dskpn_id' => $dskpn_id
                ])) {
                    $actvty_assess_learning_aid_id[] = $this->learning_aid_model->insertID();
                } else {
                    $success = false;
                }
            }
        }

        $this->session->set('actvty_assess_map_id_sess', $actvty_assess_map_id);
        $this->session->set('actvty_assess_learning_aid_id_sess', $actvty_assess_learning_aid_id);

        if ($success)
            return redirect()->to(route_to('activity_n_assessment') . "?review=true");
        return redirect()->back();
    }

    public function mapping_successfully()
    {
        $data = [];
        $data['dskpn_id'] = $this->session->get("dskpn_id");
        $data['dskpn_code'] = $this->session->get("dskpn_code");

        //remove all session
        $sess_keys = [
            'subject',
            'subject_description',
            'objective',
            'tema',
            'subtema',
            'tm_id',
            'cluster_id',
            'topic_id',
            'objective_performance_id',
            'dskpn_id',
            'learning_standard_id',
            'tp_sess_data',
            'core_map_sess',
            'core_mapping_id_session_data',
            'domain_map_session',
            'domain_map_id_session_data',
            'specification_mapist_sess',
            'specification_lain_lain_sess',
            'specification_mapping_id_list_sess',
            'specification_lain_lain_id_sess',
            'act_assess_abm',
            'act_assess_pentaksiran',
            'act_assess_idea_pengajaran',
            'act_assess_parent_involve',
            'actvty_assess_map_id_sess',
            'actvty_assess_learning_aid_id_sess',
            'dskpn_code',
            'dskpn_code_init',
            'is_update',
            'ex_dskpn_id',
            'ex_dskpn',
            'duration'
        ];

        // Remove each session key
        foreach ($sess_keys as $key) {
            $this->session->remove($key);
        }

        $script = [];
        $style = [];
        $this->render_jscss('mapping_successfully', $data, $script, $style);
    }

    public function set_session_edit_dskpn($ex_dskpn_id)
    {
        //set all attribute
        $this->session->set('is_update', true); //need to check if currently update process
        if(!empty($ex_dskpn_id))
            $this->session->set('ex_dskpn_id', $ex_dskpn_id);
        
        //ex_dskpn
        $dskpn = $this->dskpn_model->where('dskpn_id', $ex_dskpn_id)
                ->join('objective_performance', 'objective_performance.op_id = dskpn.op_id')->first();

        $this->session->set('ex_dskpn', $dskpn);

        $learning_standard = $this->learning_standard_model->where('dskpn_id', $ex_dskpn_id)
                            ->join('subject_main', 'subject_main.sm_id = learning_standard.sm_id')
                            ->findAll();

        $subject = [];
        $subject_description = [];
        foreach($learning_standard as $item)
        {
            $subject[] = $item['sm_id'];
            $subject_description[] = $item['ls_details'];
        }

        $this->session->set('subject', $subject);
        $this->session->set('subject_description', $subject_description);
        $this->session->set('objective', $dskpn['op_desc']);
        $this->session->set('duration', $dskpn['op_duration']);
        $this->session->set('tema', $dskpn['dskpn_theme']);
        $this->session->set('subtema', $dskpn['dskpn_sub_theme']);
        $this->session->set('ex_dskpn_code_init', $dskpn['dskpn_code']);
        $this->session->set('dskpn_code_init', null); //reset
        $this->session->set('tm_id', $dskpn['tm_id']);

        return redirect()->to(route_to('dskpn_learning_standard') . "?flag=true");
    }

    public function store_cluster_subject_mapping()
    {
        $data = [];
        $cm_id = $this->request->getPost("cm_id");
        $tm_id = $this->request->getPost("tm_id");

        // Get the POST data
        $subjects = $this->request->getPost('subject');
        // Iterate over each selected subject and save to the database
        foreach ($subjects as $subjectId) {
            $data = [
                'csm_ctm_id' => $cm_id,
                'csm_sbm_id' => $subjectId,
            ];

            $this->cluster_subject_mapping_model->insert($data);
        }
        // Set success message and redirect back
        return redirect()->to(route_to('create_dskpn', $tm_id));
    }
    public function store_specification_mapping()
    {
        $data = [];
        $dskpn_id = $this->session->get("dskpn_id");

        $allData = $this->request->getPost();

        $success = true;

        $specification_mapist_data = [];
        $specification_mapping_id_list = [];
        $specification_lain_lain_id = "";
        $specification_lain_lain_data = "";

        $get_sess_specification_mapping_id_list = $this->session->get("specification_mapping_id_list_sess");
        $get_sess_specification_lain_lain_id = $this->session->get("specification_lain_lain_id_sess");

        if (isset($get_sess_specification_mapping_id_list) && isset($get_sess_specification_lain_lain_id)) {
            $this->domain_mapping_model->whereIn('dm_id', $get_sess_specification_mapping_id_list)
                ->delete();

            //need to delete also as domain_mapping is deleted.
            $this->extra_additional_field_model->where('eaf_id', $get_sess_specification_lain_lain_id)
                ->delete();
        }

        //structure data first
        foreach ($allData as $key => $data) {
            if ($key != 'input-lain') {
                $parts = explode('-', $key);
                if ($parts[0] == 'input') {
                    $d_id = $parts[1];

                    if ($this->domain_mapping_model->insert([
                        'dm_isChecked' => 'Y',
                        'd_id' => $d_id,
                        'ls_id' => null,
                        'dskpn_id' => $dskpn_id
                    ])) {
                        $specification_mapist_data[] = $d_id;
                        $specification_mapping_id_list[] = $this->domain_mapping_model->insertID();
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
                    $lain_dm_id = $this->domain_mapping_model->insertID();
                    if ($this->extra_additional_field_model->insert([
                        'eaf_desc' => $inputlain,
                        'dm_id' => $lain_dm_id
                    ])) {
                        $specification_mapist_data[] = $data;
                        $specification_mapping_id_list[] = $lain_dm_id;
                        $specification_lain_lain_data = $inputlain;
                        $specification_lain_lain_id = $this->extra_additional_field_model->insertID();
                    } else {
                        $success = false;
                    }
                } else {
                    $success = false;
                }
            }
        }

        $this->session->set('specification_mapist_sess', $specification_mapist_data);
        $this->session->set('specification_lain_lain_sess', $specification_lain_lain_data);
        $this->session->set('specification_mapping_id_list_sess', $specification_mapping_id_list);
        $this->session->set('specification_lain_lain_id_sess', $specification_lain_lain_id);

        if ($success)
            return redirect()->to(route_to('activity_n_assessment'));
        return redirect()->back();
    }

    public function store_standard_learning()
    {
        $data = [];

        // Retrieve tm_id from session
        $sm_id          = $this->session->get('sm_id');

        $allSubject     = $this->request->getPost('subject'); //multi-array
        $allDescription = $this->request->getPost('subject_description'); //multi-array - first loop (refers to subject = key = sm_id) - second loop (refers to item mapped)

        $kluster        = $this->request->getPost('kluster');
        $tahun          = $this->request->getPost('tahun');
        $topik          = $this->request->getPost('topik');
        $tema           = $this->request->getPost('tema');
        $subtema        = $this->request->getPost('subtema');
        $duration       = $this->request->getPost('duration');

        //objective part
        $objective      = $this->request->getPost('objective-prestasi-desc');
        $objectiveNumber= $this->request->getPost('objective-prestasi-number');
        $objectiveRef   = $this->request->getPost('objective-prestasi-ref');

        $isUpdated      = $this->session->get('is_update');

        //set in session
        $this->session->set('kluster', $kluster);
        $this->session->set('tahun', $tahun);
        $this->session->set('topik', $topik);
        $this->session->set('objective', $objective);
        $this->session->set('objective_number', $objectiveNumber);
        $this->session->set('objective_ref', $objectiveRef);
        $this->session->set('duration', $duration);
        $this->session->set('tema', $tema);
        $this->session->set('subtema', $subtema);

        $data['cluster_id'] = $kluster;
        $data['topic_id'] = $topik;

        if (empty($this->session->get('tm_id')))
            $this->session->set('tm_id', $topik);

        $performance_objective = $this->session->get('objective_performance_id');
        //means need to update
        if (isset($performance_objective) && (empty($isUpdated) && $isUpdated != 'true')) {
            dd("test"); //update part
            // //init to zero once again
            // $data['learning_standard_id'] = [];

            // //step 1 - update objective performance
            // if ($this->objective_performance_model->update($this->session->get('objective_performance_id'), [
            //     'op_desc' => $objective,
            //     'op_duration' => $duration,
            // ]))
            //     if (is_array($allSubject) && is_array($allDescription)) {
            //         //update DSKPN
            //         $dskpn_id = $this->session->get('dskpn_id');
            //         $this->dskpn_model->update($dskpn_id, [
            //             'dskpn_theme'       => $tema,
            //             'dskpn_sub_theme'   => $subtema,
            //         ]);

            //         $tp_done = $this->session->get('tp_sess_data');
            //         if (!isset($tp_done)) {
            //             $this->session->set('subject', $allSubject);
            //             $this->session->set('subject_description', $allDescription);
            //             //step 1 - remove all related learning-standard first
            //             $this->learning_standard_model->where('dskpn_id', $dskpn_id)
            //                 ->delete();

            //             foreach ($allSubject as $index => $subject) {
            //                 //step 2 - re-insert learning-standard
            //                 $this->learning_standard_model->insert([
            //                     'ls_details' => $allDescription[$index],
            //                     'sm_id' => $subject,
            //                     'dskpn_id' => $dskpn_id
            //                 ]);

            //                 $data['learning_standard_id'][] = $this->learning_standard_model->insertID();
            //             }

            //             //re-initialize learning_standard_id
            //             $this->session->set('learning_standard_id', $data['learning_standard_id']);
            //         } else {
            //             if ($this->session->get('subject') != $allSubject) //that array must be same!
            //             {
            //                 //redirect user with temporary session - letting them know not allow change after TP were set
            //                 $this->session->setFlashdata('warning_message', 'Penambahan/Penolakan Subjek tidak boleh dilakukan, kerana Tahap Penguasaan (TP) telah dikonfigurasi.');
            //                 return redirect()->to(route_to('tp_maintenance'));
            //             } else {
            //                 $learning_standard_id_list = $this->session->get('learning_standard_id');
            //                 foreach ($allSubject as $index => $subject) {
            //                     //step 2 - re-insert learning-standard
            //                     $this->learning_standard_model->update($learning_standard_id_list[$index], [
            //                         'ls_details' => $allDescription[$index],
            //                         'sm_id' => $subject,
            //                         'dskpn_id' => $dskpn_id
            //                     ]);
            //                 }
            //                 $this->session->set('subject_description', $allDescription);
            //             }
            //         }
            //     }
        } else {
            $this->session->set('subject', $allSubject);
            $this->session->set('subject_description', $allDescription);
            // Retrieve tm_year from db to be used in dskpn code
            $tm_data = $this->topic_model->where('tm_id', $topik)->first();

            // Count dskpn by topic
            $dskpn_by_topic_count = $this->dskpn_model
                ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
                ->where('dskpn.dskpn_tm_id', $topik)
                ->where('topic_main.tm_year', $tm_data['tm_year'])
                ->countAllResults();

            $dskpn_code_init = $this->session->get('dskpn_code_init');

            // backup-plan
            if (!isset($dskpn_code_init))
                $dskpn_code_init = 'K' . $kluster . 'T' . $tm_data['tm_year'] . '-' . sprintf('%03d', $dskpn_by_topic_count + 1);

            //step 1 - create DSKPN
            if($this->dskpn_model->insert([
                'dskpn_code'        => $dskpn_code_init,
                'dskpn_theme'       => $tema,
                'dskpn_sub_theme'   => $subtema,
                'dskpn_status'      => null,
                'dskpn_remarks'     => null,
                'dskpn_delete_reason'=> null,
                'dskpn_created_by'  => $sm_id, //sm_id is not subject_main ID
                'dskpn_updated_by'  => null,
                'dskpn_approved_by' => null,
                'dskpn_tm_id'       => $topik,
                'dskpn_version'     => null,
                'dskpn_duration'    => $duration,
                'dskpn_parent_involvement' => null,
                'dskpn_notes'       => null
            ]))
            {
                $data['dskpn_id'] = $this->dskpn_model->insertID();

                //step 2 - add objective performance
                foreach($objective as $index => $obj)
                {
                    $this->objective_performance_model->insert([
                        'opm_ls_ref_number' => isset($objectiveRef[$index])? $objectiveRef[$index] : null,
                        'opm_number'        => isset($objectiveNumber[$index])? $objectiveNumber[$index] : null,
                        'opm_desc'          => $obj,
                        'opm_dskpn_id'      => $data['dskpn_id']
                    ]);
                }

                foreach ($allSubject as $index => $subject) {
                    //step 3 - insert learning-standard
                    $this->learning_standard_model->insert([
                        'ls_sbm_id' => $subject,
                        'ls_dskpn_id' => $data['dskpn_id'] //temporary null
                    ]);

                    $ls_id = $this->learning_standard_model->insertID();
                    $data['learning_standard_id'][] = $ls_id;

                    foreach($allDescription[$subject] as $itemDesc)
                    {
                        //step 4 - insert learning-standard-item
                        $this->learning_standard_item_model->insert([
                            'lsi_ls_id'     => $ls_id,
                            'lsi_number'    => null,
                            'lsi_desc'      => $itemDesc
                        ]);
                    }
                }
            } else {
                die('DSKPN failed to be created. Please refreshed and try again!');
            }

            //http_build_query reverse process
            foreach ($data as $key => $val) {
                $this->session->set($key, $val);
            }

            $this->session->set('is_update', false);
        }

        $this->session->set('dskpn_code', $this->dskpn_model->where('dskpn_id', $this->session->get('dskpn_id'))->first()['dskpn_code']);

        return redirect()->to(route_to('tp_maintenance'));
    }

    public function store_standard_performance()
    {
        $allData    = $this->request->getPost();
        $dskpn_id   = $this->session->get("dskpn_id");
        $allRefCode = $this->request->getPost('sub_ref_code');
        // dd($allRefCode);
        // remove sub ref code from all data
        unset($allData['sub_ref_code']);

        // dd($allData);
        $sess_data = [];

        $tp_session = $this->session->get("tp_sess_data");
        if (isset($tp_session) && !empty($tp_session))
            $this->standard_performance_model->where('dskpn_id', $dskpn_id)
                ->delete();


        foreach ($allData as $key => $data) {

            $parts = explode('-', $key);
            //first repeatition max is only 4/5.

            $tempSubject = $this->subject_model->where('sm_code', $parts[1])->first();

            $ref_code_index = 0;
            // get learning standard ID based on subject and dskpn id
            $ls_id = $this->learning_standard_model
                ->where('sm_id', $tempSubject['sm_id'])
                ->where('dskpn_id', $dskpn_id)
                ->first();
            // update ref_code base on ls_id
            $this->learning_standard_model->update($ls_id['ls_id'], [
                'ls_ref_code' => $allRefCode[$ref_code_index]
            ]);

            $ref_code_index++;

            $sess_data_desc = [];

            foreach ($data as $index => $item) {
                $tpLevel = $index + 1;
                $this->standard_performance_model->insert([
                    'sp_tp_level' => $tpLevel,
                    'sp_tp_level_desc' => $item,
                    'sm_id' => $tempSubject['sm_id'],
                    'dskpn_id' => $dskpn_id
                ]);

                $sess_data_desc[] = $item;
            }

            $sess_data[$tempSubject['sm_desc']][] = [
                $tempSubject['sm_id'],
                $sess_data_desc
            ];
        }

        $this->session->set('tp_sess_data', $sess_data);

        return redirect()->to(route_to('mapping_core'));
    }

    public function store_domain_mapping()
    {
        $allData = $this->request->getPost();
        $dskpn_id = $this->session->get("dskpn_id");

        $success = true;

        $domain_map_session_data = [];
        $domain_map_id_session_data = [];

        $domain_map_sess = $this->session->get("domain_map_session");
        $domain_map_id_sess = $this->session->get("domain_map_id_session_data");

        if (isset($domain_map_sess) && (!empty($domain_map_sess) || $domain_map_sess != null) && isset($domain_map_id_sess)) {
            $this->domain_mapping_model->whereIn('dm_id', $domain_map_id_sess)
                ->delete();
        }

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
                        $domain_map_session_data[$this->db->escape($parts[1])][] = $d_id;
                        $domain_map_id_session_data[] = $this->domain_mapping_model->insertID();
                    } else {
                        $success = false;
                    }
                }
            }
        }

        $this->session->set('domain_map_session', $domain_map_session_data);
        $this->session->set('domain_map_id_session_data', $domain_map_id_session_data);

        if ($success)
            return redirect()->to(route_to('mapping_dynamic_dskpn'));
        return redirect()->back();
    }

    public function store_core_mapping()
    {
        $allData = $this->request->getPost();
        $dskpn_id = $this->session->get("dskpn_id");

        $core_mapping_sess = $this->session->get("core_map_sess");
        $core_mapping_id_sess = $this->session->get("core_mapping_id_session_data");
        if (isset($core_mapping_sess) && !empty($core_mapping_sess) && $core_mapping_sess != null && isset($core_mapping_id_sess)) {
            $this->domain_model->where('dskpn_id', $dskpn_id)
                ->delete();
            $this->domain_mapping_model->whereIn('dm_id', $core_mapping_id_sess)
                ->delete();
        }

        //check if not exist create new one
        $kompetensi_domain_group = $this->domain_group_model->where('dg_title', 'Kompetensi Teras')->first();

        if (empty($kompetensi_domain_group)) {
            $this->domain_group_model->insert([
                'dg_title' => 'Kompetensi Teras'
            ]);

            $kompetensi_domain_group['dg_id'] = $this->domain_group_model->insertID();
        }

        $processedData = [];

        $core_map_session_data = [];
        $core_mapping_id_session_data = [];

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
            $subject_data = $this->subject_model->where('sm_code', $key)->first();
            $sm_id = $subject_data['sm_id'];

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

                $core_mapping_id_session_data[] = $this->domain_model->insertID();

                $core_map_session_data[$subject_data['sm_code']][$d_id] = [$input['value'], $input['checked']];
                //$core_map_session_list[$subject_data['sm_code']][] = $d_id;
            }
        }

        $this->session->set('core_map_sess', $core_map_session_data);
        $this->session->set('core_mapping_id_session_data', $core_mapping_id_session_data);
        //$this->session->set('core_maplist_sess', $core_map_session_list);

        return redirect()->to(route_to('domain_mapping'));
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

    public function store_image_ckeditor()
    {
        $file = $this->request->getFile('upload');

        // Set validation rules
        $validationRules = [
            'upload' => [
                'uploaded[upload]',
                'mime_in[upload,image/jpg,image/jpeg,image/gif,image/png]', //image mimetype only
                'max_size[upload,4096]', //4MB max size
            ]
        ];

        if ($this->validate($validationRules)) {
            if (!$file->isValid()) {
                return $this->fail($file->getErrorString());
            }

            $file->move(ROOTPATH . 'public\neoterik\uploads');

            $name = $file->getName();

            return $this->response->setJSON([
                'url' => '/neoterik/uploads/' . $name
            ]);
        }

        return null;
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
            ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
            ->where('dskpn.dskpn_tm_id', $tm_id)
            ->findAll();

        // Query get kluster data
        $data['kluster'] = $this->cluster_model->findAll();

        // Query get topic data
        $data['topic'] = $this->topic_model
            ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
            ->where('topic_main.tm_id', $tm_id)
            ->first();

        // check if the subject for the cluster have been registered
        $cluster_registered_subject = $this->cluster_subject_mapping_model
            ->where('csm_ctm_id', $data['topic']['tm_ctm_id'])
            ->first();

        if ($cluster_registered_subject !== null) {
            // The query returned data, set the status to true
            $data['register_subject_status'] = true;
        } else {
            // The query did not return data, set the status to false
            $data['register_subject_status'] = false;
        }
        // get subject list
        $data['subjects'] = $this->subject_model->findAll();

        // Scripts and styles
        $script = ['dynamic-input'];
        $style = ['static-field'];

        // dd($data);
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
        $data = [];
        //set in session
        $data['subject'] = "";
        $data['subject_description'] = "";
        $data['objective'] = "";
        $data['tema'] = "";
        $data['subtema'] = "";
        $data['duration'] = "";
        $data['subject_list'] = $this->subject_model->findAll();

        $tm_id = $this->session->get('tm_id');
        $data['flag'] = $this->request->getVar('flag');
        // Query get topic data
        if (!empty($data['flag']) && ($tm_id != NULL)) {
            $data['topic'] = $this->topic_model
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
                ->where('topic_main.tm_id', $tm_id)
                ->first();

            $data['subject'] = $this->session->get('subject');
            $data['getDefaultSubject'] = $this->cluster_subject_mapping_model->where('csm_ctm_id', $data['topic']['tm_ctm_id'])
                ->join('subject_main', 'subject_main.sbm_id = cluster_subject_mapping.csm_sbm_id', 'left')
                ->findAll();

            $arrDefaultSubject = [];
            foreach ($data['getDefaultSubject'] as $item) {
                $arrDefaultSubject[] = $item['csm_sbm_id'];
            }

            if (empty($data['subject'])) {
                $this->session->set('subject', $arrDefaultSubject);
                $data['subject'] = $arrDefaultSubject;
            }

            $data['getDefaultSubject'] = $arrDefaultSubject;

            $data['subject_description'] = $this->session->get('subject_description');
            $data['objective'] = $this->session->get('objective');
            $data['duration'] = $this->session->get('duration');
            $data['tema'] = $this->session->get('tema');
            $data['subtema'] = $this->session->get('subtema');

            $data['dskpn_code'] = 'K' . $data['topic']['tm_ctm_id'] . 'T' . $data['topic']['tm_year'] . '-';
        } else {
            $data['kluster'] = $this->cluster_model->findAll();
        }

        $data['dskpn_code_init'] = $this->session->get('dskpn_code_init');
        $data['ex_dskpn_code_init'] = $this->session->get('ex_dskpn_code_init');

        $script = ['dynamic-input', 'learning_standard'];
        $style = ['static-field'];
        $this->render_jscss('learning_standard', $data, $script, $style);
    }

    public function checkAndSetDSKPNCodeSession()
    {
        $dskpn_year = $this->request->getPost('dskpnyear');
        $dskpn_year = isset($dskpn_year) ? $dskpn_year : '';
        $dskpn_code = $this->request->getPost('dskpncode');
        $dskpn_code = preg_replace('/\s+/', '', $dskpn_code) . $dskpn_year; //purified id

        $dskpn = $this->dskpn_model->where('dskpn_code', $dskpn_code)->first();
        if (!$dskpn) {
            $this->session->set('dskpn_code_init', $dskpn_code);
            return redirect()->back();
        }
        return redirect()->back()->with('fail', 'Kod DSKPN yang dimasukkan telah wujud didalam rekod!');
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

    public function review_dskpn()
    {
        $data = [];

        // Scripts and styles
        $script = [];
        $style = [];

        $page = $this->request->getVar('page');
        $data['page'] = $page;

        switch ($page) {
            case 1: {
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    if (!empty($data['data']['dskpn_id'])) {
                        $data['data']['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                            ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                            ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                            ->where('dskpn.dskpn_id', $data['data']['dskpn_id'])->first();

                        //steps 1 - get all subjects related to iterate horizontally
                        //steps 1.1 - get learning standard to get list of subject.
                        $data['data']['subjects'] = $this->subject_model->select('subject_main.sm_code, subject_main.sm_desc')
                            ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                            ->where('ls.dskpn_id', $data['data']['dskpn_id'])->where('ls.deleted_at', null)->find();
                    }

                    $data['data']['subject_list'] = $this->subject_model->findAll();

                    $tm_id = $this->session->get('tm_id');
                    // Query get topic data
                    $data['data']['topic'] = $this->topic_model
                        ->join('cluster_main', 'topic_main.cm_id = cluster_main.cm_id', 'left')
                        ->where('topic_main.tm_id', $tm_id)
                        ->first();

                    $data['data']['subject'] = $this->session->get('subject');
                    $data['data']['subject_description'] = $this->session->get('subject_description');
                    $data['data']['objective'] = $this->session->get('objective');
                    $data['data']['duration'] = $this->session->get('duration');
                    $data['data']['tema'] = $this->session->get('tema');
                    $data['data']['subtema'] = $this->session->get('subtema');

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\standard_learning";
                    break;
                }
            case 2:
                //code block
                {
                    //tp part
                    $data['data']['parameters'] = $this->session->get();
                    $data['data']['tp_session'] = $this->session->get("tp_sess_data");
                    //step 1 - get Cluster
                    $data['data']['cluster_desc'] = $this->cluster_model
                        ->where('cm_id', $data['data']['parameters']['cluster_id'])->first();

                    //step 2 - get Topic
                    $data['data']['topic_desc'] = $this->topic_model
                        ->where('tm_id', $data['data']['parameters']['topic_id'])->first();

                    //step 3 - get Subject Via Learning Standard
                    foreach ($data['data']['parameters']['learning_standard_id'] as $ls_id) {
                        $query = $this->db->table('subject_main')
                            ->select('subject_main.*')
                            ->join('learning_standard', 'learning_standard.sm_id = subject_main.sm_id')
                            ->where('learning_standard.ls_id', $ls_id)
                            ->get();

                        $data['data']['subjects'][] = $query->getResult();
                    }

                    $script[] = 'review/tp-dynamic-field';
                    //end - tp part


                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\tp_maintenance";
                    break;
                }
            case 3:
                //code block;
                {
                    $data['data']['core_map_sess'] = $this->session->get("core_map_sess");

                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    if (!empty($data['data']['dskpn_id'])) {
                        $data['data']['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                            ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                            ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                            ->where('dskpn.dskpn_id', $data['data']['dskpn_id'])->first();

                        //steps 1 - get all subjects related to iterate horizontally
                        //steps 1.1 - get learning standard to get list of subject.
                        $data['data']['subjects'] = $this->subject_model->select('subject_main.sm_code, subject_main.sm_desc')
                            ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                            ->where('ls.dskpn_id', $data['data']['dskpn_id'])->where('ls.deleted_at', null)->find();
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\map_core";
                    break;
                }
            case 4:
                //code block
                {
                    $data['data']['domain_map_session'] = $this->session->get("domain_map_session");

                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    $data['data']['subjects'] = [];
                    if (!empty($data['data']['dskpn_id'])) {
                        $data['data']['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                            ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                            ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                            ->where('dskpn.dskpn_id', $data['data']['dskpn_id'])->first();

                        $data['data']['subjects'] = $this->subject_model->select('subject_main.sm_code, subject_main.sm_desc')
                            ->join('learning_standard as ls', 'ls.sm_id = subject_main.sm_id')
                            ->where('ls.dskpn_id', $data['data']['dskpn_id'])->where('ls.deleted_at', null)->find();
                    }

                    $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Kualiti Keperibadian', 'Kemandirian', 'Pengetahuan Asas', '7 Kemahiran Insaniah'])->find();

                    foreach ($allGroup as $group) {
                        $data['data']['data'][$group['dg_title']] = $this->domain_model->select('d_name, d_id')->where('gd_id', $group['dg_id'])->orderBy('d_id', 'ASC')->find();
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\sixteen_domain";
                    break;
                }
            case 5:
                //code block
                {
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");

                    $data['data']['specification_maplist'] = $this->session->get("specification_mapist_sess");
                    $data['data']['specification_lain_lain'] = $this->session->get("specification_lain_lain_sess");

                    if (!empty($data['data']['dskpn_id'])) {
                        $data['data']['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                            ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                            ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                            ->where('dskpn.dskpn_id', $data['data']['dskpn_id'])->first();
                    }

                    $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Reka Bentuk Instruksi', 'Integrasi Teknologi', 'Pendekatan', 'Kaedah'])->find();

                    foreach ($allGroup as $group) {
                        $data['data']['data'][$group['dg_title']] = $this->domain_model->select('d_name, d_id')->where('gd_id', $group['dg_id'])->orderBy('d_id', 'ASC')->find();
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\map_specs";
                    break;
                }
            case 6:
                //code block
                {
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");

                    $data['data']['act_assess_abm'] = $this->session->get("act_assess_abm");
                    $data['data']['act_assess_pentaksiran'] = $this->session->get("act_assess_pentaksiran");
                    $data['data']['act_assess_idea_pengajaran'] = $this->session->get("act_assess_idea_pengajaran");
                    $data['data']['act_assess_parent_involve'] = $this->session->get("act_assess_parent_involve");

                    if (!empty($data['data']['dskpn_id'])) {
                        $data['data']['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.cm_desc, cluster_main.cm_id')
                            ->join('topic_main', 'topic_main.tm_id = dskpn.tm_id')
                            ->join('cluster_main', 'cluster_main.cm_id = topic_main.cm_id')
                            ->where('dskpn.dskpn_id', $data['data']['dskpn_id'])->first();
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\map_actvt_assess";
                    break;
                }
            default:
                //code block
                echo "fail";
        }

        $load_page = [
            'data'  => $data,
            'script' => $script,
            'style' => $style,
        ];

        echo view('App\\Modules\\dskpn\\Views\\review\\index', $load_page);
    }

    public function debugcheckallsession()
    {
        print_r(json_encode($this->session->get()));
    }
}
