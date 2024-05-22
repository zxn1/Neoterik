<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DskpnModel extends Model
{
    protected $table      = 'dskpn'; // Specify the table name
    protected $primaryKey = 'dskpn_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['dskpn_theme', 'dskpn_sub_theme', 'tm_id', 'op_id', 'aa_id', 'approved_at', 'created_by', 'approved_by']; // Fields that are allowed to be inserted/updated

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
