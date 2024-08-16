<?php

namespace App\Modules\Dskpn\Controllers;

use App\Controllers\BaseController;

use App\Modules\Dskpn\Models\SubjectMainModel;
use App\Modules\Dskpn\Models\ClusterSubjectMappingModel;

class SubjectMain extends BaseController
{

    protected $subject_model, $cluster_subject_mapping_model;

    public function __construct()
    {
        $this->session                          = service('session');
        $this->subject_model                    = new SubjectMainModel();
        $this->cluster_subject_mapping_model    = new ClusterSubjectMappingModel();
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

    public function get_default_subject_ID($id = null)
    {
        $response = ['status' => 'fail'];
        $defaultSubject = $this->cluster_subject_mapping_model->where('csm_ctm_id', $id)
                            ->join('subject_main', 'subject_main.sbm_id = cluster_subject_mapping.csm_sbm_id', 'left')
                            ->findAll();

        if($defaultSubject)
        {
            $arrDefaultSubject = [];
            foreach($defaultSubject as $item)
            {
                $arrDefaultSubject[] = $item['csm_sbm_id'];
            }

            $response = [
                            'status' => 'success',
                            'data' => $defaultSubject,
                            'clean_data' => $arrDefaultSubject
                        ];
        }
        return $this->response->setJSON($response);
    }
}
