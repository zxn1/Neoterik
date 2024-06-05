<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class clusterSubjectMappingModel extends Model
{
    protected $table      = 'cluster_subject_mapping';
    protected $primaryKey = 'csm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cm_id', 'sm_id'];

    // If you want to use timestamps
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation rules
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}
