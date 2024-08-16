<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class CompetencyMappingModel extends Model
{
    protected $table      = 'competency_mapping';
    protected $primaryKey = 'csm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['csm_ctm_id', 'csm_sbm_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField = 'csm_created_at';  // Custom created_at field with prefix
    protected $updatedField = 'csm_updated_at';  // Custom updated
    protected $deletedField = 'csm_deleted_at';  // Custom deleted

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
