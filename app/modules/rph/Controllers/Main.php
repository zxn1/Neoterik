<?php

namespace App\Modules\Rph\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{

    public function __construct()
    {
        $this->session          = service('session');
    }

    public function teacher_main()
    {
        $data = [];
        $this->render('teacher/rph_main',$data);
    }
}
