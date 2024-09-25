<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class SubjectMainModel extends Model
{
    protected $table      = 'subject_main';
    protected $primaryKey = 'sbm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['sbm_code', 'sbm_desc', 'sbm_deleted_at'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'sbm_created_at';
    protected $updatedField  = 'sbm_updated_at';
    protected $deletedField  = 'sbm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
