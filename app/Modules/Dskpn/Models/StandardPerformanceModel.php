<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class StandardPerformanceModel extends Model
{
    protected $table      = 'standard_performance';
    protected $primaryKey = 'sp_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['sp_tp_level', 'sp_tp_level_desc', 'sp_dskp_code'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'sp_created_at';
    protected $updatedField  = 'sp_updated_at';
    protected $deletedField  = 'sp_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
