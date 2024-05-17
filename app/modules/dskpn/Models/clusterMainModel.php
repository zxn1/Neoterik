<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ClusterMainModel extends Model
{
    protected $table      = 'cluster_main'; // Specify the table name
    protected $primaryKey = 'cm_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['cm_code', 'cm_desc']; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
