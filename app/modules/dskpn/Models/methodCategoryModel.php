<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class MethodCategoryModel extends Model
{
    protected $table      = 'method_category';
    protected $primaryKey = 'mtdc_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['mtdc_desc'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'mtdc_created_at';
    protected $updatedField  = 'mtdc_updated_at';
    protected $deletedField  = 'mtdc_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
