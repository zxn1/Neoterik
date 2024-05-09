<?php

namespace App\Modules\Dskpn\Controllers;

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

    public function map_static()
    {
        $data = [];
        $script = ['data', 'dynamic-input'];
        $this->render_js('map_static_field', $data, $script);
    }
}
