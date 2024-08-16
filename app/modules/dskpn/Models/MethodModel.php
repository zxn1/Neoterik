<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class MethodModel extends Model
{
    protected $table      = 'method';
    protected $primaryKey = 'mtd_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['mtd_desc', 'mtd_mtdc_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'mtd_created_at';
    protected $updatedField  = 'mtd_updated_at';
    protected $deletedField  = 'mtd_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
