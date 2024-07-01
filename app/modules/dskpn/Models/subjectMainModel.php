<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class SubjectMainModel extends Model
{
    protected $table      = 'subject_main';
    protected $primaryKey = 'sm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['sm_code', 'sm_desc', 'deleted_at'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
