<?php

namespace App\Modules\Login\Models;

use CodeIgniter\Model;
use App\Modules\Administrative\Models\UserAccessRolesModel;

class LoginStaffMainModel extends Model
{
    protected $table      = 'login_staff_main';
    protected $primaryKey = 'lsm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['lsm_sm_recid', 'lsm_password'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'lsm_created_at';
    protected $updatedField  = 'lsm_updated_at';
    protected $deletedField  = 'lsm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getUserByIdentityNumber($ic)
    {
        return $this->join('staff_main', 'login_staff_main.lsm_sm_recid = staff_main.sm_recid')->where('staff_main.sm_icno', $ic)->first();
    }

    public function getUserAccessRole($sm_recid)
    {
        $uar_model = new UserAccessRolesModel();
        return $uar_model->select('access_roles.ar_desc')->join('access_roles', 'user_access_roles.uar_ar_id = access_roles.ar_id')
                ->where('user_access_roles.uar_sm_recid', $sm_recid)
                ->findAll();
    }
}
