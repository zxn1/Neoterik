<?php

namespace App\Modules\Register\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    public function __construct()
    {
        $this->session          = service('session');
    }

    public function index()
    {
        return view('App\\Modules\\Register\\Views\\register');
    }
}
