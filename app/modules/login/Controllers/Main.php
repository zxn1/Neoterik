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
        $data = [];
        $this->render_login('login',$data);
        
        // return view('App\\Modules\\Login\\Views\\login');
    }

    public function dashboard()
    {
        $data = [];
        $this->render('dashboard',$data);
    }
}
