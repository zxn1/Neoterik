<?php

namespace App\Modules\Dashboard\Controllers;
use App\Modules\Dskpn\Models\ClusterMainModel;

use App\Controllers\BaseController;

class Main extends BaseController
{

    protected $cluster_model;

    public function __construct()
    {
        $this->cluster_model                = new ClusterMainModel();
        $this->session          = service('session');
    }

    public function index()
    {
        $data = [];
        // Query get kluster data
        $data['kluster'] = $this->cluster_model->countAll();

        $this->render('dashboard', $data);
    }
}
