<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class TeachingApproachCategoryModel extends Model
{
    protected $table      = 'teaching_approach_category';
    protected $primaryKey = 'tappc_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tappc_desc'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'tappc_created_at';
    protected $updatedField  = 'tappc_updated_at';
    protected $deletedField  = 'tappc_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
