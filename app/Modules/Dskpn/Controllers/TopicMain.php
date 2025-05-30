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

    // public function create()
    // {
    //     $data = [
    //         'tm_desc'       => $this->request->getVar('topik'),
    //         'tm_year'       => $this->request->getVar('year'),
    //         'tm_ctm_id'         => $this->request->getVar('cluster')
    //     ];

    //     if ($this->topic_model->insert($data)) {
    //         return redirect()->back()->with('success', 'Berjaya menambah Topic dalam Kluster!');
    //     }

    //     return redirect()->back()->with('fail', 'Maaf, aksi menambah Topic dalam Kluster tidak berjaya!');
    // }
    public function create()
    {
        $data = [
            'tm_desc'   => $this->request->getVar('topik'),
            'tm_year'   => $this->request->getVar('year'),
            'tm_ctm_id' => $this->request->getVar('cluster')
        ];

        if ($this->topic_model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Berjaya menambah Topic dalam Kluster!']);
        }

        return $this->response->setJSON(['status' => 'fail', 'message' => 'Maaf, tindakan menambah Topic dalam Kluster tidak berjaya!']);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'tm_desc'   => $this->request->getVar('editTopik'),
            'tm_year'   => $this->request->getVar('year'),
            'tm_ctm_id' => $this->request->getVar('cluster')
        ];

        if ($this->topic_model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Topik berjaya dikemaskini!']);
        }
        return $this->response->setJSON(['status' => 'fail', 'message' => 'Maaf, tindakan mengemaskini Topik tidak berjaya!']);
    }


    public function delete($id = null)
    {
        $response = ['status' => 'fail'];
        if ($this->topic_model->delete($id)) {
            $response = ['status' => 'success'];
        }

        return $this->response->setJSON($response);
    }

    public function getTopicByKluster($id = null)
    {
        $response = ['status' => 'fail', 'data' => []];

        $topikSelected = $this->topic_model->where('tm_ctm_id', $id)->find();
        if (!empty($topikSelected)) {
            $response = ['status' => 'success', 'data' => $topikSelected];
        }

        return $this->response->setJSON($response);
    }

    public function getYear($id = null)
    {
        $response = ['status' => 'fail', 'data' => []];
        $yearTopic = $this->topic_model
            ->where('topic_main.tm_id', $id)
            ->first();

        if (!empty($yearTopic)) {
            $response = ['status' => 'success', 'data' => $yearTopic];
        }

        return $this->response->setJSON($response);
    }
}
