<?php

namespace App\Modules\Administrative\Models;

use CodeIgniter\Model;

class UserAccessRolesModel extends Model
{
    protected $table      = 'user_access_roles'; // Specify the table name
    protected $primaryKey = 'uar_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = false; // Enable if you want to use soft deletes

    protected $allowedFields = [
        'uar_id',
        'uar_ar_id',
        'uar_sm_recid',
        'uar_created_at',
        'uar_updated_at',
        'uar_deleted_at',
    ]; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
