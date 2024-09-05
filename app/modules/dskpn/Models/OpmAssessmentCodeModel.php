<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class OpmAssessmentCodeModel extends Model
{
    protected $table      = 'opm_assessment_code';
    protected $primaryKey = 'oac_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['oac_opm_id', 'oac_code'];
    protected $createdField = 'oac_created_at';
    protected $updatedField = 'oac_updated_at';
    protected $deletedField = 'oac_deleted_at';

    protected $useTimestamps = true;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
