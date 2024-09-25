<?php

namespace App\Modules\Administrative\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Administrative\Models\ClassMainModel;
use App\Modules\Administrative\Models\StaffMainModel;
use App\Modules\Administrative\Models\TeacherClusterClassMappingModel;
use App\Modules\Dskpn\Models\TopicMainModel;

class Main extends BaseController
{

    protected $staff_main_model;
    protected $cluster_main_model;
    protected $class_main_model;
    protected $tccm_model;
    protected $topic_model;

    public function __construct()
    {
        $this->session                  = service('session');
        $this->staff_main_model         = new StaffMainModel();
        $this->cluster_main_model       = new ClusterMainModel();
        $this->class_main_model         = new ClassMainModel();
        $this->topic_model              = new TopicMainModel();
        $this->tccm_model               = new TeacherClusterClassMappingModel();
    }

    public function view_teacher_cluster()
    {
        $data = [];
        //Get all teacher list data
        $data['teachers']    = $this->staff_main_model->findAll();

        // Get all class list data
        $data['classes'] = $this->class_main_model->findAll();

        // Get cluster list data
        $data['clusters'] = $this->cluster_main_model->findAll();

        $this->render('teacher_list', $data);
    }

    public function teacher_cluster_class_mapping()
    {
        $cluster = $this->request->getPost('cluster');
        $year = $this->request->getPost('year');

        // Get Teacher information that are assigned to class and cluster
        // Assuming tccm_model is already loaded
        $data['teacher_cluster_mapping'] = $this->tccm_model
            ->select('staff_main.sm_fullname, staff_main.sm_mobile, class_main.cls_name, teacher_cluster_class_mapping.tccm_assigned_by')
            ->join('class_main', 'teacher_cluster_class_mapping.tccm_cls_recid = class_main.cls_recid')
            ->join('staff_main', 'teacher_cluster_class_mapping.tccm_sm_recid = staff_main.sm_recid')
            ->where('teacher_cluster_class_mapping.tccm_ctm_id', $cluster)
            ->where('teacher_cluster_class_mapping.tccm_year', $year)
            ->findAll();

        // Store cluster & year in session to be used when allocate teacher-cluster
        $this->session->set([
            'selected_cluster' => $cluster,
            'selected_year' => $year
        ]);

        // Alternatively, you can return a JSON response
        // return $this->response->setJSON(['message' => 'ayam']);
        return $this->response->setJSON($data);
    }

    public function get_cluster_years()
    {
        $cluster_id = $this->request->getPost('cluster_id');
        $data['year'] = $this->topic_model
            ->select('tm_year')
            ->where('ctm_id', $cluster_id)
            ->distinct()
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function allocate_teacher_cluster_class()
    {
        $teacher_sm_recid   = $this->request->getPost('teacher');
        $class_recid        = $this->request->getPost('class');

        // Retrieve data from session
        $cluster            = $this->session->get('selected_cluster');
        $year               = $this->session->get('selected_year');

        // Get assign by sm_id 
        $assigned_by = $this->session->get('sm_id');
        // Store to database

        if ($this->tccm_model->insert([
            'tccm_sm_recid'     => $teacher_sm_recid,
            'tccm_ctm_id'       => $cluster,
            'tccm_cls_recid'    => $class_recid,
            'tccm_assigned_by'  => $assigned_by,
            'tccm_year'         => $year,
        ])) {

            // Set success message
            session()->setFlashdata('swal_success', 'Your action was successful!');

            // Redirect to the view or another method
            return redirect()->back();
        } else {
            $success = false;
        }
    }
}
