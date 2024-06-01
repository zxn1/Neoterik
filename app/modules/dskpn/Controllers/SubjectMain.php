<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

use App\Modules\Dskpn\Models\SubjectMainModel;

class SubjectMain extends BaseController
{

    protected $subject_model;

    public function __construct()
    {
        $this->session          = service('session');
        $this->subject_model = new SubjectMainModel();
    }

    public function store_create_subject()
    {
        $data = [
            'sm_code' => $this->request->getVar('sm_code'),
            'sm_desc' => $this->request->getVar('sm_desc')
        ];

        if ($this->subject_model->insert($data)) {
            return redirect()->back()->with('success', 'Berjaya menambah Subject!');
        }

        return redirect()->back()->with('fail', 'Maaf, aksi menambah Subject tidak berjaya!');
    }


    public function delete_subject($id = null)
    {
        $response = ['status' => 'fail'];
        if($this->subject_model->delete($id))
        {
            $response = ['status' => 'success'];
        }
        
        return $this->response->setJSON($response);
    }
}
