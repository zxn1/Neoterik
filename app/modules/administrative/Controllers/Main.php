<?php

namespace App\Modules\Administrative\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Administrative\Models\ClassMainModel;
use App\Modules\Administrative\Models\StaffMainModel;
use App\Modules\Administrative\Models\TeacherClusterClassMappingModel;

class Main extends BaseController
{

    protected $staff_main_model;
    protected $cluster_main_model;
    protected $class_main_model;
    protected $tccm_model;

    public function __construct()
    {
        $this->session                  = service('session');
        $this->staff_main_model         = new StaffMainModel();
        $this->cluster_main_model       = new ClusterMainModel();
        $this->class_main_model         = new ClassMainModel();
        $this->tccm_model               = new TeacherClusterClassMappingModel();
    }

    public function view_teacher_cluster()
    {
        $data = [];
        //Get all teacher list data
        $data['teachers']    = $this->staff_main_model->findAll();

        // Get cluster list data
        $data['clusters'] = $this->cluster_main_model->findAll();

        $this->render('teacher_list', $data);
    }

    public function teacher_cluster_class_mapping()
    {
        $cluster = $this->request->getPost('cluster');
        $year = $this->request->getPost('year');

        // Get Teacher information that are assigned to class and cluster
        $data['teacher_cluster_mapping'] = $this->tccm_model->where('cluster_main_id', $cluster)->findAll();

        // Alternatively, you can return a JSON response
        // return $this->response->setJSON(['message' => 'ayam']);
        return $this->response->setJSON($data);
    }
}
