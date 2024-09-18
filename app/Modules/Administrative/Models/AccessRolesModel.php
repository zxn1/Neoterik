<?php

namespace App\Modules\Administrative\Models;

use CodeIgniter\Model;

class AccessRolesModel extends Model
{
    protected $table      = 'access_roles'; // Specify the table name
    protected $primaryKey = 'ar_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = false; // Enable if you want to use soft deletes

    protected $allowedFields = [
        'ar_name',
        'ar_desc',
        'ar_created_at',
        'ar_updated_at',
        'ar_deleted_at',
    ]; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
