<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class MethodExtraModel extends Model
{
    protected $table      = 'method_extra';
    protected $primaryKey = 'me_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['me_mtdm_id', 'me_desc'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'me_created_at';
    protected $updatedField  = 'me_updated_at';
    protected $deletedField  = 'me_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
