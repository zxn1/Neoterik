<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

//model
use App\Modules\Dskpn\Models\DskpnModel;
use App\Modules\Dskpn\Models\DskpModel;
use App\Modules\Dskpn\Models\DomainModel;
use App\Modules\Dskpn\Models\TopicMainModel;
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Dskpn\Models\DomainGroupModel;
use App\Modules\Dskpn\Models\LearningAidModel;
use App\Modules\Dskpn\Models\SubjectMainModel;
use App\Modules\Dskpn\Models\CoreCompetencyModel;
use App\Modules\Dskpn\Models\CompetencyMappingModel;
use App\Modules\Dskpn\Models\TeachingApproachCategoryModel;
use App\Modules\Dskpn\Models\TeachingApproachModel;
use App\Modules\Dskpn\Models\TeachingApproachMappingModel;

use App\Modules\Dskpn\Models\DomainMappingModel;
use App\Modules\Dskpn\Models\LearningStandardModel;
use App\Modules\Dskpn\Models\LearningStandardItemModel;
use App\Modules\Dskpn\Models\ActivityItemModel;
use App\Modules\Dskpn\Models\StandardPerformanceModel;
use App\Modules\Dskpn\Models\StandardPerformanceDskpMappingModel;

//mapping model import
use App\Modules\Dskpn\Models\ObjectivePerformanceModel;
use App\Modules\Dskpn\Models\ClusterSubjectMappingModel;
use App\Modules\Dskpn\Models\AssessmentCategoryModel;
use App\Modules\Dskpn\Models\AssessmentItemModel;
use App\Modules\Dskpn\Models\OpmReffCodeModel;
use App\Modules\Dskpn\Models\OpmAssessmentCodeModel;
//-----

use \Mpdf\Mpdf;
use \TCPDF;
use Dompdf\Dompdf;
use Dompdf\Options;

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
    protected $standard_performance_dskp_mapping_model;
    protected $dskpn_model;
    protected $dskp_model;
    protected $core_competency_model;
    protected $competency_mapping_model;
    protected $teaching_approach_category_model;
    protected $teaching_approach_model;
    protected $teaching_approach_mapping_model;
    protected $opm_reff_code_model;
    protected $opm_assessment_code_model;

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
    protected $assessment_category_model;
    protected $assessment_item_model;
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
        $this->standard_performance_dskp_mapping_model = new StandardPerformanceDskpMappingModel();
        $this->dskpn_model                  = new DskpnModel();
        $this->dskp_model                   = new DskpModel();
        //mapping model init
        $this->domain_group_model           = new DomainGroupModel();
        $this->domain_model                 = new DomainModel();
        $this->domain_mapping_model         = new DomainMappingModel();
        $this->core_competency_model        = new CoreCompetencyModel();
        $this->competency_mapping_model     = new CompetencyMappingModel();
        $this->opm_reff_code_model          = new OpmReffCodeModel();
        $this->opm_assessment_code_model    = new OpmAssessmentCodeModel();

        $this->teaching_approach_category_model = new TeachingApproachCategoryModel();
        $this->teaching_approach_mapping_model  = new TeachingApproachMappingModel();
        $this->teaching_approach_model          = new TeachingApproachModel();
        $this->assessment_category_model        = new AssessmentCategoryModel();
        $this->assessment_item_model            = new AssessmentItemModel();

        $this->cluster_subject_mapping_model    = new ClusterSubjectMappingModel();
        //-----------------
        $this->learning_aid_model       = new LearningAidModel();
        $this->db                       = $this->db = \Config\Database::connect();
    }

    public function index()
    {
        //$data = [];
        //$this->render_login('login', $data);
        return redirect()->to(route_to('login'));
        // return view('App\\Modules\\Login\\Views\\login');
    }

    // public function generate_view_pdf()
    // {

    //     $data = $this->_populate_dskpn_details();
    //     $mpdf = new Mpdf([
    //         'orientation' => 'L',
    //         'format' => 'A1', //[594, 850], //A2
    //         'margin_left' => 10,
    //         'margin_right' => 10,
    //         'margin_top' => 10,
    //         'margin_bottom' => 10,
    //     ]);

    //     // Set the watermark text
    //     if ($data['dskpn_details']['dskpn_status'] == 5 || $data['dskpn_details']['dskpn_status'] == null) {
    //         $mpdf->SetWatermarkText('DRAF');
    //         $mpdf->showWatermarkText = true;
    //         //$mpdf->SetWatermarkImage('path/to/image.png');
    //     }

    //     $path = FCPATH . 'neoterik/img/logo_srsb.png';
    //     //$path2 = FCPATH . 'neoterik/img/assets/draft_watermark.png';

    //     if (file_exists($path)) {
    //         //encode image to base64
    //         $imageData = base64_encode(file_get_contents($path));
    //         $base64Image = 'data:image/png;base64,' . $imageData;
    //         $data['srsb_logo'] = $base64Image;
    //     }

    //     // if (file_exists($path2)) {
    //     //     //encode image to base64
    //     //     $imageData = base64_encode(file_get_contents($path2));
    //     //     $base64Image = 'data:image/png;base64,' . $imageData;
    //     //     $data['draft_watermark_logo'] = $base64Image;
    //     // }
    //     // dd($data['learning_standard']);

    //     $htmlContent = view('pdf/dskpn', $data);

    //     $dskpn_code = $this->session->get('dskpn_code');
    //     $dskpn_code = empty($dskpn_code) ? 'dskpn' : $dskpn_code;

    //     $mpdf->WriteHTML($htmlContent);
    //     return $mpdf->Output($dskpn_code . '.pdf', 'D');
    // }

    /*
    Code asli dibiar diatas (commented out), atas kemungkinan kod auto adjust height ini mempunyai performance issue.
    Kemungkinan perlu revert kembali.
    */
    public function generate_view_pdf()
    {
        $data = $this->_populate_dskpn_details();
        // Logo fallback
        $data['srsb_logo'] = null;
        $path = FCPATH . 'neoterik/img/logo_srsb.png';

        if (file_exists($path)) {
            $imageData = base64_encode(file_get_contents($path));
            $base64Image = 'data:image/png;base64,' . $imageData;
            $data['srsb_logo'] = $base64Image;
        }

        $htmlContent = view('pdf/dskpn', $data);
        $mpdf = $this->generate_single_page_pdf($htmlContent);

        // Watermark DRAF
        if (!isset($data['dskpn_details']['dskpn_status']) || $data['dskpn_details']['dskpn_status'] == 5) {
            $mpdf->SetWatermarkText('DRAF');
            $mpdf->showWatermarkText = true;
        }

        $filename = $this->session->get('dskpn_code') ?? 'dskpn';
        return $mpdf->Output($filename . '.pdf', 'D');
    }

    //temporary solution - later can change use another package.
    //could slower the performance - as it could loop too many (max 20 process - ibarat process 20 pdf serentak).
    private function generate_single_page_pdf($htmlContent)
    {
        $initialHeight = 120;
        $increment = 20;
        $maxAttempts = 20;
        $attempt = 0;
        $height = $initialHeight;

        do {
            $mpdf = $this->mpdf_init($height);
            $mpdf->WriteHTML($htmlContent);
            $pages = $mpdf->page;

            if ($pages <= 1) {
                // dd($attempt);
                return $mpdf;
            }

            if($height != 150) //must equivalent with initialHeight
                $initialHeight += $increment;

            $height = $initialHeight * $pages;
            $attempt++;

        } while ($pages > 1 && $attempt < $maxAttempts);

        // dd($height);
        $mpdf->SetAutoPageBreak(false, 0);
        return $mpdf; // fallback: return last generated (might still be > 1 page)
    }

    public function mpdf_init($height)
    {
        return new \Mpdf\Mpdf([
                'orientation' => 'L',
                'format' => [$height, 594],
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
            ]);
    }

    public function test_view_pdf_in_html()
    {
        $data = $this->_populate_dskpn_details();

        $path = FCPATH . 'neoterik/img/logo_srsb.png';
        $path2 = FCPATH . 'neoterik/img/assets/draft_watermark.png';

        if (file_exists($path)) {
            //encode image to base64
            $imageData = base64_encode(file_get_contents($path));
            $base64Image = 'data:image/png;base64,' . $imageData;
            $data['srsb_logo'] = $base64Image;
        }

        if (file_exists($path2)) {
            //encode image to base64
            $imageData = base64_encode(file_get_contents($path2));
            $base64Image = 'data:image/png;base64,' . $imageData;
            $data['draft_watermark_logo'] = $base64Image;
        }

        return view('pdf/dskpn', $data);
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
        $data['tp_sess_refcode'] = $this->session->get("tp_sess_refcode");

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
        }

        $script = ['tp-dynamic-field', 'tp_loader'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('tp_maintenance', $data, $script, $style);
    }

    public function load_dskpn_versioning()
    {
        echo $this->render_without_main('component/versioning_dskpn');
    }

    public function topic_list_in_cluster()
    {
        $data = [];
        $data['cluster_listing'] = $this->cluster_model->findAll();
        $data['years'] = range(1, 6); // Hardcoding years from 1 to 6

        $data['setting_dskpn_versioning'] = $this->render_without_main('component/versioning_dskpn');

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

    public function delete_subject()
    {
        $sbm_id = $this->request->getPost('sbm_id');

        if($sbm_id){
            if ($this->subject_model->delete($sbm_id)){
                return redirect()->back()->with('success', 'Subjek berjaya dipadam.');
            } else {
                return redirect()->back()->with('error', 'Gagal memadam subjek.');
            }
        }
    }



    public function view_cluster()
    {
        $data = [];
        $data['clusters'] = $this->cluster_model->findAll();
        $data['subjects'] = $this->subject_model->findAll();
        $script = ['data', 'view_subject'];
        $style = ['view_subject'];
        $this->render_jscss('view_cluster', $data, $script, $style);
    }

    public function view_topic()
    {
        $data = [];
        $data['topics'] = $this->topic_model
            ->select('topic_main.*, cluster_main.ctm_id, cluster_main.ctm_desc') // Select columns from both tables
            ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id') // Join the 'cluster' table on the specified condition
            ->findAll(); // Retrieve all the results
        $data['clusters'] = $this->cluster_model->findAll();

        $script = ['data', 'view_subject'];
        $style = ['view_subject'];
        $this->render_jscss('view_topic', $data, $script, $style);
    }

    public function delete_topic()
    {
        $tm_id = $this->request->getPost('tm_id');

        if ($tm_id) {
            if ($this->topic_model->delete($tm_id)) {
                return redirect()->back()->with('success', 'Topik berjaya dipadam.');
            } else {
                return redirect()->back()->with('error', 'Gagal memadam topik.');
            }
        }
    }


    public function list_registered_dskpn()
    {
        $this->session->set('ex_dskpn_code_init', null); //reset
        $data = [];
        $own_dskpn = $this->request->getVar("owned");
        $data['owned'] = $own_dskpn;

        $data['setting_dskpn_versioning'] = $this->render_without_main('component/versioning_dskpn');

        $current_role = session('current_role');
        // Query to get the list of DSKPN
        if ($current_role == 'PENYELARAS') {
            $data['dskpn'] = $this->dskpn_model
                ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left');

            if (!empty($own_dskpn)) {
                $data['dskpn'] = $data['dskpn']
                    ->where('dskpn_created_by', session('sm_id'));
            }

            $data['dskpn'] = $data['dskpn']->findAll();
        } else if ($current_role == 'GURU_BESAR') {
            $data['dskpn'] = $this->dskpn_model
                ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left');

            if (!empty($own_dskpn)) {
                $data['dskpn'] = $data['dskpn']
                    ->where('dskpn_created_by', session('sm_id'));
            }

            $data['dskpn'] = $data['dskpn']
                ->whereIn('dskpn_status', [1, 2, 3, 4, null])
                ->orWhere('dskpn_status IS NULL')
                ->findAll();
        } else {
            $data['dskpn'] = $this->dskpn_model
                ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
                ->where('dskpn_status', 1);

            if (!empty($own_dskpn)) {
                $data['dskpn'] = $data['dskpn']
                    ->where('dskpn_created_by', session('sm_id'));
            }

            $data['dskpn'] = $data['dskpn']->findAll();
        }

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
            'dskpn_approved_by' => $this->session->get('sm_id'),
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
            'dskpn_approved_by'   => null,
            'dskpn_deleted_at'    => null,
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

        $data = $this->_populate_dskpn_details();

        $script = ['dynamic-input', 'dskpn_view'];
        $style = ['static-field'];

        $this->render_jscss('dskpn_view', $data, $script, $style);
    }

    private function _populate_dskpn_details()
    {
        $dskpn_id = $this->session->get('dskpn_id');

        $dskpn_details = $this->dskpn_model->where('dskpn_id', $dskpn_id)->withDeleted()->first();

        // Get DSKPN learning_standard
        $learning_standard = $this->learning_standard_model
            ->join('learning_standard_item', 'learning_standard_item.lsi_ls_id = learning_standard.ls_id')
            ->where('ls_dskpn_id', $dskpn_id)
            ->findAll();

        //dd($learning_standard);

        $subjects = $this->subject_model
            ->select('subject_main.sbm_id, subject_main.sbm_desc, subject_main.sbm_code, ls_deleted_at')
            ->join('learning_standard', 'subject_main.sbm_id = learning_standard.ls_sbm_id')
            ->where('ls_dskpn_id', $dskpn_id)->where('ls_deleted_at', null)
            ->groupBy('sbm_id, ls_id')
            ->findAll();

        //Get topic main by tm_id
        $tm_details = $this->topic_model->where('tm_id', $dskpn_details['dskpn_tm_id'])->first();
        $this->session->set('tm_id', $dskpn_details['dskpn_tm_id']); //must to avoid error when go back

        // Get cluster based on tm_id cm_id
        $cluster_details = $this->cluster_model->where('ctm_id', $tm_details['tm_ctm_id'])->first();

        // Get standard_performance
        $standard_performance = $this->standard_performance_dskp_mapping_model
            ->join('dskp', 'dskp.dskp_code = standard_performance_dskp_mapping.spdm_dskp_code AND dskp.dskp_batch = standard_performance_dskp_mapping.spdm_dskp_batch')
            ->join('standard_performance', 'standard_performance.sp_dskp_code = dskp.dskp_code AND standard_performance.sp_dskp_batch = dskp.dskp_batch')
            ->join('subject_main', 'subject_main.sbm_id = dskp.dskp_sbm_id')
            ->where('spdm_dskpn_id', $dskpn_id)
            ->findAll();

        //dd($standard_performance);

        $tp_level = 0;
        $index = 0;
        $new_standard_performance = [];
        foreach ($standard_performance as $idx => $sp) {
            if ($tp_level < $sp['sp_tp_level']) {
                $tp_level = $sp['sp_tp_level'];
                $new_standard_performance[$index][] = $sp;
            } else {
                $tp_level = 0;
                $index++;
                $new_standard_performance[$index][] = $sp;
            }
        }

        $standard_performance = $new_standard_performance;

        $objective_performance = $this->objective_performance_model->where('opm_dskpn_id', $dskpn_id)->findAll();
        $all_reff_code_op = $this->objective_performance_model
            ->select('objective_performance.opm_id, opm_reff_code.orc_code')
            ->join('opm_reff_code', 'opm_reff_code.orc_opm_id = objective_performance.opm_id')
            ->where('opm_dskpn_id', $dskpn_id)->findAll();

        $arr_opm_ids = array_column($objective_performance, 'opm_id');
        $opm_assessment_code = $this->opm_assessment_code_model
            ->whereIn('oac_opm_id', $arr_opm_ids)
            ->findAll();

        $activity = $this->activity_item_model
            ->where('activity_item.aci_dskpn_id', $dskpn_id)->findAll();
        $assessment = $this->assessment_item_model
            ->join('assessment_category', 'assessment_item.asi_asc_id = assessment_category.asc_id')
            ->where('assessment_item.asi_dskpn_id', $dskpn_id)->findAll();
        $core_competency    = $this->competency_mapping_model
            ->join('core_competency', 'competency_mapping.cmp_cc_code = core_competency.cc_code AND competency_mapping.cmp_cc_batch = core_competency.cc_batch')
            ->join('subject_main', 'core_competency.cc_sbm_id = subject_main.sbm_id')
            ->where('cmp_dskpn_id', $dskpn_id)->findAll();

        //dd($core_competency);

        $ls_sbm_ids = array_unique(array_column($learning_standard, 'ls_sbm_id')); //array_unique to ensure no duplicate/redundant issue
        $all_core_competency = [];
        foreach ($ls_sbm_ids as $sub_id) {
            $check_core_competency = $this->competency_mapping_model
                ->join('core_competency', 'competency_mapping.cmp_cc_code = core_competency.cc_code AND competency_mapping.cmp_cc_batch = core_competency.cc_batch')
                // ->join('subject_main', 'core_competency.cc_sbm_id = subject_main.sbm_id')
                ->where('cmp_dskpn_id', $dskpn_id)
                ->where('cc_sbm_id', $sub_id)
                ->orderBy('cmp_id', 'DESC')
                ->first();

            //$this->core_competency_model->where('cc_sbm_id', $sub_id)->orderBy('cc_id', 'DESC')->first();
            $tmp_core_competency = $this->core_competency_model
                ->join('subject_main', 'subject_main.sbm_id = core_competency.cc_sbm_id')
                ->where('cc_sbm_id', $sub_id)->where('cc_batch', $check_core_competency['cc_batch'] ?? 0)->findAll();

            $all_core_competency = array_merge($all_core_competency, $tmp_core_competency);
        }

        // Get 16 Domain List by tahap
        $domain_pengetahuan_asas = $this->domain_mapping_model->getDomain($dskpn_id, 'Pengetahuan Asas');
        $all_domain_pengetahuan_asas = $this->domain_mapping_model->getAllDomain('Pengetahuan Asas');

        // Tahap Kemandirian
        $domain_kemandirian =  $this->domain_mapping_model->getDomain($dskpn_id, 'Kemandirian');
        $all_domain_kemandirian = $this->domain_mapping_model->getAllDomain('Kemandirian');

        // Tahap Pengetahuan Asas
        $domain_kualiti_keperibadian =  $this->domain_mapping_model->getDomain($dskpn_id, 'Kualiti Keperibadian');
        $all_domain_kualiti_keperibadian = $this->domain_mapping_model->getAllDomain('Kualiti Keperibadian');

        // Get 7 Kemahiran Insaniah
        $kemahiran_insaniah =  $this->domain_mapping_model->getDomain($dskpn_id, '7 Kemahiran Insaniah');
        $all_kemahiran_insaniah =  $this->domain_mapping_model->getAllDomain('7 Kemahiran Insaniah');

        // Reka bentuk Instruksi
        $rekabentuk_instruksi =  $this->teaching_approach_mapping_model
            ->join('teaching_approach', 'teaching_approach.tapp_id = teaching_approach_mapping.tappm_tapp_id')
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappm_dskpn_id', $dskpn_id)
            ->where('tappc_desc', 'Reka Bentuk Instruksi')
            ->findAll();

        $all_rekabentuk_instruksi = $this->teaching_approach_model
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappc_desc', 'Reka Bentuk Instruksi')
            ->findAll();

        $integrasi_teknologi =  $this->teaching_approach_mapping_model
            ->join('teaching_approach', 'teaching_approach.tapp_id = teaching_approach_mapping.tappm_tapp_id')
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappm_dskpn_id', $dskpn_id)
            ->where('tappc_desc', 'Integrasi Teknologi')
            ->findAll();

        $all_integrasi_teknologi =  $this->teaching_approach_model
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappc_desc', 'Integrasi Teknologi')
            ->findAll();

        $pendekatan =  $this->teaching_approach_mapping_model
            ->join('teaching_approach', 'teaching_approach.tapp_id = teaching_approach_mapping.tappm_tapp_id')
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappm_dskpn_id', $dskpn_id)
            ->where('tappc_desc', 'Pendekatan')
            ->findAll();

        $all_pendekatan = $this->teaching_approach_model
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappc_desc', 'Pendekatan')
            ->findAll();

        $kaedah =  $this->teaching_approach_mapping_model
            ->join('teaching_approach', 'teaching_approach.tapp_id = teaching_approach_mapping.tappm_tapp_id')
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappm_dskpn_id', $dskpn_id)
            ->where('tappc_desc', 'Kaedah')
            ->findAll();

        $all_kaedah = $this->teaching_approach_model
            ->join('teaching_approach_category', 'teaching_approach_category.tappc_id = teaching_approach.tapp_tappc_id')
            ->where('tappc_desc', 'Kaedah')
            ->findAll();

        // abm
        $abm = $this->learning_aid_model->where('la_dskpn_id', $dskpn_id)->findAll();

        $data = [
            'dskpn_details'                 => $dskpn_details,
            'tm_details'                    => $tm_details,
            'cluster_details'               => $cluster_details,
            'subjects'                      => $subjects,
            'learning_standard'             => $learning_standard,
            'standard_performance'          => $standard_performance,
            'objective_performance'         => $objective_performance,
            'activity'                      => $activity,
            'assessment'                    => $assessment,
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
            'all_core_competency'           => $all_core_competency,
            'all_domain_pengetahuan_asas'   => $all_domain_pengetahuan_asas,
            'all_domain_kemandirian'        => $all_domain_kemandirian,
            'all_domain_kualiti_keperibadian' => $all_domain_kualiti_keperibadian,
            'all_rekabentuk_instruksi'      => $all_rekabentuk_instruksi,
            'all_integrasi_teknologi'       => $all_integrasi_teknologi,
            'all_pendekatan'                => $all_pendekatan,
            'all_kaedah'                    => $all_kaedah,
            'all_kemahiran_insaniah'        => $all_kemahiran_insaniah,
            'all_reff_code_op'              => $all_reff_code_op,
            'opm_assessment_code'          => $opm_assessment_code,
        ];

        return $data;
    }

    public function approve_dskpn($dskpn_id)
    {
        $staff_main_id = $this->session->get('sm_id');

        // Update DSKPN table
        $this->dskpn_model->update($dskpn_id, [
            'dskpn_status'  => 1,
            'dskpn_approved_by'   => $staff_main_id,
            'dskpn_approved_at'   => date('Y-m-d H:i:s')
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
            'dskpn_approved_by'   => $staff_main_id,
            'dskpn_approved_at'   => date('Y-m-d H:i:s'),
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
        $data['dskpn_id'] = $this->session->get("dskpn_id");

        // $is_update = $this->session->get("is_update");
        // $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        // if (isset($is_update) && empty($data['domain_map_session'])) {
        //     dd("test");
        //     $temp_domain_mapping_db = $this->domain_mapping_model
        //         ->join('domain', 'domain_mapping.dm_dmn_code = domain.dmn_code', 'left')
        //         ->join('subject_main', 'domain_mapping.dm_sbm_id = subject_main.sbm_id', 'left')
        //         ->join('domain_group', 'domain_group.dg_id = domain.dmn_dg_id')
        //         ->where('domain_mapping.dm_dskpn_id', $ex_dskpn_id)
        //         ->whereIn('domain_group.dg_title', ['Pengetahuan Asas', 'Kemandirian', 'Kualiti Keperibadian'])
        //         ->findAll();

        //     $temp_domain_map = [];

        //     foreach ($temp_domain_mapping_db as $item) {
        //         $temp_domain_map['\'' . $item['sbm_code'] . '\''][] = $item['dmn_id'];
        //         // Nak kne tgok balik line atas ni sbb tak guna domain_id dah
        //     }

        //     $data['domain_map_session'] = $temp_domain_map;
        // }

        $data['subjects'] = [];
        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.ctm_desc, cluster_main.ctm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
                ->join('cluster_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            //steps 1 - get all subjects related to iterate horizontally
            //steps 1.1 - get learning standard to get list of subject.
            $data['subjects'] = $this->subject_model->select('subject_main.sbm_id, subject_main.sbm_code, subject_main.sbm_desc')
                ->join('learning_standard as ls', 'ls.ls_sbm_id = subject_main.sbm_id')
                ->where('ls.ls_dskpn_id', $data['dskpn_id'])->where('ls.ls_deleted_at', null)->findAll();
        }

        //steps 2 - get 4 mapping group components
        //steps 2.1 - get all id for 4 group_name
        $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Kualiti Keperibadian', 'Kemandirian', 'Pengetahuan Asas', '7 Kemahiran Insaniah'])->find();
        $rules_7ki = [
            'KI1' => [
                'DKM2',
                'DKM3',
                'DKM7',
                'DKM8',
                'DKM11'
            ],
            'KI2' => [
                'DKM1',
                'DKM9'
            ],
            'KI3' => [
                'DKM16'
            ],
            'KI4' => [
                'DKM10'
            ],
            'KI5' => [
                'DKM4',
                'DKM12',
                'DKM13',
                'DKM14'
            ],
            'KI6' => [
                'DKM5'
            ],
            'KI7' => [
                'DKM6',
                'DKM15'
            ]
        ];
        $ki_rules = [];

        //steps 2.2 - get all item for all group
        //steps 2.3 - store all retrieved item
        $tempDomainz = [];
        foreach ($allGroup as $group) {
            $data[$group['dg_title']] = $this->domain_model->select('dmn_code, dmn_desc, dmn_id')->where('dmn_dg_id', $group['dg_id'])->orderBy('dmn_id', 'ASC')->find();

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
                if ($d['dmn_code'] == $key) {
                    $ki_rules[$d['dmn_id']] = null; //create array with related key first
                    $cur_d_id = $d['dmn_id'];
                }
            }

            //loop rules inside KI
            foreach ($domainz as $rule) {
                foreach ($tempDomainz as $d) {
                    if ($d['dmn_code'] == $rule) {
                        $ki_rules[$cur_d_id][] = $d['dmn_id'];
                    }
                }
            }
        }
        // dd($data[$group['dg_title']]);


        $data['ki_rules'] = $ki_rules;

        $script = ['data', 'dynamic-input', 'kemahiran_insaniah'];
        $style = ['static-field'];
        $this->render_jscss('domain_mapping', $data, $script, $style);
    }

    public function mapping_kompetensi_teras()
    {
        $data = [];

        //if update then, get from db
        $is_update_Core = $this->session->get("is_update_core");
        $core_map_sess = $this->session->get("core_map_sess");

        $data['dskpn_id'] = $this->session->get("dskpn_id");
        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.ctm_desc, cluster_main.ctm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
                ->join('cluster_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            //step 1 - get all subjects related to iterate horizontally
            //step 1.1 - get learning standard to get list of subject.
            $data['subjects'] = $this->subject_model->select('subject_main.sbm_code, subject_main.sbm_desc, subject_main.sbm_id, ls.ls_id')
                ->join('learning_standard as ls', 'ls.ls_sbm_id = subject_main.sbm_id')
                ->where('ls.ls_dskpn_id', $data['dskpn_id'])->where('ls.ls_deleted_at', null)->findAll();

            //step 2.0 - get all core_competency from subjects
            $subjectIdsArray = [];
            $subjectCodeArray = [];
            foreach ($data['subjects'] as $subject) {
                $subjectIdsArray[] = $subject['sbm_id'];
                $subjectCodeArray[] = $subject['sbm_code'];
            }

            //dd(['ids' => $subjectIdsArray, 'code' => $subjectCodeArray]); //OK

            $core_competency = [];
            foreach ($subjectIdsArray as $index => $subject_id) {
                $batch_num = 0;
                $check_core_competency = $this->core_competency_model->where('cc_sbm_id', $subject_id)->orderBy('cc_id', 'DESC')->first();
                if (isset($check_core_competency) && !empty($check_core_competency))
                    $batch_num = $check_core_competency['cc_batch'];

                $core_competency_temp = $this->core_competency_model->where('cc_sbm_id', $subject_id)->where('cc_batch', $batch_num)->findAll();
                $core_competency[$index] = $core_competency_temp; //array_merge($core_competency, $core_competency_temp);
            }

            //dd($core_competency); //OKK

            //step 2.1 - structuring the data to pass over view
            foreach ($subjectIdsArray as $index => $sbm_id) {
                if (isset($is_update_Core) && !empty($is_update_Core)) {
                    foreach ($core_competency[$index] as $i => $item) {
                        if ($sbm_id == $item['cc_sbm_id']) {
                            $flag = false;
                            //dd($core_map_sess[$index][$subjectCodeArray[$index]]); //OKK
                            if (isset($core_map_sess[$index][$subjectCodeArray[$index]]) && !empty($core_map_sess[$index][$subjectCodeArray[$index]]))
                                foreach ($core_map_sess[$index][$subjectCodeArray[$index]] as $core) {
                                    if ($core[0] == $item['cc_code']) {
                                        $flag = true;
                                        $data['core_competency_item'][$index][$sbm_id][] = array($item['cc_code'], $item['cc_desc'], $core[1]);
                                    }
                                }
                            if (!$flag)
                                $data['core_competency_item'][$index][$sbm_id][] = array($item['cc_code'], $item['cc_desc'], 'N');
                        }
                    }
                } else {
                    foreach ($core_competency[$index] as $item) {
                        if ($sbm_id == $item['cc_sbm_id'])
                            $data['core_competency_item'][$index][$sbm_id][] = array($item['cc_code'], $item['cc_desc'], 'N');
                    }
                }
            }
        }

        $script = ['kompetensi-teras'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_kompetensi_teras', $data, $script, $style);
    }

    public function mapping_spesifikasi_dskpn()
    {
        $data = [];
        $data['dskpn_id'] = $this->session->get("dskpn_id");
        $data['review'] = $this->request->getVar('review');
        $data['specification_maplist'] = $this->session->get("specification_mapist_sess");
        $data['new_specification_input'] = $this->session->get("new_specification_input_details");

        //if update then, get from db
        // $is_update = $this->session->get("is_update");
        // $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        // if (isset($is_update) && empty($data['specification_maplist'])) {
        //     $temp_specification_mapping_db = $this->domain_mapping_model
        //         ->join('domain', 'domain_mapping.d_id = domain.d_id', 'left')
        //         ->join('domain_group', 'domain_group.dg_id = domain.gd_id')
        //         ->join('extra_additional_field', 'extra_additional_field.dm_id = domain_mapping.dm_id', 'left')
        //         ->where('domain_mapping.dskpn_id', $ex_dskpn_id)
        //         ->whereIn('domain_group.dg_title', ['Reka Bentuk Instruksi', 'Integrasi Teknologi', 'Pendekatan', 'Kaedah'])
        //         ->findAll();

        //     $temp_specification_map = [];
        //     foreach ($temp_specification_mapping_db as $item) {
        //         $temp_specification_map[] = $item['d_id'];
        //         if ($item['eaf_desc'] != null || !empty($item['eaf_desc']))
        //             $data['specification_lain_lain'] = $item['eaf_desc'];
        //     }

        //     $data['specification_maplist'] = $temp_specification_map;
        // }

        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.ctm_desc, cluster_main.ctm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
                ->join('cluster_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();
        }

        //steps 1 - get 4 mapping group components
        //steps 1.1 - get all id for 4 group_name
        //$allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Reka Bentuk Instruksi', 'Integrasi Teknologi', 'Pendekatan', 'Kaedah'])->find();
        $data['allGroup'] = $this->teaching_approach_category_model->select('tappc_id, tappc_allow_modify, tappc_desc')->findAll();

        //steps 2.1 - get all item for all group
        //steps 2.2 - store all retrieved item

        foreach ($data['allGroup'] as $group) {
            //$data[$group['dg_title']] = $this->domain_model->select('dmn_desc, dmn_id')->where('dmn_dg_id', $group['dg_id'])->orderBy('dmn_id', 'ASC')->find();
            $data[$group['tappc_desc']] = $this->teaching_approach_model->select('tapp_desc, tapp_id')->where('tapp_tappc_id', $group['tappc_id'])->where('tapp_status', 1)->orderBy('tapp_id', 'ASC')->findAll();
        }

        $script = ['mapping_spesification'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('mapping_spesifikasi_dskpn', $data, $script, $style);
    }

    public function activity_and_assessment()
    {
        $data = [];
        $data['dskpn_id'] = $this->session->get("dskpn_id");

        $data['abm_session'] = $this->session->get("abm");
        $data['assessment_input_session'] = $this->session->get("assessment_input");
        $data['assessment_number_session'] = $this->session->get("assessment_number");
        $data['activity_number'] = $this->session->get("activity_idea_number");
        $data['activity_input'] = $this->session->get("activity_idea_input");
        $data['parent_involve'] = $this->session->get("parent_involve");

        //if update then, get from db
        // $is_update = $this->session->get("is_update");
        // $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        // if (isset($is_update) && empty($data['act_assess_idea_pengajaran'])) {
        //     $temp_act_asses_mapping_db = $this->dskpn_model
        //         ->join('activity_assessment', 'activity_assessment.aa_id = dskpn.aa_id')
        //         ->where('dskpn_id', $ex_dskpn_id)
        //         ->first();

        //     $temp_abm_list = $this->learning_aid_model->select('la_desc')->where('dskpn_id', $ex_dskpn_id)->findAll();

        //     if (!empty($temp_act_asses_mapping_db)) {
        //         $data['act_assess_pentaksiran'] = $temp_act_asses_mapping_db['aa_assessment_desc'];
        //         $data['act_assess_idea_pengajaran'] = $temp_act_asses_mapping_db['aa_activity_desc'];
        //         $data['act_assess_parent_involve'] = $temp_act_asses_mapping_db['aa_is_parental_involved'];
        //     }

        //     // Initialize
        //     $data['act_assess_abm'] = [];

        //     // Iterate over the results and add 'la_desc' values to the output array
        //     foreach ($temp_abm_list as $result) {
        //         $data['act_assess_abm'][] = $result['la_desc'];
        //     }
        // }

        if (!empty($data['dskpn_id'])) {
            $data['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.ctm_desc, cluster_main.ctm_id')
                ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
                ->join('cluster_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id')
                ->where('dskpn.dskpn_id', $data['dskpn_id'])->first();

            $data['assessment_category'] = $this->assessment_category_model->findAll();
        }

        $script = ['activity_assessment'];
        $style = ['static-field'];
        $this->render_jscss('mapping_assessment_and_activity', $data, $script, $style);
    }

    public function store_activity_assessment()
    {
        $dskpn_id = $this->session->get("dskpn_id");

        //get from payload
        $abm = $this->request->getPost('abm');
        $activity_idea_number = $this->request->getPost('activity-idea-number');
        $activity_idea_input = $this->request->getPost('activity-idea-input');
        $assessment_number = $this->request->getPost('assessment-number');
        $assessment_input = $this->request->getPost('assessment-input');
        $parent_involve = $this->request->getPost('parent-involvement');

        //for check this is for update purpose
        $is_update_activity_assessment = $this->session->get('is_update_activity_assessment');
        if (isset($is_update_activity_assessment) && !empty($is_update_activity_assessment)) {
            //1.0 - remove activity
            $this->activity_item_model->where('aci_dskpn_id', $dskpn_id)->delete();

            //2.0 - remove assessment
            $this->assessment_item_model->where('asi_dskpn_id', $dskpn_id)->delete();

            //3.0 - remove abm
            $this->learning_aid_model->where('la_dskpn_id', $dskpn_id)->delete();
        }

        // Start the transaction
        $this->db->transBegin();

        // step 1 - insert activity
        if (!empty($activity_idea_input))
            foreach ($activity_idea_input as $index => $activity) {
                $this->activity_item_model->insert([
                    'aci_dskpn_id' => $dskpn_id,
                    'aci_number' => isset($activity_idea_number[$index]) ? $activity_idea_number[$index] : '',
                    'aci_desc' => $activity
                ]);
            }

        // step 2 - insert assessment
        if (!empty($assessment_input))
            foreach ($assessment_input as $asc_id => $assess) {
                foreach ($assess as $index => $item) {
                    $this->assessment_item_model->insert([
                        'asi_dskpn_id'  => $dskpn_id,
                        'asi_desc_number' => isset($assessment_number[$asc_id][$index]) ? $assessment_number[$asc_id][$index] : '',
                        'asi_desc' => $item,
                        'asi_asc_id' => $asc_id
                    ]);
                }
            }

        // step 3 - insert abm
        if (!empty($abm))
            foreach ($abm as $item) {
                $this->learning_aid_model->insert([
                    'la_dskpn_id' => $dskpn_id,
                    'la_desc' => $item
                ]);
            }

        // step 4 - update dskpn - parental-involvement
        $this->dskpn_model->update($dskpn_id, [
            'dskpn_parent_involvement' => $parent_involve
        ]);

        // Complete the transaction
        $this->db->transCommit();

        //set session
        $this->session->set('abm', $abm);
        $this->session->set('activity_idea_number', $activity_idea_number);
        $this->session->set('activity_idea_input', $activity_idea_input);
        $this->session->set('assessment_number', $assessment_number);
        $this->session->set('assessment_input', $assessment_input);
        $this->session->set('parent_involve', $parent_involve);
        $this->session->set('is_update_activity_assessment', 'Y');

        if ($this->db->transStatus() === FALSE)
            return redirect()->back()->with('fail', 'Operation failed. Data has been rolled back.');

        return redirect()->to(route_to('mapping_dynamic_dskpn'));
    }

    public function mapping_successfully()
    {
        $data = [];
        $data['dskpn_id'] = $this->session->get("dskpn_id");
        $data['dskpn_code'] = $this->session->get("dskpn_code");

        //update dskpn status
        $this->dskpn_model->update($data['dskpn_id'], [
            'dskpn_status' => null
        ]);

        $this->_destroy_all_session();

        $script = [];
        $style = [];
        $this->render_jscss('mapping_successfully', $data, $script, $style);
    }

    private function _destroy_all_session($exclude = [])
    {
        $sessionData = session()->get();

        $excludeKeys = [
            '__ci_last_regenerate',
            '_ci_previous_url',
            'sm_id',
            'by_id',
            'icno',
            'nickname',
            'fullname',
            'current_role',
            'list_current_role',
            'ccm_id',
            'ccm_name',
            'tm_id'
        ];

        // Remove elements in $exclude from $excludeKeys
        $result = array_diff($excludeKeys, $exclude);

        // Re-index the array if necessary
        $excludeKeys = array_values($result);

        foreach ($sessionData as $key => $value) {
            if (!in_array($key, $excludeKeys)) {
                session()->remove($key);
            }
        }
    }

    public function set_session_edit_dskpn($ex_dskpn_id)
    {
        helper('dskpn_helper');
        $this->_destroy_all_session();
        $is_draft = $this->request->getVar('draft');

        //page - Penetapan Standard Pembelajaran
        //set all attribute
        $this->session->set('is_update', true); //need to check if currently update process
        if (!empty($ex_dskpn_id))
            $this->session->set('ex_dskpn_id', $ex_dskpn_id);

        $dskpn = $this->dskpn_model->where('dskpn_id', $ex_dskpn_id)
            //->join('objective_performance', 'objective_performance.opm_dskpn_id = dskpn.dskpn_id')
            ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
            ->join('cluster_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id')
            ->first();

        //set session
        $this->session->set('tm_id', $dskpn['dskpn_tm_id']);

        $learning_standard = $this->learning_standard_model->where('ls_dskpn_id', $ex_dskpn_id)
            ->join('subject_main', 'subject_main.sbm_id = learning_standard.ls_sbm_id')
            ->join('learning_standard_item', 'learning_standard_item.lsi_ls_id = learning_standard.ls_id')
            ->findAll();

        $subject_list = $this->learning_standard_model->select('sbm_id, ls_id')->where('ls_dskpn_id', $ex_dskpn_id)
            ->join('subject_main', 'subject_main.sbm_id = learning_standard.ls_sbm_id')
            ->join('learning_standard_item', 'learning_standard_item.lsi_ls_id = learning_standard.ls_id')
            ->groupBy('ls_id,ls_sbm_id')
            ->findAll();

        $subject = [];
        $subject_description = [];
        $subject_standard_numbering = [];
        $learning_standard_ids = [];
        foreach ($subject_list as $index => $sbjk) {
            $subject[] = $sbjk['sbm_id'];
            foreach ($learning_standard as $item) {
                if ($item['ls_id'] == $sbjk['ls_id']) {
                    $subject_description[$item['sbm_id']][$index][] = $item['lsi_desc'];
                    $subject_standard_numbering[$item['sbm_id']][$index][] = $item['lsi_number'];

                    if (!in_array($item['ls_id'], $learning_standard_ids))
                        $learning_standard_ids[] = $item['ls_id'];
                }
            }
        }

        //dd($subject_standard_numbering);

        $this->session->set('subject', $subject);

        //dskpn_code_init (x)
        //dskpn_code (x)
        //$this->session->set('is_update', 'Y'); if draft + ex_dskpn_id must same. then only update
        //is_update_TP":"Y" //if draft this one is needed
        if (isset($is_draft) && !empty($is_draft)) {
            $this->session->set('dskpn_code_init', $ex_dskpn_id);
            $this->session->set('dskpn_code', $ex_dskpn_id);
            $this->session->set('is_update', 'Y');
            $this->session->set('is_update_TP', 'Y');
        }

        $this->session->set('subject_description', $subject_description);
        $this->session->set('subject_standard_numbering', $subject_standard_numbering);
        $this->session->set('kluster', $dskpn['ctm_id']);
        $this->session->set('cluster_id', $dskpn['ctm_id']);
        $this->session->set('tahun', year_to_string($dskpn['tm_year']));
        $this->session->set('topik', $dskpn['tm_id']);
        $this->session->set('topic_id', $dskpn['tm_id']);
        $this->session->set('duration', $dskpn['dskpn_duration']);
        $this->session->set('tema', $dskpn['dskpn_theme']);
        $this->session->set('subtema', $dskpn['dskpn_sub_theme']);
        $this->session->set('dskpn_id', $dskpn['dskpn_id']);
        $this->session->set('learning_standard_id', $learning_standard_ids);
        $objective_perform = $this->objective_performance_model->where('opm_dskpn_id', $ex_dskpn_id)->findAll();
        $objective = [];
        $objective_number = [];
        $objective_ref = [];
        $objective_assessment = [];
        $arr_objective_ref = [];
        $arr_objective_assessment = [];
        $objective_performance_selection_listing = [];
        foreach ($objective_perform as $opm) {
            $objective[] = $opm['opm_desc'];
            $objective_number[] = $opm['opm_number'];
            $rand = generateRandomNumber();
            $orc = $this->opm_reff_code_model->where('orc_opm_id', $opm['opm_id'])->findAll();
            $objective_ref[$rand] = !empty($orc) ? array_column($orc, 'orc_code') : [];

            if (isset($orc) && !empty($orc)) {
                $objective_performance_selection_listing = array_merge($objective_performance_selection_listing, array_column($orc, 'orc_code'));
                $arr_objective_ref[] = array_column($orc, 'orc_code');
            }

            $oac = $this->opm_assessment_code_model->where('oac_opm_id', $opm['opm_id'])->findAll();
            $objective_assessment[$rand] = !empty($oac) ? array_column($oac, 'oac_code') : [];

            if (isset($oac) && !empty($oac))
                $arr_objective_assessment[] = array_column($oac, 'oac_code');
        }
        $this->session->set('objective', $objective);
        $this->session->set('objective_number', $objective_number);
        $this->session->set('objective_ref', $objective_ref);
        $this->session->set('objective_assessment', $objective_assessment);
        $this->session->set('arr_objective_ref', $arr_objective_ref);
        $this->session->set('arr_objective_assessment', $arr_objective_assessment);
        $this->session->set('objective_performance_selection_listing', json_encode($objective_performance_selection_listing));
        //end page - Penetapan Standard Pembelajaran

        //page - Penetapan Tahap Penguasaan
        $tp_map = $this->standard_performance_dskp_mapping_model->where('spdm_dskpn_id', $ex_dskpn_id)->findAll();
        $tp_sess_refcode = [];
        foreach ($tp_map as $tp)
            $tp_sess_refcode[] = $tp['spdm_dskp_code'];
        $this->session->set('tp_sess_refcode', $tp_sess_refcode);
        //end page - Penetapan Tahap Penguasaan

        //page - Penetapan Pemetaan Teras
        $core_map = $this->competency_mapping_model->where('cmp_dskpn_id', $ex_dskpn_id)
            ->join('core_competency', 'core_competency.cc_code = competency_mapping.cmp_cc_code AND core_competency.cc_batch = competency_mapping.cmp_cc_batch')
            ->join('subject_main', 'core_competency.cc_sbm_id = subject_main.sbm_id')
            ->findAll();

        $core_map_sess = [];
        $core_mapping_id_session_data = [];
        $column_index_is_null = false;
        foreach ($core_map as $cmp) {
            if (!is_null($cmp['cmp_column_index'])) {
                $core_map_sess[$cmp['cmp_column_index']][$cmp['sbm_code']][$cmp['cmp_id']] = [$cmp['cmp_cc_code'], 'Y'];

                if (!in_array($cmp['cmp_id'], $core_mapping_id_session_data))
                    $core_mapping_id_session_data[] = (int)$cmp['cmp_id'];
            } else {
                $column_index_is_null = true;
            }
        }
        if ($column_index_is_null) {
            for ($i = 0; $i < count($subject_list); $i++) {
                foreach ($core_map as $cmp) {
                    if ($subject_list[$i]['sbm_id'] == $cmp['sbm_id']) {
                        $core_map_sess[$i][$cmp['sbm_code']][$cmp['cmp_id']] = [$cmp['cmp_cc_code'], 'Y'];

                        if (!in_array($cmp['cmp_id'], $core_mapping_id_session_data))
                            $core_mapping_id_session_data[] = (int)$cmp['cmp_id'];
                    }
                }
            }
        }

        $this->session->set('core_map_sess', $core_map_sess);
        $this->session->set('core_mapping_id_session_data', $core_mapping_id_session_data);
        $this->session->set('is_update_core', 'Y'); //is must - to display - but make sure dskpn_id is current new dskpn_id
        //end page - Penetapan Pemetaan Teras

        //page - Penetapan Pemetaan Domain
        $domain_map_session = [];
        $domain_map_id_session_data = [];
        $domain_map = $this->domain_mapping_model->where('dm_dskpn_id', $ex_dskpn_id)
            ->join('subject_main', 'subject_main.sbm_id = domain_mapping.dm_sbm_id')
            ->join('domain', 'domain.dmn_code = domain_mapping.dm_dmn_code')
            ->findAll();

        $column_index_is_null = false;
        foreach ($domain_map as $dmp) {
            if (!is_null($dmp['dm_column_index'])) {
                $domain_map_session[$dmp['dm_column_index']]["'" . $dmp['sbm_code'] . "'"][] = $dmp['dmn_id'];
                $domain_map_id_session_data[] = (int)$dmp['dm_id'];
            } else {
                $column_index_is_null = true;
            }
        }
        if ($column_index_is_null) {
            for ($i = 0; $i < count($subject_list); $i++) {
                foreach ($domain_map as $dmp) {
                    if ($subject_list[$i]['sbm_id'] == $dmp['dm_sbm_id']) {
                        $domain_map_session[$i]["'" . $dmp['sbm_code'] . "'"][] = $dmp['dmn_id'];
                        $domain_map_id_session_data[] = (int)$dmp['dm_id'];
                    }
                }
            }
        }

        $this->session->set('domain_map_session', $domain_map_session);
        $this->session->set('domain_map_id_session_data', $domain_map_id_session_data);
        $this->session->set('is_update_domain', 'Y');
        //end page - Penetapan Pemetaan Domain

        //page - Penetapan Pemetaan Aktiviti & Pentaksiran
        $activity_idea_number = [];
        $activity_idea_input = [];
        $assessment_number = [];
        $assessment_input = [];
        $abm = array_column($this->learning_aid_model->where('la_dskpn_id', $ex_dskpn_id)->findAll() ?? [], 'la_desc');
        $this->session->set('abm', $abm);

        $activity_idea = $this->activity_item_model->where('aci_dskpn_id', $ex_dskpn_id)->findAll();
        foreach ($activity_idea as $act_item) {
            $activity_idea_number[] = $act_item['aci_number'];
            $activity_idea_input[] = $act_item['aci_desc'];
        }

        $this->session->set('activity_idea_number', $activity_idea_number);
        $this->session->set('activity_idea_input', $activity_idea_input);

        $assess = $this->assessment_item_model->where('asi_dskpn_id', $ex_dskpn_id)->findAll();
        foreach ($assess as $asses_item) {
            $assessment_number[$asses_item['asi_asc_id']][] = $asses_item['asi_desc_number'];
            $assessment_input[$asses_item['asi_asc_id']][] = $asses_item['asi_desc'];
        }
        $this->session->set('assessment_number', $assessment_number);
        $this->session->set('assessment_input', $assessment_input);


        $this->session->set('parent_involve', $dskpn['dskpn_parent_involvement'] ?? null);
        $this->session->set('is_update_activity_assessment', 'Y');
        //end page - Penetapan Pemetaan Aktiviti & Pentaksiran

        //page - Penetapan Pemetaan Spesifikasi
        $specification_mapist_sess = [];
        $specification_mapping_id_list_sess = [];
        $new_specification_id_list_sess = [];
        $new_specification_input_details = [];
        $specs_map = $this->teaching_approach_mapping_model->where('tappm_dskpn_id', $ex_dskpn_id)
            ->join('teaching_approach', 'teaching_approach.tapp_id = teaching_approach_mapping.tappm_tapp_id')
            ->findAll();
        foreach ($specs_map as $sp_map) {
            $specification_mapist_sess[] = (string)$sp_map['tappm_tapp_id'];
            $specification_mapping_id_list_sess[] = (int)$sp_map['tappm_id'];

            if ((int)$sp_map['tapp_id'] > 23) {
                $new_specification_id_list_sess[] = (int)$sp_map['tappm_tapp_id'];
                $new_specification_input_details[$sp_map['tapp_tappc_id']][] = [$sp_map['tapp_desc'], (string)$sp_map['tapp_id']];
            }
        }
        $this->session->set('specification_mapist_sess', $specification_mapist_sess);
        $this->session->set('specification_mapping_id_list_sess', $specification_mapping_id_list_sess);
        $this->session->set('is_update_specs', 'Y');
        $this->session->set('new_specification_id_list_sess', $new_specification_id_list_sess);
        $this->session->set('new_specification_input_details', $new_specification_input_details);
        //end page - Penetapan Pemetaan Spesifikasi

        return redirect()->to(route_to('dskpn_learning_standard') . "?flag=true");
    }

    public function store_cluster_subject_mapping()
    {
        $data = [];
        $ctm_id = $this->request->getPost("ctm_id");

        // Get the POST data
        $subjects = $this->request->getPost('subject');
        // Iterate over each selected subject and save to the database
        foreach ($subjects as $subjectId) {
            $data = [
                'csm_ctm_id' => $ctm_id,
                'csm_sbm_id' => $subjectId,
            ];

            $this->cluster_subject_mapping_model->insert($data);
        }
        // Set success message and redirect back
        // return redirect()->to(route_to('create_dskpn', $tm_id));
        session()->setFlashdata('success', 'Pemetaan Subjek Berjaya!');

        return redirect()->back();
    }
    public function store_specification_mapping()
    {
        $data = [];
        $dskpn_id = $this->session->get("dskpn_id");
        $is_update_specs = $this->session->get('is_update_specs');

        $allData = $this->request->getPost();

        $success = true;

        $specification_mapist_data = [];
        $specification_mapping_id_list = [];
        $new_specification_id_list = [];
        $new_specification_input_details = [];

        if (isset($is_update_specs) && !empty($is_update_specs)) {
            $old_specification = $this->session->get('new_specification_id_list_sess');

            //step 1 - remove teaching_approach_mapping
            $this->teaching_approach_mapping_model->where('tappm_dskpn_id', $dskpn_id)->delete();

            //step 2 - remove newly added teaching_approach
            if (!empty($old_specification))
                $this->teaching_approach_model->whereIn('tapp_id', $old_specification)->delete();
        }

        //if have new-item then insert
        $newItem = $this->request->getPost('new-item');
        $newItemChecked = $this->request->getPost('new-item-checked');
        if (isset($newItem) && !empty($newItem)) {
            foreach ($newItem as $tappc_id => $itemArr) {
                foreach ($itemArr as $randomItemID => $item_desc) {
                    // $checkExists = $this->teaching_approach_model->where(['tapp_desc' => $item_desc, 'tapp_status' => 2, 'tapp_tappc_id' => $tappc_id])->first();
                    // if(empty($checkExists))
                    // {
                    //     $this->teaching_approach_model->insert([
                    //         'tapp_desc' => $item_desc,
                    //         'tapp_status' => 2,
                    //         'tapp_tappc_id' => $tappc_id
                    //     ]);

                    //     $insertedID = $this->teaching_approach_model->insertID();
                    // } else {
                    //     $insertedID = $checkExists['tapp_id'];
                    // }
                    $this->teaching_approach_model->insert([
                        'tapp_desc' => $item_desc,
                        'tapp_status' => 2,
                        'tapp_tappc_id' => $tappc_id
                    ]);

                    $insertedID = $this->teaching_approach_model->insertID();
                    $new_specification_id_list[] = $insertedID;
                    $new_specification_input_details[$tappc_id][] = [$item_desc, $insertedID];

                    if (isset($newItemChecked[$tappc_id][$randomItemID]) && $newItemChecked[$tappc_id][$randomItemID] == $tappc_id) {
                        $this->teaching_approach_mapping_model->insert([
                            'tappm_tapp_id' => $insertedID,
                            'tappm_dskpn_id' => $dskpn_id
                        ]);
                        $specification_mapist_data[] = $insertedID;
                        $specification_mapping_id_list[] = $this->teaching_approach_mapping_model->insertID();
                    }
                }
            }
        }

        //structure data first
        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            if ($parts[0] == 'input') {
                $d_id = $parts[1];

                if ($this->teaching_approach_mapping_model->insert([
                    'tappm_tapp_id' => $d_id,
                    'tappm_dskpn_id' => $dskpn_id
                ])) {
                    $specification_mapist_data[] = $d_id;
                    $specification_mapping_id_list[] = $this->teaching_approach_mapping_model->insertID();
                } else {
                    $success = false;
                }
            }
        }

        $this->session->set('specification_mapist_sess', $specification_mapist_data);
        $this->session->set('specification_mapping_id_list_sess', $specification_mapping_id_list);
        $this->session->set('new_specification_id_list_sess', $new_specification_id_list);
        $this->session->set('new_specification_input_details', $new_specification_input_details);
        $this->session->set('is_update_specs', 'Y');

        if ($success)
            if ($this->request->getPost('submit_status') == 'check_dskpn')
                return redirect()->back()->with('new_tab_dskpn', route_to('generate_dskpn'));
            else
                return redirect()->to(route_to('dskpn_complete'));

        return redirect()->back();
    }

    public function store_standard_learning()
    {
        $data = [];

        // Retrieve tm_id from session
        $sm_id          = $this->session->get('sm_id');

        //part 0
        $allSubject     = $this->request->getPost('subject'); //multi-array
        $allDescription = $this->request->getPost('subject_description'); //multi-array - first loop (refers to subject = key = sm_id) - second loop (subject column) - third loop (refers to item mapped)
        $standardNumbering = $this->request->getPost('standard-learning-number');

        //May20, 2025 - new structure of subject_description.
        //request to able capture learning standard for 3 same subject.
        //New structure: subject_description[subject_id][subject_column_index][items]

        //decode description.
        foreach ($allSubject as $subject) {
            if(isset($allDescription[$subject]))
            foreach ($allDescription[$subject] as $subject_column_index => &$item_maps) {
                // Decode semua item dalam $item_maps
                if(is_array($item_maps) || is_object($item_maps))
                foreach ($item_maps as $item_map_key => &$item) {
                    $item = urldecode($item);
                }
                //$allDescription[$subject][$itemIndex] = urldecode($itemDesc); //previous structure 2D
            }
        }
        //dd(['data' => $allDescription, 'numbering' => $standardNumbering]);

        //set session for part 0
        $this->session->set('subject', $allSubject);
        $this->session->set('subject_description', $allDescription);
        $this->session->set('subject_standard_numbering', $standardNumbering);

        //part A
        $kluster        = $this->request->getPost('kluster');
        $tahun          = $this->request->getPost('tahun');
        $topik          = $this->request->getPost('topik');
        $tema           = $this->request->getPost('tema');
        $subtema        = $this->request->getPost('subtema');
        $duration       = $this->request->getPost('duration');
        $json_objective_performance_selection_listing = $this->request->getPost('objective-performance-selection-listing');
        //set in session for Part A
        $this->session->set('kluster', $kluster);
        $this->session->set('tahun', $tahun);
        $this->session->set('topik', $topik);
        $this->session->set('duration', $duration);
        $this->session->set('tema', $tema);
        $this->session->set('subtema', $subtema);
        $this->session->set('objective_performance_selection_listing', $json_objective_performance_selection_listing);

        //objective part
        $objective              = $this->request->getPost('objective-prestasi-desc');
        $objectiveNumber        = $this->request->getPost('objective-prestasi-number');
        $objectiveRef           = $this->request->getPost('objective-prestasi-ref');
        $objectiveAssessment    = $this->request->getPost('objective-prestasi-pentaksiran');

        //set in session for objective part
        $this->session->set('objective', $objective);
        $this->session->set('objective_number', $objectiveNumber);
        $this->session->set('objective_ref', $objectiveRef);
        $this->session->set('objective_assessment', $objectiveAssessment);

        //pentaksiran part

        $dskpn_code_init = $this->session->get('dskpn_code_init');
        $isUpdated      = $this->session->get('is_update');

        $data['cluster_id'] = $kluster;
        $data['topic_id'] = $topik;

        if (empty($this->session->get('tm_id')))
            $this->session->set('tm_id', $topik);

        $dskpn_create_update_status = false;
        //means need to update
        if (!empty($isUpdated) && $isUpdated != 'N') {
            $data['dskpn_id']     = $this->session->get('dskpn_id');
            $learning_standard_id = $this->session->get('learning_standard_id');

            //step 1 - update DSKPN
            $dskpn_create_update_status = $this->dskpn_model->update($data['dskpn_id'], [
                'dskpn_duration'    => $duration,
                'dskpn_theme'       => $tema,
                'dskpn_sub_theme'   => $subtema
            ]);

            //step 2 - delete object performance
            $this->objective_performance_model->where('opm_dskpn_id', $data['dskpn_id'])->delete();

            //step 3 - delete learning-standard
            $this->learning_standard_model->where('ls_dskpn_id', $data['dskpn_id'])->delete();

            //step 4 - delete learning-standard-item
            if (!empty($learning_standard_id))
                $this->learning_standard_item_model->whereIn('lsi_ls_id', $learning_standard_id)->delete();
        } else {
            //else - create dskpn
            $dskpn_create_update_status = $this->dskpn_model->insert([
                'dskpn_code'        => $dskpn_code_init,
                'dskpn_theme'       => $tema,
                'dskpn_sub_theme'   => $subtema,
                'dskpn_status'      => 5,
                'dskpn_remarks'     => null,
                'dskpn_delete_reason' => null,
                'dskpn_created_by'  => $sm_id, //sm_id is not subject_main ID
                'dskpn_updated_by'  => null,
                'dskpn_approved_by' => null,
                'dskpn_tm_id'       => $topik,
                'dskpn_version'     => null,
                'dskpn_duration'    => $duration,
                'dskpn_parent_involvement' => null,
                'dskpn_notes'       => null
            ]);
            $data['dskpn_id'] = $dskpn_create_update_status ? $this->dskpn_model->insertID() : '';
        }
        // Retrieve tm_year from db to be used in dskpn code
        $tm_data = $this->topic_model->where('tm_id', $topik)->first();

        // Count dskpn by topic
        $dskpn_by_topic_count = $this->dskpn_model
            ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
            ->where('dskpn.dskpn_tm_id', $topik)
            ->where('topic_main.tm_year', $tm_data['tm_year'])
            ->countAllResults();

        // backup-plan
        if (!isset($dskpn_code_init))
            $dskpn_code_init = 'K' . $kluster . 'T' . $tm_data['tm_year'] . '-' . sprintf('%03d', $dskpn_by_topic_count + 1);

        //step 1 - create DSKPN
        $arr_objective_ref = [];
        $arr_objective_assessment = [];
        if ($dskpn_create_update_status) {
            //step 2 - add objective performance
            if(isset($objective))
            foreach ($objective as $index => $obj) {
                $this->objective_performance_model->insert([
                    'opm_number'        => isset($objectiveNumber[$index]) ? $objectiveNumber[$index] : null,
                    'opm_desc'          => $obj,
                    'opm_dskpn_id'      => $data['dskpn_id']
                ]);

                $op_last_id = $this->objective_performance_model->insertID();

                if (isset($objectiveRef)) {
                    $indeks = 0;
                    foreach ($objectiveRef as $key => $reffItem) {
                        if ($index == $indeks) {
                            foreach ($reffItem as $ref) {
                                // Check if the record already exists
                                $exists = $this->opm_reff_code_model->where([
                                    'orc_opm_id' => $op_last_id,
                                    'orc_code'   => $ref
                                ])->findAll();

                                if (empty($exists)) {
                                    // If it does not exist, insert the new record
                                    $this->opm_reff_code_model->insert([
                                        'orc_opm_id' => $op_last_id,
                                        'orc_code'   => $ref
                                    ]);
                                }
                                $arr_objective_ref[$indeks][] = $ref;
                            }
                        }
                        $indeks++;
                    }
                }

                if (isset($objectiveAssessment)) {
                    $indeks = 0;
                    foreach ($objectiveAssessment as $key => $assessmentItem) {
                        if ($index == $indeks) {
                            foreach ($assessmentItem as $asmt) {
                                $exists = $this->opm_assessment_code_model->where([
                                    'oac_opm_id' => $op_last_id,
                                    'oac_code'   => $asmt
                                ])->findAll();
                                if (empty($exists)) {
                                    $this->opm_assessment_code_model->insert(
                                        [
                                            'oac_opm_id' => $op_last_id,
                                            'oac_code'   => $asmt
                                        ]
                                    );
                                }
                                $arr_objective_assessment[$indeks][] = $asmt;
                            }
                        }
                        $indeks++;
                    }
                }
            }

            $index = 0;
            foreach ($allSubject as $subject) {
                //step 3 - insert learning-standard
                $this->learning_standard_model->insert([
                    'ls_sbm_id' => $subject,
                    'ls_dskpn_id' => $data['dskpn_id'] //temporary null
                ]);

                $ls_id = $this->learning_standard_model->insertID();
                $data['learning_standard_id'][] = $ls_id;

                // $max = 5;
                // $count = 0;
                // while($count < $max)
                // {
                //     if(!isset($allDescription[$subject][$index]))
                //     {
                //         $index++;
                //     } else {
                //         break;
                //     }
                //     $count++;
                // }
                
                $max = 0;
                while (!isset($allDescription[$subject][$index]) && $max < 5) {
                    $index++;
                    $max++;
                }

                // #NOTES - sini dah okey, dia dah linked dengan learning_standard yang berasingan 3...
                if(isset($allDescription[$subject][$index]))
                foreach ($allDescription[$subject][$index] as $itemIndex => $itemDesc) {
                    //step 4 - insert learning-standard-item
                    $this->learning_standard_item_model->insert([
                        'lsi_ls_id'     => $ls_id,
                        'lsi_number'    => isset($standardNumbering[$subject][$index][$itemIndex]) ? $standardNumbering[$subject][$index][$itemIndex] : null,
                        'lsi_desc'      => $itemDesc
                    ]);
                }
                $index++;
            }
        } else {
            die('DSKPN failed to be created. Please refreshed and try again!');
        }

        $this->session->set('arr_objective_ref', $arr_objective_ref);
        $this->session->set('arr_objective_assessment', $arr_objective_assessment);

        //http_build_query reverse process
        foreach ($data as $key => $val) {
            $this->session->set($key, $val);
        }

        $this->session->set('is_update', 'Y');
        $this->session->set('dskpn_code', $this->dskpn_model->where('dskpn_id', $this->session->get('dskpn_id'))->first()['dskpn_code']);

        return redirect()->to(route_to('tp_maintenance'));
    }

    public function store_standard_performance()
    {
        $dskpn_id   = $this->session->get("dskpn_id");
        $allRefCode = $this->request->getPost('sub_ref_code');
        $is_update_TP = $this->session->get("is_update_TP");

        if (!empty($is_update_TP) && $is_update_TP != "") {
            $this->standard_performance_dskp_mapping_model->where('spdm_dskpn_id', $dskpn_id)->delete();
        }

        foreach ($allRefCode as $item) {
            $sp_last_batch = $this->standard_performance_model->where('sp_dskp_code', $item)->orderBy('sp_id', 'DESC')->first();
            $this->standard_performance_dskp_mapping_model->insert([
                'spdm_dskp_code' => $item,
                'spdm_dskp_batch' => $sp_last_batch['sp_dskp_batch'],
                'spdm_dskpn_id' => $dskpn_id
            ]);
        }

        $this->session->set('is_update_TP', 'Y');
        $this->session->set('tp_sess_refcode', $allRefCode);

        return redirect()->to(route_to('mapping_core'));
    }

    public function store_domain_mapping()
    {
        $allData = $this->request->getPost();
        $dskpn_id = $this->session->get("dskpn_id");
        $ex_dskpn_id = $this->session->get("ex_dskpn_id");

        $success = true;

        $domain_map_session_data = [];
        $domain_map_id_session_data = [];

        $domain_map_sess = $this->session->get("domain_map_session");
        $domain_map_id_sess = $this->session->get("domain_map_id_session_data");

        if (empty($ex_dskpn_id) || ($ex_dskpn_id == $dskpn_id))
            if (isset($domain_map_sess) && (!empty($domain_map_sess) || $domain_map_sess != null) && isset($domain_map_id_sess)) {
                $this->domain_mapping_model->whereIn('dm_id', $domain_map_id_sess)
                    ->delete();
            }

        //get duplicate or not first
        $isSameSubject = [];
        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            if ($parts[0] == 'input') {
                $columnIndex = $parts[1];
                $subjectIndex = $parts[2];
                $isSameSubject[$columnIndex][] = $subjectIndex;
            }
        }
        //this part to check if contain same subject or not. if Smae, put running number/column index - to later used to differentiate.
        $curSubject = "";
        $duplicateDetected = false;
        foreach ($isSameSubject as $column_index => $isSame) {
            $curSubject = $isSame[0];
            foreach ($isSameSubject as $col_idx => $same) {
                if ($same[0] == $curSubject && $column_index != $col_idx)
                    $duplicateDetected = true;
            }
        }
        //end duplicate checking


        //probably loop 2/3/4 time only. because input were put in arrays.
        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            if ($parts[0] == 'input') {
                $columnIndex = $parts[1];
                $subjectIndex = $parts[2];

                //first repeatition max is only 4/5.
                $ls_id = $this->learning_standard_model->select('learning_standard.ls_sbm_id')
                    ->join('subject_main', 'subject_main.sbm_code = ' . $this->db->escape($subjectIndex))
                    ->where('learning_standard.ls_sbm_id = subject_main.sbm_id')->first();

                foreach ($data as $d_id) {
                    // Check if $d_id is greater than 16
                    if ($d_id > 16) {
                        // Use 'KI' prefix for $d_id greater than 16
                        $dm_dmn_code = 'KI' . $d_id - 17;
                    } else {
                        // Use 'DKM' prefix for $d_id 16 or less
                        $dm_dmn_code = 'DKM' . $d_id;
                    }
                    if ($this->domain_mapping_model->insert([
                        'dm_dmn_code' => $dm_dmn_code,
                        'dm_sbm_id' => $ls_id['ls_sbm_id'],
                        'dm_dskpn_id' => $dskpn_id,
                        'dm_column_index' => $duplicateDetected == true ? $columnIndex : null
                    ])) {
                        // do nothing
                        $domain_map_session_data[$columnIndex][$this->db->escape($subjectIndex)][] = $d_id;
                        $domain_map_id_session_data[] = $this->domain_mapping_model->insertID();
                    } else {
                        $success = false;
                    }
                }
            }
        }
        //dd($domain_map_session_data);

        $this->session->set('domain_map_session', $domain_map_session_data);
        $this->session->set('domain_map_id_session_data', $domain_map_id_session_data);
        $this->session->set('is_update_domain', 'Y');

        if ($success)
            return redirect()->to(route_to('activity_n_assessment'));
        return redirect()->back();
    }

    public function store_core_mapping()
    {
        $allData = $this->request->getPost();
        $dskpn_id = $this->session->get("dskpn_id");

        $is_update_core = $this->session->get('is_update_core');
        if (isset($is_update_core) && !empty($is_update_core) && $is_update_core = 'Y') {
            //delete competency mapping
            $this->competency_mapping_model->where('cmp_dskpn_id', $dskpn_id)->delete();
        }

        $processedData = [];
        $core_map_session_data = [];
        $core_mapping_id_session_data = [];

        //dd($allData);

        //structure data first
        $isSameSubject = [];
        foreach ($allData as $key => $data) {
            $parts = explode('-', $key);
            if ($parts[0] == 'input') {
                $inputIndex = $parts[1];
                $subjectIndex = $parts[2];
                $isSameSubject[$inputIndex][] = $subjectIndex;
                //dd(['1' => $parts[0], '2' => $parts[1], '3' => $parts[2]]);
                foreach ($data as $index => $value) {
                    $processedData[$inputIndex][$subjectIndex][] = [
                        'value' => $value,
                        'checked' => (($allData['checked-' . $inputIndex . '-' . $subjectIndex][$index]) == 'off') ? 'N' : 'Y'
                    ];
                }
            }
        }

        //this part to check if contain same subject or not. if Smae, put running number/column index - to later used to differentiate.
        $curSubject = "";
        $duplicateDetected = false;
        foreach ($isSameSubject as $column_index => $isSame) {
            $curSubject = $isSame[0];
            foreach ($isSameSubject as $col_idx => $same) {
                if ($same[0] == $curSubject && $column_index != $col_idx)
                    $duplicateDetected = true;
            }
        }

        //loop to store
        //0. loop index column.
        foreach ($processedData as $col_index => $processed) {
            //1. loop to get key - subject
            foreach ($processed as $key => $inputCode) {
                //1.1 get sm_id based on inputCodeKey
                $subject_data = $this->subject_model->where('sbm_code', $key)->first();
                $core_competency = $this->core_competency_model->where('cc_sbm_id', $subject_data['sbm_id'])->orderBy('cc_id', "DESC")->first();

                //2. loop to get value inside that inputcode
                foreach ($inputCode as $input) {
                    //3. store domain first.
                    if ($input['checked'] == 'Y') {
                        $this->competency_mapping_model->insert([
                            'cmp_cc_code'  => $input['value'],
                            'cmp_cc_batch' => $core_competency['cc_batch'],
                            'cmp_dskpn_id' => $dskpn_id,
                            'cmp_column_index' => $duplicateDetected == true ? $col_index : null
                        ]);

                        $lastInsertedID = $this->competency_mapping_model->insertID();
                        $core_mapping_id_session_data[] = $lastInsertedID;
                        $core_map_session_data[$col_index][$subject_data['sbm_code']][$lastInsertedID] = [$input['value'], $input['checked']];
                    }
                }
            }
        }

        //dd($core_map_session_data); //OKK

        $this->session->set('core_map_sess', $core_map_session_data);
        $this->session->set('core_mapping_id_session_data', $core_mapping_id_session_data);
        $this->session->set('is_update_core', 'Y');

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
        // if(session('current_role') != "PENYELARAS") //temporary access control.
        //     return redirect()->to(route_to('list_dskpn'));
        // Retrieve tm_id from session
        $tm_id = $this->session->get('tm_id');
        // Check if tm_id is set in the session
        if (!$tm_id) {
            dd('error');
        }

        // Query to get the list of DSKPN
        // $data['dskpn'] = $this->dskpn_model
        //     ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
        //     ->where('dskpn.dskpn_tm_id', $tm_id)
        //     ->findAll();

        $current_role = session('current_role');
        // Query to get the list of DSKPN
        if ($current_role == 'PENYELARAS') {
            $data['dskpn'] = $this->dskpn_model
                ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
                ->where('dskpn.dskpn_tm_id', $tm_id)
                ->findAll();
        } else if ($current_role == 'GURU_BESAR') {
            $data['dskpn'] = $this->dskpn_model
                ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
                ->where('dskpn.dskpn_tm_id', $tm_id)
                ->whereIn('dskpn_status', [1, 2, 3, 4, null])
                ->orWhere('dskpn_status IS NULL')
                ->findAll();
        } else {
            $data['dskpn'] = $this->dskpn_model
                ->join('topic_main', 'dskpn.dskpn_tm_id = topic_main.tm_id', 'left')
                ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
                ->where('dskpn_status', 1)
                ->where('dskpn.dskpn_tm_id', $tm_id)
                ->findAll();
        }

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
        $script = ['dynamic-input', 'list_registered_dskpn'];
        $style = ['static-field'];

        // Render the view
        $this->render_jscss('dskpn_by_topic', $data, $script, $style);
    }


    public function create_dskpn($tm_id)
    {
        $this->_destroy_all_session();
        // Store tm_id in session
        $this->session->set('tm_id', $tm_id);
        // Redirect or load a view if needed
        return redirect()->to(route_to('dskpn_learning_standard') . "?flag=true");
    }

    public function fresh_create_dskpn()
    {
        $this->_destroy_all_session();
        return redirect()->to(route_to('dskpn_learning_standard'));
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

        $data['list_selection_to_populate'] = $this->session->get('objective_performance_selection_listing');
        $data['selected_by_selected'] = $this->session->get('arr_objective_ref');
        $data['selected_assessment_code'] = $this->session->get('arr_objective_assessment');
        // dd($data['selected_assessment_code']);
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

            //get session if exist
            $data['subject_description'] = $this->session->get('subject_description');
            $data['subject_standard_numbering'] = $this->session->get('subject_standard_numbering');
            $data['objective'] = $this->session->get('objective');
            $data['objective_number'] = $this->session->get('objective_number');
            $data['objective_ref'] = $this->session->get('objective_ref');
            $data['duration'] = $this->session->get('duration');
            $data['tema'] = $this->session->get('tema');
            $data['subtema'] = $this->session->get('subtema');

            $data['dskpn_code'] = 'K' . $data['topic']['tm_ctm_id'] . 'T' . $data['topic']['tm_year'] . '-';
        } else {
            $data['kluster'] = $this->cluster_model->findAll();
            $resume_or_new = $this->session->get('subject_description');
            if (isset($resume_or_new) && !empty($resume_or_new))
                $data['resume'] = true;
        }

        $data['dskpn_code_init'] = $this->session->get('dskpn_code_init');
        $data['ex_dskpn_code_init'] = $this->session->get('ex_dskpn_code_init');

        $data['wysiwyg_include'] = $this->render_without_main('component/wysiwyg/wysiwyg_include');
        $data['wysiwyg_js'] = $this->render_without_main('component/wysiwyg/wysiwyg_javascript');

        $script = ['dynamic-input', 'learning_standard'];
        $style = ['static-field'];
        $this->render_jscss('learning_standard', $data, $script, $style);
    }

    public function view_tp_core_competency()
    {
        $data = [];
        $data['edit_dskp_code'] = $this->request->getVar('dskp_code');
        $data['edit_subject_name'] = urldecode($this->request->getVar('subject'));
        $data['edit_batch'] = $this->request->getVar('batch');
        $data['edit_data'] = $this->request->getVar('data');

        $data['subject_list'] = $this->subject_model->findAll();
        $data['wysiwyg_include'] = $this->render_without_main('component/wysiwyg/wysiwyg_include');
        $data['wysiwyg_js'] = $this->render_without_main('component/wysiwyg/wysiwyg_javascript');

        $script = ['tp-dynamic-field', 'tp_core_competency_setup'];
        $style = ['static-field'];
        $this->render_jscss('tp_core_competency_setup', $data, $script, $style);
    }

    public function view_standard_performance()
    {
        $data = [];
        $data['subject_list'] = $this->subject_model->findAll();

        $this->render('standard_performance_list', $data);
    }

    public function view_core_competency_list()
    {
        $data = [];
        $data['subject_list'] = $this->subject_model->findAll();

        $this->render('core_competency_list', $data);
    }

    public function get_core_competency_based_subject()
    {
        $sbm_id = $this->request->getVar('sbm_id');
        $cc_id = $this->request->getVar('cc_id');
        $action = $this->request->getVar('action');

        if (isset($action) && $action == 'delete') {
            $this->core_competency_model->where('cc_id', $cc_id)->delete();
        }

        $batch_number = 0;
        $core_competency_exist = $this->core_competency_model->where('cc_sbm_id', $sbm_id)->orderBy('cc_id', 'DESC')->first();

        if (isset($core_competency_exist) && !empty($core_competency_exist))
            $batch_number = $core_competency_exist['cc_batch'];

        $core_competency = $this->core_competency_model->where('cc_sbm_id', $sbm_id)->where('cc_batch', $batch_number)->findAll();

        return response()->setJSON($core_competency);
    }

    public function get_dskp_based_subject()
    {
        $sbm_id = $this->request->getPost('sbm_id');
        $dskp_list = $this->dskp_model->where('dskp_sbm_id', $sbm_id)->findAll();

        return response()->setJSON($dskp_list);
    }

    public function standard_performance_dskp_mapping()
    {
        $dskp_code = $this->request->getPost('dskp_code');

        $action = $this->request->getPost('action');
        $sp_id = $this->request->getPost('sp_id');
        $sbm_id = $this->request->getPost('sbm_id');
        if (isset($action) && $action == 'delete') {
            $sp_target = $this->standard_performance_model->where('sp_id', $sp_id)->first();
            $this->standard_performance_model->delete($sp_target['sp_id']);

            $check = $this->standard_performance_model->where('sp_dskp_code', $dskp_code)->where('sp_dskp_batch', $sp_target['sp_dskp_batch'])->findAll();
            if (empty($check)) {
                $this->standard_performance_dskp_mapping_model->where('spdm_dskp_code', $dskp_code)->where('spdm_dskp_batch', $sp_target['sp_dskp_batch'])->delete();
                $this->dskp_model->where('dskp_code', $dskp_code)->where('dskp_batch', $sp_target['sp_dskp_batch'])->delete();
            }
        }

        $last_batch_number = $this->standard_performance_model->select('sp_dskp_batch')
            ->join('dskp', 'dskp.dskp_code = standard_performance.sp_dskp_code')
            ->where('sp_dskp_code', $dskp_code)->where('dskp_sbm_id', $sbm_id)
            ->orderBy('sp_id', 'DESC')->first();

        $data['standard_performance_dskp_mapping'] = $this->standard_performance_model
            ->join('dskp', 'dskp.dskp_code = standard_performance.sp_dskp_code AND dskp.dskp_batch = standard_performance.sp_dskp_batch')
            ->where('sp_dskp_code', $dskp_code)->where('dskp_sbm_id', $sbm_id)
            ->where('dskp.dskp_batch', $last_batch_number['sp_dskp_batch'])
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function get_subject_details_by_id()
    {
        $data = [];
        $req = $this->request->getVar('sbm_id');

        if (!isset($req) || empty($req))
            return null;

        $data['subject'] = $this->subject_model->where('sbm_id', $req)->first();
        return $this->response->setJSON($data);
    }

    public function view_core_competency()
    {
        $data = [];
        $data['edit_subject_name'] = $this->request->getVar('subject');
        $data['edit_sbm_id'] = $this->request->getVar('sbm_id');
        $data['edit_data'] = $this->request->getVar('data');

        $data['subject_list'] = $this->subject_model->findAll();

        $script = ['core_competency_setup'];
        $style = ['static-field'];
        $this->render_jscss('core_competency_setup', $data, $script, $style);
    }

    public function store_core_competency_setup()
    {
        $core_competency_code = $this->request->getPost('input-core-competency-code');
        $core_competency = $this->request->getPost('input-core-competency');
        $sbm_id = $this->request->getPost('subject');

        // if (!empty($this->core_competency_model->where('cc_sbm_id', $sbm_id)->findAll()))
        //     return redirect()->back()->with('fail', 'Kompetensi Teras bagi subjek ini telah didaftarkan!');

        $batch_number = 0;
        $exit_core_competency = $this->core_competency_model->where('cc_sbm_id', $sbm_id)->orderBy('cc_id', 'DESC')->first();
        if (isset($exit_core_competency) && !empty($exit_core_competency))
            $batch_number = $exit_core_competency['cc_batch'] + 1;

        if (!empty($core_competency)) {
            foreach ($core_competency as $index => $item) {
                if (isset($core_competency_code[$index]) && !empty($core_competency_code[$index]))
                    $this->core_competency_model->insert([
                        'cc_code'   => $core_competency_code[$index],
                        'cc_batch'  => $batch_number,
                        'cc_desc'   => $item,
                        'cc_sbm_id' => $sbm_id
                    ]);
            }
        }

        if ($exit_core_competency) {
            session()->setFlashdata('success', 'Kompetensi Teras berjaya dikemaskini!');
            return redirect()->to(route_to('view_core_competency_list'));
        }

        return redirect()->back()->with('success', 'Berjaya menetapkan Kompetensi Teras!');
    }

    public function store_tp_setup()
    {
        $subject_code = $this->request->getPost('kod-rujukan');
        $code_tp_rank = $this->request->getPost('code-tp-rank');
        $topic_numbering = $this->request->getPost('dskpn-topic-numbering');
        $sbm_id = $this->request->getPost('subject');

        $tp_data = $this->request->getPost('input-tahap-penguasaan');
        $exist_tp = $this->standard_performance_model->withDeleted()->where('sp_dskp_code', $subject_code)->orderBy('sp_id', 'DESC')->first();
        $batch_count = 0;

        if (!empty($exist_tp)) {
            //batch = increase + 1
            $batch_count = $exist_tp['sp_dskp_batch'] + 1;
            $dskp_code = $subject_code;
        } else {
            //batch = 0
            if (!$code_tp_rank)
                return redirect()->back()->with('fail', 'Pastikan anda telah memilih tahap.');

            if (!$topic_numbering)
                return redirect()->back()->with('fail', 'Pastikan anda telah memilih penomboran.');

            //step 1 - store dskp record
            $code_tp_rank = sprintf('%01d', $code_tp_rank);
            $topic_numbering = sprintf('%02d', $topic_numbering);

            $dskp_code = $subject_code . $code_tp_rank . $topic_numbering;
            if (!empty($this->dskp_model->where('dskp_code', $dskp_code)->findAll()))
                return redirect()->back()->with('fail', 'Rekod bagi DSKP Code \'' . $dskp_code . '\' telah wujud didalam pangkalan data.');
        }

        $res = $this->dskp_model->insert([
            'dskp_code'     => $dskp_code,
            'dskp_batch'    => $batch_count,
            'dskp_sbm_id'   => $sbm_id
        ]);

        //step 2 - store standard performance record
        if ($res) {
            foreach ($tp_data as $index => $item) {
                $tpLevel = $index + 1;
                $this->standard_performance_model->insert([
                    'sp_dskp_code'  => $dskp_code,
                    'sp_dskp_batch' => $batch_count,
                    'sp_tp_level'   => $tpLevel,
                    'sp_tp_level_desc' => $item
                ]);
            }
        }

        if (!empty($exist_tp)) {
            session()->setFlashdata('success', 'Tahap Penguasaan berjaya dikemaskini!');
            return redirect()->to(route_to('view_standard_performance'));
        }
        return redirect()->back()->with('success', 'Berjaya menetapkan Tahap Penguasaan!');
    }

    public function getDskpCodeAvailableBasedOnString()
    {
        $sbm_id = $this->request->getVar('sbm_id');
        $sbm_code = $this->request->getVar('sbm_code');
        $level = $this->request->getVar('code_tp_rank');

        $data = $this->dskp_model->select('dskp_code')
            ->where('dskp_sbm_id', $sbm_id)->like('dskp_code', $sbm_code ? ($sbm_code . $level . '%') : '')->findAll();
        if (!empty($data)) {

            //get 2 last digit in dskp_code
            $getTwoLastCode = [];
            foreach ($data as $row) {
                $code = substr($row['dskp_code'], -2);
                $getTwoLastCode[] = ['code' => $code];
            }

            $data = $getTwoLastCode;
        }

        $response = [
            'status' => 'success',
            'data' => $data
        ];

        return $this->response->setJSON($response);
    }

    public function getStandardPerformanceBasedOnDSKPCode()
    {
        $response = [
            'status' => 'fail',
            'data' => []
        ];

        $dskp_code = $this->request->getVar('dskp_code');
        $sbm_code = $this->request->getVar('sbm_code');

        $last_batch = $this->standard_performance_model->where('sp_dskp_code', $dskp_code)->orderBy('sp_id', 'DESC')->first();
        $last_batch = $last_batch['sp_dskp_batch'] ?? null;
        $data = $this->standard_performance_model
            ->where('sp_dskp_code', $dskp_code)
            ->where('sp_dskp_batch', $last_batch)
            ->like('sp_dskp_code', $sbm_code . '%')->findAll();

        if (!empty($data)) {
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        }

        return $this->response->setJSON($response);
    }

    public function checkAndSetDSKPNCodeSession()
    {
        $dskpn_year = $this->request->getPost('dskpnyear');
        $dskpn_year = isset($dskpn_year) ? $dskpn_year : '';
        $dskpn_code = $this->request->getPost('dskpncode');
        $dskpn_code = trim(preg_replace('/\s+/', '', $dskpn_code) . $dskpn_year); //purified id
        $dskpn_code = strtoupper($dskpn_code);

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
            'ctm_code' => $this->request->getVar('ctm_code'),
            'ctm_desc' => $this->request->getVar('ctm_desc')
        ];

        if (empty($data['ctm_code']) || empty($data['ctm_desc'])) {
            return redirect()->back()->with('fail', 'Fields cannot be empty!');
        }

        if ($this->cluster_model->insert($data)) {
            return redirect()->back()->with('success', 'Berjaya menambah Kluster!');
        }

        return redirect()->back()->with('fail', 'Maaf, tindakan menambah Kluster tidak berjaya!');
    }

    public function update_cluster()
    {
        $id = $this->request->getVar('ctm_id');
        $data = [
            'ctm_code' => $this->request->getVar('ctm_code'),
            'ctm_desc' => $this->request->getVar('ctm_desc')
        ];

        if (empty($data['ctm_code']) || empty($data['ctm_desc'])) {
            return redirect()->back()->with('fail', 'Fields cannot be empty!');
        }

        if ($this->cluster_model->update($id, $data)) {
            return redirect()->back()->with('success', 'Berjaya mengemaskini Kluster!');
        }

        return redirect()->back()->with('fail', 'Maaf, tindakan mengemaskini Kluster tidak berjaya!');
    }


    public function delete_cluster()
    {
        $ctm_id = $this->request->getPost('ctm_id');

        if ($ctm_id) {

            if ($this->cluster_model->delete($ctm_id)) {
                return redirect()->back()->with('success', 'Kluster berjaya dipadam.');
            } else {
                return redirect()->back()->with('error', 'Gagal memadam kluster.');
            }
        }

        return redirect()->back()->with('error', 'ID kluster tidak sah.');
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
                    //set in session
                    $data['data']['subject'] = "";
                    $data['data']['subject_description'] = "";
                    $data['data']['objective'] = "";
                    $data['data']['tema'] = "";
                    $data['data']['subtema'] = "";
                    $data['data']['duration'] = "";
                    $data['data']['subject_list'] = $this->subject_model->findAll();

                    $tm_id = $this->session->get('tm_id');
                    // Query get topic data
                    if (true && ($tm_id != NULL)) {
                        $data['data']['topic'] = $this->topic_model
                            ->join('cluster_main', 'topic_main.tm_ctm_id = cluster_main.ctm_id', 'left')
                            ->where('topic_main.tm_id', $tm_id)
                            ->first();

                        $data['data']['subject'] = $this->session->get('subject');
                        $data['data']['getDefaultSubject'] = $this->cluster_subject_mapping_model->where('csm_ctm_id', $data['data']['topic']['tm_ctm_id'])
                            ->join('subject_main', 'subject_main.sbm_id = cluster_subject_mapping.csm_sbm_id', 'left')
                            ->findAll();

                        $arrDefaultSubject = [];
                        foreach ($data['data']['getDefaultSubject'] as $item) {
                            $arrDefaultSubject[] = $item['csm_sbm_id'];
                        }

                        if (empty($data['data']['subject'])) {
                            $this->session->set('subject', $arrDefaultSubject);
                            $data['data']['subject'] = $arrDefaultSubject;
                        }

                        $data['data']['getDefaultSubject'] = $arrDefaultSubject;

                        //get session if exist
                        $data['data']['subject_description'] = $this->session->get('subject_description');
                        $data['data']['subject_standard_numbering'] = $this->session->get('subject_standard_numbering');
                        $data['data']['objective'] = $this->session->get('objective');
                        $data['data']['objective_number'] = $this->session->get('objective_number');
                        $data['data']['objective_ref'] = $this->session->get('objective_ref');
                        $data['data']['duration'] = $this->session->get('duration');
                        $data['data']['tema'] = $this->session->get('tema');
                        $data['data']['subtema'] = $this->session->get('subtema');

                        $data['data']['dskpn_code'] = 'K' . $data['data']['topic']['tm_ctm_id'] . 'T' . $data['data']['topic']['tm_year'] . '-';
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\standard_learning";
                    break;
                }
            case 2: {
                    $data['data'] = [];
                    $data['data']['tp_session'] = $this->session->get("tp_sess_data");
                    $data['data']['tp_sess_refcode'] = $this->session->get("tp_sess_refcode");

                    $data['data']['parameters'] = $this->session->get();
                    if (!empty($data['data']['parameters'])) {
                        //step 3 - get Subject Via Learning Standard
                        foreach ($data['data']['parameters']['learning_standard_id'] as $ls_id) {
                            $query = $this->db->table('subject_main')
                                ->select('subject_main.*')
                                ->join('learning_standard', 'learning_standard.ls_sbm_id = subject_main.sbm_id')
                                ->where('learning_standard.ls_id', $ls_id)
                                ->get();

                            $data['data']['subjects'][] = $query->getResult();
                        }
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\tp_maintenance";
                    break;
                }
            case 3:; {
                    $data['data'] = [];
                    $core_map_sess = $this->session->get("core_map_sess");
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    if (!empty($data['data']['dskpn_id'])) {
                        //step 1 - get all subjects related to iterate horizontally
                        //step 1.1 - get learning standard to get list of subject.
                        $data['data']['subjects'] = $this->subject_model->select('subject_main.sbm_code, subject_main.sbm_desc, subject_main.sbm_id')
                            ->join('learning_standard as ls', 'ls.ls_sbm_id = subject_main.sbm_id')
                            ->where('ls.ls_dskpn_id', $data['data']['dskpn_id'])->where('ls.ls_deleted_at', null)->findAll();

                        //step 2.0 - get all core_competency from subjects
                        $subjectIdsArray = [];
                        $subjectCodeArray = [];
                        foreach ($data['data']['subjects'] as $subject) {
                            $subjectIdsArray[] = $subject['sbm_id'];
                            $subjectCodeArray[] = $subject['sbm_code'];
                        }

                        $core_competency = $this->core_competency_model->whereIn('cc_sbm_id', $subjectIdsArray)->findAll();

                        //step 2.1 - structuring the data to pass over view
                        foreach ($subjectIdsArray as $index => $sbm_id) {
                            if (true) {
                                foreach ($core_competency as $i => $item) {
                                    if ($sbm_id == $item['cc_sbm_id']) {
                                        $flag = false;
                                        if (isset($core_map_sess[$subjectCodeArray[$index]]) && !empty($core_map_sess[$subjectCodeArray[$index]]))
                                            foreach ($core_map_sess[$subjectCodeArray[$index]] as $core) {
                                                if ($core[0] == $item['cc_code']) {
                                                    $flag = true;
                                                    $data['data']['core_competency_item'][$sbm_id][] = array($item['cc_code'], $item['cc_desc'], $core[1]);
                                                }
                                            }
                                        if (!$flag)
                                            $data['data']['core_competency_item'][$sbm_id][] = array($item['cc_code'], $item['cc_desc'], 'N');
                                    }
                                }
                            } else {
                                foreach ($core_competency as $item) {
                                    if ($sbm_id == $item['cc_sbm_id'])
                                        $data['data']['core_competency_item'][$sbm_id][] = array($item['cc_code'], $item['cc_desc'], 'N');
                                }
                            }
                        }
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\map_core";
                    break;
                }
            case 4: {
                    $data['data'] = [];

                    $data['data']['domain_map_session'] = $this->session->get("domain_map_session");
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    $data['data']['subjects'] = [];
                    $data['data']['subjects'] = $this->subject_model->select('subject_main.sbm_id, subject_main.sbm_code, subject_main.sbm_desc')
                        ->join('learning_standard as ls', 'ls.ls_sbm_id = subject_main.sbm_id')
                        ->where('ls.ls_dskpn_id', $data['data']['dskpn_id'])->where('ls.ls_deleted_at', null)->findAll();

                    //steps 2 - get 4 mapping group components
                    //steps 2.1 - get all id for 4 group_name
                    $allGroup = $this->domain_group_model->select('dg_id, dg_title')->whereIn('dg_title', ['Kualiti Keperibadian', 'Kemandirian', 'Pengetahuan Asas', '7 Kemahiran Insaniah'])->find();
                    $rules_7ki = [
                        'KI1' => [
                            'DKM2',
                            'DKM3',
                            'DKM7',
                            'DKM8',
                            'DKM11'
                        ],
                        'KI2' => [
                            'DKM1',
                            'DKM9'
                        ],
                        'KI3' => [
                            'DKM16'
                        ],
                        'KI4' => [
                            'DKM10'
                        ],
                        'KI5' => [
                            'DKM4',
                            'DKM12',
                            'DKM13',
                            'DKM14'
                        ],
                        'KI6' => [
                            'DKM5'
                        ],
                        'KI7' => [
                            'DKM6',
                            'DKM15'
                        ]
                    ];
                    $ki_rules = [];
                    //steps 2.2 - get all item for all group
                    //steps 2.3 - store all retrieved item
                    $tempDomainz = [];
                    foreach ($allGroup as $group) {
                        $data['data'][$group['dg_title']] = $this->domain_model->select('dmn_code, dmn_desc, dmn_id')->where('dmn_dg_id', $group['dg_id'])->orderBy('dmn_id', 'ASC')->find();

                        //get all domain
                        foreach ($data['data'][$group['dg_title']] as $domainz) {
                            $tempDomainz[] = $domainz;
                        }
                    }
                    //convert rules into d_id
                    foreach ($rules_7ki as $key => $domainz) //loop KI
                    {
                        $cur_d_id = "";
                        foreach ($tempDomainz as $d) {
                            if ($d['dmn_code'] == $key) {
                                $ki_rules[$d['dmn_id']] = null; //create array with related key first
                                $cur_d_id = $d['dmn_id'];
                            }
                        }
                        //loop rules inside KI
                        foreach ($domainz as $rule) {
                            foreach ($tempDomainz as $d) {
                                if ($d['dmn_code'] == $rule) {
                                    $ki_rules[$cur_d_id][] = $d['dmn_id'];
                                }
                            }
                        }
                    }
                    $data['data']['ki_rules'] = $ki_rules;
                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\sixteen_domain";
                    break;
                }
            case 5: {
                    $data['data'] = [];
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    $data['data']['abm_session'] = $this->session->get("abm");
                    $data['data']['assessment_input_session'] = $this->session->get("assessment_input");
                    $data['data']['assessment_number_session'] = $this->session->get("assessment_number");
                    $data['data']['activity_number'] = $this->session->get("activity_idea_number");
                    $data['data']['activity_input'] = $this->session->get("activity_idea_input");
                    $data['data']['parent_involve'] = $this->session->get("parent_involve");

                    if (!empty($data['data']['dskpn_id'])) {
                        $data['data']['topikncluster'] = $this->dskpn_model->select('topic_main.tm_desc, topic_main.tm_id, cluster_main.ctm_desc, cluster_main.ctm_id')
                            ->join('topic_main', 'topic_main.tm_id = dskpn.dskpn_tm_id')
                            ->join('cluster_main', 'cluster_main.ctm_id = topic_main.tm_ctm_id')
                            ->where('dskpn.dskpn_id', $data['data']['dskpn_id'])->first();

                        $data['data']['assessment_category'] = $this->assessment_category_model->findAll();
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\map_actvt_assess";
                    break;
                }
            case 6: {
                    $data['data'] = [];
                    $data['data']['dskpn_id'] = $this->session->get("dskpn_id");
                    $data['data']['review'] = $this->request->getVar('review');
                    $data['data']['specification_maplist'] = $this->session->get("specification_mapist_sess");
                    $data['data']['new_specification_input'] = $this->session->get("new_specification_input_details");
                    $data['data']['allGroup'] = $this->teaching_approach_category_model->select('tappc_id, tappc_allow_modify, tappc_desc')->findAll();

                    foreach ($data['data']['allGroup'] as $group) {
                        $data['data'][$group['tappc_desc']] = $this->teaching_approach_model->select('tapp_desc, tapp_id')->where('tapp_tappc_id', $group['tappc_id'])->where('tapp_status', 1)->orderBy('tapp_id', 'ASC')->findAll();
                    }

                    $data['load_page'] = "App\\Modules\\dskpn\\Views\\review\\map_specs";
                    break;
                }
            default:
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

    public function print_bpp()
    {
        // require_once('vendor/tecnickcom/tcpdf/tcpdf.php');
        $data = $this->_populate_dskpn_details();

        // Load your view and generate the HTML content
        $html = view('App\\Modules\\Dskpn\\Views\\borang_plan_pengajaran', $data);

        // Return HTML as response
        return $this->response->setContentType('text/html')->setBody($html);

        // $pdf = new TCPDF();
        // $pdf->AddPage();

        // // Load your view and generate the HTML content
        // $html = view('App\\Modules\\dskpn\\Views\\borang_plan_pengajaran', $data);

        // // Write HTML content to PDF
        // $pdf->writeHTML($html);

        // // Output the PDF (D: download, I: inline)
        // $pdf->Output('document.pdf', 'D'); // 

        // // Initialize Dompdf and set options
        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        // $options->set('isPhpEnabled', true); // Disable PHP in HTML if not needed

        // // Create new PDF document
        // $dompdf = new Dompdf($options);

        // $dompdf->loadHtml($html);

        // // (Optional) Set paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF
        // $dompdf->stream("example.pdf", array("Attachment" => 0));



        // // Create new PDF document
        // $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

        // // Set document information
        // $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Author');
        // $pdf->SetTitle('TCPDF Example');
        // $pdf->SetSubject('TCPDF Tutorial');

        // // Add a page
        // $pdf->AddPage();

        // // Output HTML content
        // $html = view('App\\Modules\\dskpn\\Views\\borang_plan_pengajaran', $data);
        // $pdf->writeHTML($html, true, false, true, false, '');

        // // Close and output PDF document
        // $pdf->Output('example.pdf', 'D');


        // $data = $this->_populate_dskpn_details();

        // $mpdf = new Mpdf([
        //     'orientation'   => 'L',
        //     'format'        => 'A4',
        //     'margin_left'   => 15,
        //     'margin_right'  => 15,
        //     'margin_top'    => 15,
        //     'margin_bottom' => 15,
        //     'debug'         => true, // Enable debugging
        // ]);

        // $htmlContent = view('App\\Modules\\dskpn\\Views\\borang_plan_pengajaran', $data);

        // $mpdf->WriteHTML($htmlContent);
        // return $mpdf->Output('test' . '.pdf', 'D');

        // dd($data);
        // echo view('App\\Modules\\dskpn\\Views\\borang_plan_pengajaran', $data);
    }
}
