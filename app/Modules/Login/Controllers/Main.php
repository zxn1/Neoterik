<?php

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;
use App\Modules\Login\Models\LoginStaffMainModel;
use App\Modules\Administrative\Models\StaffMainModel;

class Main extends BaseController
{
    protected $login_model;
    protected $staff_main_model;

    public function __construct()
    {
        $this->session          = service('session');
        $this->login_model      = new LoginStaffMainModel();
        $this->staff_main_model = new StaffMainModel();
    }

    public function index()
    {
        if (env('UNDERMAINTENANCE') == true) {
            return redirect()->to(route_to('maintenance'));
        }

        // Check if the user has logged in permissions
        if ($this->session->has('sm_id')) {
            return redirect()->to('dashboard');
        } else {
            $data = [];
            $this->render_login('login', $data);
        }
    }

    public function attempt_login()
    {
        if ($this->request->getMethod() === 'POST') {
            $userData = [
                'username'  => $this->request->getPost('um_username'),
                'password'  => $this->request->getPost('um_password'),
            ];

            if(empty($userData['username']) || empty($userData['password']))
                return redirect()->to(route_to('login'))->with('swal_fail', 'Sila masukkan Username dan Password anda!');

            // Verification process
            $user = $this->login_model->getUserByIdentityNumber($userData['username']);

            if (!empty($user) && password_verify($userData['password'], $user['lsm_password'])) {
                //success
                //get user role
                $roles = $this->login_model->getUserAccessRole($user['lsm_sm_recid']);
                $roles = array_column($roles, 'ar_desc');

                $this->session->set([
                    'sm_id' => $user['lsm_sm_recid'],
                    'by_id' => $user['lsm_sm_recid'],
                    'icno' => $user['sm_icno'],
                    'nickname' => $user['sm_nickname'],
                    'fullname' => $user['sm_fullname'],
                    'list_current_role' => $roles
                ]);

                if(isset($roles) && !empty($roles))
                {
                    $this->session->set([
                        'current_role' => $roles[0]
                    ]);
                }

                return redirect()->to('dashboard');
            } else {
                //fail
                return redirect()->to(route_to('login'))->with('swal_fail', 'Username and Password doesn\'t matched!');
            }
        }
        $data = [];
        $this->render_login('login', $data);
    }

    public function generate_account()
    {
        $sm_recid_id = $this->request->getVar('recid_id');
        $sm_new_password = $this->request->getVar('password');

        $staff_exist = $this->staff_main_model->where('sm_recid', $sm_recid_id)->first();
        $login_exist = $this->login_model->where('lsm_sm_recid', $sm_recid_id)->first();

        if(!isset($staff_exist) || empty($staff_exist))
        {
            echo "fail";
            die();
        }

        if(isset($login_exist) || !empty($login_exist))
        {
            echo "fail - duplicate";
            die();
        }

        if(!isset($sm_new_password) || empty($sm_new_password))
        {
            $sm_new_password = $staff_exist['sm_icno'];
        }

        if($this->login_model->insert([
            'lsm_sm_recid' => $sm_recid_id,
            'lsm_password' => password_hash($sm_new_password, PASSWORD_DEFAULT)
        ])) {
            echo "success!";
        } else {
            echo "fail";
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }
}
