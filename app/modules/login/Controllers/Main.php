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
                $this->session->set([
                    'sm_id' => '48283',
                    'by_id' => '48283',
                    'icno' => '000000000001',
                    'nickname' => '00001',
                    'fullname' => '000000000001',
                    'current_role' => 'INSTITUSI',
                    'ccm_id' => '11245',
                    'ccm_name' => 'Sekolah Rendah Seri Budiman'
                ]);

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
