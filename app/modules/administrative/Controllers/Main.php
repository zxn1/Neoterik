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

    public function teacher_list()
    {
        $data = [];
        //Get all teacher list data
        $data['teachers']    = $this->staff_main_model->findAll();
        $this->render('teacher_list', $data);
    }
}
