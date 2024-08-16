<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class StandardPerformanceDskpMappingModel extends Model
{
    protected $table      = 'standard_performance_dskp_mapping';
    protected $primaryKey = 'spdm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['spdm_dskp_code', 'spdm_dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'spdm_created_at';
    protected $updatedField  = 'spdm_updated_at';
    protected $deletedField  = 'spdm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
