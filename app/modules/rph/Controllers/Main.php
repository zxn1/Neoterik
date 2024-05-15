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
        $this->render('teacher/rph_main', $data);
    }

    public function teacher_suggestion()
    {
        $data = [];
        $this->render('teacher/rph_suggestion', $data);
    }

    public function teacher_custom()
    {
        $data = [];
        $script = ['data', 'tp-dynamic-field', 'tp-autoload'];
        $style = ['static-field', 'tp-maintenance'];
        $this->render_jscss('teacher/rph_custom', $data, $script, $style);
    }
}
