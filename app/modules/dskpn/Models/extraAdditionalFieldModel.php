<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ExtraAdditionalFieldModel extends Model
{
    protected $table      = 'extra_additional_field';
    protected $primaryKey = 'eaf_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['eaf_desc', 'dm_id'];

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
