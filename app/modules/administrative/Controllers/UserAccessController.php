<?php

namespace App\Modules\Administrative\Controllers;

use App\Controllers\BaseController;
use App\Modules\Administrative\Models\AccessRolesModel;
use App\Modules\Administrative\Models\StaffMainModel;

class UserAccessController extends BaseController
{

    protected $staff_main_model;
    protected $access_roles_model;

    public function __construct()
    {
        $this->session                  = service('session');
        $this->staff_main_model         = new StaffMainModel();
        $this->access_roles_model         = new AccessRolesModel();
    }

    public function view_user_access()
    {
        $data = [];
        //Get all staff list data
        $data['users']    = $this->staff_main_model
            ->select('sm_fullname, sm_gender, sm_recid')->findAll();

        // Get all access roles
        $data['access_roles'] = $this->access_roles_model->findAll();


        $this->render('user_access_list', $data);
    }
}
