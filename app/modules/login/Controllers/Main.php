<?php

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    public function __construct()
    {
        $this->session          = service('session');
    }

    public function index()
    {
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

            if($userData['username'] != $userData['password'])
                return redirect()->to(route_to('login'))->with('swal_fail', 'Username and Password doesn\'t matched!');

            $role = "";
            $user_id = "";
            if($userData['username'] == 'penyelaras1')
            {
                $user_id = '40365';
                $role = "PENYELARAS";
                $this->session->set([
                    'sm_id' => $user_id,
                    'by_id' => $user_id,
                    'icno' => '000102035265',
                    'nickname' => 'JAMIL',
                    'fullname' => 'MUHAMMAD JAMIL HUSNI BIN HANIF',
                    'current_role' => $role,//'INSTITUSI',
                    'ccm_id' => '11245',
                    'ccm_name' => 'Sekolah Rendah Seri Budiman'
                ]);
            }

            if($userData['username'] == 'bighead1')
            {
                $user_id = '40364';
                $role = "GURU_BESAR";
                $this->session->set([
                    'sm_id' => $user_id,
                    'by_id' => $user_id,
                    'icno' => '980618085698',
                    'nickname' => 'HAZLAN',
                    'fullname' => 'MUHAMMAD HAZLAN SHAH BIN IDRIS',
                    'current_role' => $role,//'INSTITUSI',
                    'ccm_id' => '11245',
                    'ccm_name' => 'Sekolah Rendah Seri Budiman'
                ]);
                
            }

            if($userData['username'] == 'cikgu')
            {
                $user_id = '46675';
                $role = "GURU";
                $this->session->set([
                    'sm_id' => $user_id,
                    'by_id' => $user_id,
                    'icno' => '980618085698',
                    'nickname' => 'SYAFIQ',
                    'fullname' => 'MUHAMMAD SYAFIQ BIN IBRAHIM',
                    'current_role' => $role,//'INSTITUSI',
                    'ccm_id' => '12345',
                    'ccm_name' => 'Sekolah Rendah Seri Budiman'
                ]);
                
            }

            if(empty($role))
                return redirect()->to(route_to('login'))->with('swal_fail', 'Username and Password doesn\'t matched!');

            // $user = $this->staffModel->where('username', $userData['username'])->first();
            $user = true;
            if ($user) {
                // if (password_verify($userData['password'], $user['password'])) {
                //         $this->session->set('staff_id', $user['staff_id']);
                //         $this->session->set('username', $user['username']);
                //         $this->session->set('position', $user['position']);
                //         $this->session->set('name', $user['name']);
                //         $this->session->set('image', $user['image']);
                //         return redirect()->to('staff/home');
                // } else {
                //     session()->setFlashdata('error', 'Invalid Password');
                //     dd('test');
                //     return redirect()->to('staff/login');
                // }
                // Add data to the session

                return redirect()->to('dashboard');
            } else {
                session()->setFlashdata('error', 'Invalid Username');
                return redirect()->to('staff/login');
            }
        }
        $data = [];
        $this->render_login('login', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }
}
