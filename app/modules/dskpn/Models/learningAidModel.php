<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class LearningAidModel extends Model
{
    protected $table      = 'learning_aid';
    protected $primaryKey = 'la_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['la_desc', 'dskpn_id'];

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
