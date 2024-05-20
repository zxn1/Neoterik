<?php

namespace App\Modules\Assessment\Controllers;

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

    public function student_management()
    {
        $data = [];
        $this->render('student_management',$data);
    }
}
