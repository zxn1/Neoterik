<?php

namespace App\Modules\Administrative\Controllers;

use App\Controllers\BaseController;
use App\Modules\Administrative\Models\AccessRolesModel;
use App\Modules\Administrative\Models\StaffMainModel;
use App\Modules\Administrative\Models\UserAccessRolesModel;

class UserAccessController extends BaseController
{
    protected $staff_main_model;
    protected $access_roles_model;
    protected $user_access_roles_model;

    public function __construct()
    {
        $this->session                  = service('session');
        $this->staff_main_model         = new StaffMainModel();
        $this->access_roles_model       = new AccessRolesModel();
        $this->user_access_roles_model  = new UserAccessRolesModel();
    }

    public function view_user_access()
    {$data = [];

        // Get all staff list data
        $data['users'] = $this->staff_main_model
            ->select('sm_fullname, sm_gender, sm_recid')->findAll();
    
        // Get all access roles
        $data['access_roles'] = $this->access_roles_model->findAll();
    
        // Fetch user roles with their checked status
        $userRoles = $this->user_access_roles_model->findAll();
        $data['user_roles'] = [];
        foreach ($userRoles as $role) {
            $data['user_roles'][$role['uar_sm_recid']][] = $role['uar_ar_id'];
        }
    
        $this->render('user_access_list', $data);
    }

    public function manage_roles()
    {
        $request = $this->request;
        $userId = $request->getPost('user_id');
        $roles = $request->getPost('roles');
        $action = $request->getPost('action');

        if ($action === 'add') {
            // Add roles to user
            foreach ($roles as $roleId) {
                $data = [
                    'uar_ar_id' => $roleId,
                    'uar_sm_recid' => $userId,
                    'uar_created_at' => date('Y-m-d H:i:s')
                ];
                $this->user_access_roles_model->insert($data);
            }
        } elseif ($action === 'delete') {
            // Delete all roles for the user
            $this->user_access_roles_model->where('uar_sm_recid', $userId)->delete();
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function get_roles()
    {
        $roles = $this->access_roles_model->findAll();
        return $this->response->setJSON($roles);
    }

    public function save_user_roles()
    {
        $userId = $this->request->getPost('user_id');
        $roles = $this->request->getPost('roles'); // Array of role IDs that are checked
        $isChecked = $this->request->getPost('isChecked');
    
        // Validate input
        if (empty($userId)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid user ID']);
        }
    
        // Begin transaction
        $db = \Config\Database::connect();
        $db->transBegin();
    
        try {
            if (empty($roles)) {
                // If roles array is empty, delete all roles for the user
                $this->user_access_roles_model->where('uar_sm_recid', $userId)
                                              ->delete();
            } else {
                // Delete roles that are unchecked or not in the new set of roles
                $this->user_access_roles_model->where('uar_sm_recid', $userId)
                                              ->whereNotIn('uar_ar_id', $roles)
                                              ->delete();
    
                // Insert new roles or update existing roles
                foreach ($roles as $roleId) {
                    $data = [
                        'uar_sm_recid' => $userId,
                        'uar_ar_id' => $roleId,
                        'uar_isChecked' => $isChecked,
                        'uar_updated_at' => date('Y-m-d H:i:s') // Update timestamp
                    ];
    
                    // Check if the role already exists for the user
                    if ($this->user_access_roles_model->where('uar_sm_recid', $userId)
                                                      ->where('uar_ar_id', $roleId)
                                                      ->first()) {
                        $this->user_access_roles_model->where('uar_sm_recid', $userId)
                                                      ->where('uar_ar_id', $roleId)
                                                      ->set($data)
                                                      ->update();
                    } else {
                        $this->user_access_roles_model->insert($data);
                    }
                }
            }
    
            // Commit transaction
            $db->transCommit();
    
            return $this->response->setJSON(['status' => 'success', 'message' => 'Roles updated successfully']);
        } catch (\Exception $e) {
            // Rollback transaction on error
            $db->transRollback();
    
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update roles']);
        }
    }
    

}
