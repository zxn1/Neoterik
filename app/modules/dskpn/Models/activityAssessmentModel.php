<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ActivityAssessmentModel extends Model
{
    protected $table      = 'activity_assessment'; // Specify the table name
    protected $primaryKey = 'aa_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = false; // Enable if you want to use soft deletes

    protected $allowedFields = ['aa_activity_desc', 'aa_assessment_desc', 'aa_is_parental_involved']; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
