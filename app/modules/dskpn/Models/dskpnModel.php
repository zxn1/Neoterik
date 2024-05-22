<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DskpnModel extends Model
{
    protected $table      = 'dskpn';
    protected $primaryKey = 'dskpn_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tm_id', 'op_id', 'aa_id'];

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
