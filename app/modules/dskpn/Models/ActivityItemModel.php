<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ActivityItemModel extends Model
{
    protected $table      = 'activity_item'; // Specify the table name
    protected $primaryKey = 'aci_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['aci_dskpn_id', 'aci_number', 'aci_desc']; // Fields that are allowed to be inserted/updated
    protected $createdField = 'aci_created_at';  // Custom created_at field with prefix
    protected $updatedField = 'aci_updated_at';  // Custom updated
    protected $deletedField = 'aci_deleted_at';  // Custom deleted

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
