<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class TeachingApproachModel extends Model
{
    protected $table      = 'teaching_approach';
    protected $primaryKey = 'tapp_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tapp_desc', 'tapp_tappc_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'tapp_created_at';
    protected $updatedField  = 'tapp_updated_at';
    protected $deletedField  = 'tapp_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
