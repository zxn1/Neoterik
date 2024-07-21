<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class LearningStandardModel extends Model
{
    protected $table      = 'learning_standard';
    protected $primaryKey = 'ls_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ls_sbm_id', 'ls_dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'ls_created_at';
    protected $updatedField  = 'ls_updated_at';
    protected $deletedField  = 'ls_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
