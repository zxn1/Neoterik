<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class StandardPerformanceModel extends Model
{
    protected $table      = 'standard_performance';
    protected $primaryKey = 'sp_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['sp_tp_level', 'sp_tp_level_desc', 'sm_id', 'dskpn_id'];

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
