<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DomainGroupModel extends Model
{
    protected $table      = 'domain_group';
    protected $primaryKey = 'dg_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['dg_title'];

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
