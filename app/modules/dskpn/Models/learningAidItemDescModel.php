<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class LearningAidItemDescModel extends Model
{
    protected $table      = 'learning_aid_item_desc';
    protected $primaryKey = 'laid_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['laid_la_id', 'laid_desc'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'laid_created_at';
    protected $updatedField  = 'laid_updated_at';
    protected $deletedField  = 'laid_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
