<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DomainModel extends Model
{
    protected $table      = 'domain';
    protected $primaryKey = 'd_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['d_name', 'gd_id', 'not_sureYet_id'];

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
