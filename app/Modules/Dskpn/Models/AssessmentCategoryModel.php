<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class AssessmentCategoryModel extends Model
{
    protected $table      = 'assessment_category'; // Specify the table name
    protected $primaryKey = 'asc_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['asc_desc']; // Fields that are allowed to be inserted/updated

    protected $createdField = 'asc_created_at';  // Custom created_at field with prefix
    protected $updatedField = 'asc_updated_at';  // Custom updated
    protected $deletedField = 'asc_deleted_at';  // Custom deleted

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
