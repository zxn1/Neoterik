<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class LearningStandardItemModel extends Model
{
    protected $table      = 'learning_standard_item';
    protected $primaryKey = 'lsi_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['lsi_ls_id', 'lsi_desc'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'lsi_created_at';
    protected $updatedField  = 'lsi_updated_at';
    protected $deletedField  = 'lsi_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
