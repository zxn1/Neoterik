<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ObjectivePerformanceModel extends Model
{
    protected $table      = 'objective_performance';
    protected $primaryKey = 'opm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['opm_ls_ref_number', 'opm_number', 'opm_desc', 'opm_dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'opm_created_at';
    protected $updatedField  = 'opm_updated_at';
    protected $deletedField  = 'opm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
