<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

use App\Modules\Dskpn\Models\TopicMainModel;

class TopicMain extends BaseController
{

    protected $topic_model;

    public function __construct()
    {
        $this->session          = service('session');
        $this->topic_model   = new TopicMainModel();
    }

    public function create()
    {
        $data = [
            'tm_desc'       => $this->request->getVar('topik'),
            'tm_sub_theme'  => $this->request->getVar('subtema'),
            'tm_theme'      => $this->request->getVar('tema'),
            'tm_year'       => $this->request->getVar('year'),
            'cm_id'         => $this->request->getVar('cluster')
        ];

        if($this->topic_model->insert($data))
        {
            return redirect()->back()->with('success', 'Berjaya menambah Topic dalam Kluster!');
        } else {
            return redirect()->back()->with('fail', 'Maaf, aksi menambah Topic dalam Kluster tidak berjaya!');
        }
    }
}
