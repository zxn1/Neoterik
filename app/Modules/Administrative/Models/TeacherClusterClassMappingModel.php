<?php

namespace App\Modules\Administrative\Models;

use CodeIgniter\Model;

class TeacherClusterClassMappingModel extends Model
{
    protected $table      = 'teacher_cluster_class_mapping';
    protected $primaryKey = 'tccm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'tccm_sm_recid',
        'tccm_ctm_id',
        'tccm_cls_recid',
        'tccm_assigned_by',
        'tccm_assigned_date',
        'tccm_year',
    ];

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
