<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ObjectivePerformanceModel extends Model
{
    protected $table      = 'objective_performance';
    protected $primaryKey = 'op_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['op_desc', 'op_duration'];

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
