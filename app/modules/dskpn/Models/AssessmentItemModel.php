<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class AssessmentItemModel extends Model
{
    protected $table      = 'assessment_item'; // Specify the table name
    protected $primaryKey = 'asi_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['asi_dskpn_id', 'asi_category_number', 'asi_desc_number', 'asi_desc', 'asi_asc_id']; // Fields that are allowed to be inserted/updated

    protected $createdField = 'asi_created_at';  // Custom created_at field with prefix
    protected $updatedField = 'asi_updated_at';  // Custom updated
    protected $deletedField = 'asi_deleted_at';  // Custom deleted

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
