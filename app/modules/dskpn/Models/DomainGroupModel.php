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
    protected $createdField  = 'dg_created_at';
    protected $updatedField  = 'dg_updated_at';
    protected $deletedField  = 'dg_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
