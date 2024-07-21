<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ClusterMainModel extends Model
{
    protected $table      = 'cluster_main'; // Specify the table name
    protected $primaryKey = 'ctm_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['ctm_code', 'ctm_desc']; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;
    protected $createdField  = 'ctm_created_at';
    protected $updatedField  = 'ctm_updated_at';
    protected $deletedField  = 'ctm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
