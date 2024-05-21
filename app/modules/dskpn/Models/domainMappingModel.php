<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DomainMappingModel extends Model
{
    protected $table      = 'domain_mapping';
    protected $primaryKey = 'dm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['dm_isChecked', 'd_id', 'ls_id'];

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
