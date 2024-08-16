<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class MethodMappingModel extends Model
{
    protected $table      = 'method_mapping';
    protected $primaryKey = 'mdtm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['mdtm_mtd_id', 'mdtm_dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'mdtm_created_at';
    protected $updatedField  = 'mdtm_updated_at';
    protected $deletedField  = 'mdtm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
