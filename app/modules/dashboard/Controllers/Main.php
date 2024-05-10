<?php

namespace App\Modules\Dashboard\Controllers;

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
        $this->render('dashboard',$data);
    }
}
