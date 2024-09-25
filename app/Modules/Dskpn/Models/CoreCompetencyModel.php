<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class CoreCompetencyModel extends Model
{
    protected $table      = 'core_competency';
    protected $primaryKey = 'cc_code';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['cc_code', 'cc_desc', 'cc_sbm_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField = 'cc_created_at';  // Custom created_at field with prefix
    protected $updatedField = 'cc_updated_at';  // Custom updated
    protected $deletedField = 'cc_deleted_at';  // Custom deleted

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
