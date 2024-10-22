<?php

namespace App\Modules\Administrative\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dskpn\Models\ClusterMainModel;
use App\Modules\Administrative\Models\ClassMainModel;
use App\Modules\Administrative\Models\StaffMainModel;
use App\Modules\Administrative\Models\TeacherClusterClassMappingModel;
use App\Modules\Dskpn\Models\TopicMainModel;
use App\Modules\Dskpn\Models\SubjectMainModel;
use App\Modules\Dskpn\Models\ClusterSubjectMappingModel;

class Main extends BaseController
{

    protected $staff_main_model;
    protected $cluster_main_model;
    protected $class_main_model;
    protected $tccm_model;
    protected $topic_model;
    protected $subject_model;
    protected $cluster_subject_mapping_model;

    public function __construct()
    {
        $this->session                          = service('session');
        $this->staff_main_model                 = new StaffMainModel();
        $this->cluster_main_model               = new ClusterMainModel();
        $this->class_main_model                 = new ClassMainModel();
        $this->topic_model                      = new TopicMainModel();
        $this->subject_model                    = new SubjectMainModel();
        $this->cluster_subject_mapping_model    = new ClusterSubjectMappingModel();
        $this->tccm_model                       = new TeacherClusterClassMappingModel();
    }

    public function view_teacher_cluster()
    {
        $data = [];
        //Get all teacher list data
        $data['teachers'] = $this->staff_main_model->findAll();

        // Get all class list data
        $data['classes'] = $this->class_main_model->findAll();

        // Get cluster list data
        $data['clusters'] = $this->cluster_main_model->findAll();

        //  Get subject list data
        $data['subjects']    = $this->subject_model->findAll();

        $this->render('teacher_list', $data);
    }

    public function teacher_cluster_class_mapping()
    {
        helper('dskpn_helper');

        $kelas = $this->request->getPost('kelas');
        $year = $this->request->getPost('year');

        // Log the posted values
        log_message('info', 'Posted kelas: ' . $kelas);
        log_message('info', 'Posted year: ' . $year);
        
        $data['teacher_cluster_mapping'] = $this->tccm_model
            ->select('staff_main.sm_fullname, staff_main.sm_recid, staff_main.sm_mobile, class_main.cls_name, teacher_cluster_class_mapping.tccm_year, teacher_cluster_class_mapping.tccm_cls_recid, teacher_cluster_class_mapping.tccm_ctm_id')
            ->join('class_main', 'teacher_cluster_class_mapping.tccm_cls_recid = class_main.cls_recid')
            ->join('staff_main', 'teacher_cluster_class_mapping.tccm_sm_recid = staff_main.sm_recid')
            ->join('cluster_main', 'teacher_cluster_class_mapping.tccm_ctm_id = cluster_main.ctm_id')
            ->where('teacher_cluster_class_mapping.tccm_cls_recid', $kelas)
            ->where('teacher_cluster_class_mapping.tccm_year', $year)
            ->groupBy('tccm_ctm_id, tccm_sm_recid, tccm_cls_recid, tccm_year')
            ->findAll();

        $data['teacher_class_mapping'] = $this->tccm_model
            ->select('staff_main.sm_fullname, staff_main.sm_recid, staff_main.sm_mobile, class_main.cls_name, teacher_cluster_class_mapping.tccm_id, subject_main.sbm_desc')
            ->join('class_main', 'teacher_cluster_class_mapping.tccm_cls_recid = class_main.cls_recid')
            ->join('staff_main', 'teacher_cluster_class_mapping.tccm_sm_recid = staff_main.sm_recid')
            ->join('subject_main', 'teacher_cluster_class_mapping.tccm_sbm_id = subject_main.sbm_id')
            ->where('teacher_cluster_class_mapping.tccm_cls_recid', $kelas)
            ->where('teacher_cluster_class_mapping.tccm_year', $year)
            ->where('teacher_cluster_class_mapping.tccm_ctm_id', null)
            ->findAll();
        log_message('info', 'Query result: ' . print_r($data['teacher_cluster_mapping'], true));

        // Store cluster & year in session to be used when allocate teacher-cluster
        $this->session->set([
            'selected_class' => $kelas,
            'selected_year' => $year
        ]);

         $view = view('App\\Modules\\Administrative\\Views\\teacher_list_table', $data);  // Make sure to set the correct view path
 
         // Return the view content to be appended on the frontend
         return $this->response->setBody($view);

        // Alternatively, you can return a JSON response
        // return $this->response->setJSON(['message' => 'ayam']);
        // return $this->response->setJSON($data);
    }

    // public function get_cluster_years()
    // {
    //     $cluster_id = $this->request->getPost('cluster_id');
    //     $data['year'] = $this->topic_model
    //         ->select('tm_year')
    //         ->where('ctm_id', $cluster_id)
    //         ->distinct()
    //         ->findAll();

    //     return $this->response->setJSON($data);
    // }

    public function allocate_teacher_cluster_class()
    {
        $teacher_sm_recid           = $this->request->getPost('teacher');
        $class_recid                = $this->request->getPost('class');
        
        // Retrieve data from session
        // $cluster            = $this->session->get('selected_cluster');
        // $year               = $this->session->get('selected_year');
        
        $cluster            = $this->request->getPost('kluster');
        $year               = $this->session->get('selected_year');
        
        // Get assign by sm_id 
        $assigned_by = $this->session->get('sm_id');
        // Get the value of the selected radio button
        $pemetaan_guru = $this->request->getPost('pemetaan_guru');
        
        // Check if a radio button was selected
        if ($pemetaan_guru) {
            // A radio button was selected
            // Kluster
            if ($pemetaan_guru === 'kluster') {
                // Pemetaan Guru-Kluster selected
                // Get cluster id
                $ctm_id        = $this->request->getPost('kluster');

                // Based on cluster get subject_id
                $subject_id   = $this->cluster_subject_mapping_model->where('csm_ctm_id',$ctm_id)->findAll();

                // Loop through each subject and store the mapping to the database
                foreach ($subject_id as $subject) {
                    $this->tccm_model->insert([
                        'tccm_sm_recid'     => $teacher_sm_recid,
                        'tccm_ctm_id'       => $cluster,
                        'tccm_cls_recid'    => $class_recid,
                        'tccm_assigned_by'  => $assigned_by,
                        'tccm_year'         => $year,        // Use the cluster ID
                        'tccm_sbm_id'       => $subject['csm_sbm_id'], // Assuming 'csm_sbm_id' is the subject ID
                    ]);
                }

                // Set success message
                session()->setFlashdata('swal_success', 'Your action was successful!');

                // Redirect to the view or another method
                return redirect()->back();
                // dd('test');
            }
            // Subjek
            elseif ($pemetaan_guru === 'subjek') {
                $sbm_id  = $this->request->getPost('subjek');

                // store in database
                $this->tccm_model->insert([
                    'tccm_sm_recid'     => $teacher_sm_recid,
                    'tccm_cls_recid'    => $class_recid,
                    'tccm_assigned_by'  => $assigned_by,
                    'tccm_year'         => $year,
                    'tccm_sbm_id'       => $sbm_id, // Assuming 'csm_sbm_id' is the subject ID

                ]);

                // Set success message
                session()->setFlashdata('swal_success', 'Your action was successful!');

                // Redirect to the view or another method
                return redirect()->back();
                // dd('test error');

                }
        } else {
            // No radio button was selected
            return redirect()->back()->withInput()->with('error', 'Please select either Teacher-Cluster or Teacher-Subject mapping.');
            // Handle the error or provide feedback to the user
        }

    }

    public function get_subject_name()
    {
        // Get the POST data
        $tccm_sbm_id = $this->request->getPost('tccm_sbm_id');
    
        // Fetch the subject details based on tccm_sbm_id
        $subject = $this->subject_model->select('subject_name')->where('sbm_id', $tccm_sbm_id)->first();
    
        // Check if the subject was found
        if ($subject) {
            // Return the subject name in JSON format
            return $this->response->setJSON(['subject_name' => $subject['subject_name']]);
        } else {
            // Return an error message if no subject found
            return $this->response->setJSON(['error' => 'Subject not found'], 404);
        }
    }

    public function get_list_of_subject_name()
    {
        // Get the POST data
        $tccm_ctm_id = $this->request->getPost('tccm_ctm_id');
    
        // Fetch the subject details based on tccm_ctm_id
        $subjects = $this->cluster_subject_mapping_model
                        ->select('subject_main.sbm_desc')
                        ->join('subject_main', 'cluster_subject_mapping.csm_sbm_id = subject_main.sbm_id')
                        ->where('csm_ctm_id', $tccm_ctm_id)
                        ->findAll();
    
        // Check if subjects were found
        if ($subjects) {
            // Return the list of subject names
            $subject_names = array_column($subjects, 'sbm_desc');
            return $this->response->setJSON(['subject_names' => $subject_names]);
        } else {
            // Return an error message if no subjects found
            return $this->response->setJSON(['error' => 'Subjects not found'], 404);
        }
    }
    

    // Delete Subject Mapping
    public function deleteSubjectMapping()
    {
        $id = $this->request->getPost('id');  // Getting the id from POST data

        if ($id) {
            // Perform the deletion logic here
            $isDeleted = $this->tccm_model->where('tccm_id', $id)->delete();

            if ($isDeleted) {
                return $this->response->setJSON(['success' => true]);
            }
        }

        return $this->response->setJSON(['success' => false]);
    }

    // Delete Cluster Mapping
    public function deleteClusterMapping()
    {
        $ctm_id     = $this->request->getPost('ctm_id');
        $cls_recid  = $this->request->getPost('cls_recid');
        $sm_recid   = $this->request->getPost('sm_recid');
        $year       = $this->request->getPost('year');
        
        try {
            // Find all mappings that match
            $get_cluster_mapping = $this->tccm_model
                ->where('tccm_cls_recid', $cls_recid)
                ->where('tccm_year', $year)
                ->where('tccm_sm_recid', $sm_recid)
                ->where('tccm_ctm_id', $ctm_id)
                ->findAll();
    
            // Delete all found mappings
            foreach ($get_cluster_mapping as $gcm) {
                $this->tccm_model->delete($gcm['tccm_id']);
            }
    
            return $this->response->setJSON(['success' => true]);
    
        } catch (\Exception $e) {
            // Log the error if needed
            log_message('error', 'Error deleting cluster mapping: ' . $e->getMessage());
    
            return $this->response->setJSON(['success' => false, 'error' => $e->getMessage()]);
        }
    }


    
}
