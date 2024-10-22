<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DskpModel extends Model
{
    protected $table      = 'dskp'; // Specify the table name
    protected $primaryKey = ['dskp_code', 'dskp_batch']; // composite

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['dskp_code', 'dskp_batch', 'dskp_sbm_id']; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = true;

    protected $createdField  = 'dskp_created_at';
    protected $updatedField  = 'dskp_updated_at';
    protected $deletedField  = 'dskp_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
