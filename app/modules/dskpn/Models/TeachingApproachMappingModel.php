<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class TeachingApproachMappingModel extends Model
{
    protected $table      = 'teaching_approach_mapping';
    protected $primaryKey = 'tappm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tappm_tapp_id', 'tappm_dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'tappm_created_at';
    protected $updatedField  = 'tappm_updated_at';
    protected $deletedField  = 'tappm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
