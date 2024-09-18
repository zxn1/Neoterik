<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class OpmReffCodeModel extends Model
{
    protected $table      = 'opm_reff_code';
    protected $primaryKey = 'orc_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['orc_opm_id', 'orc_code'];
    protected $createdField = 'orc_created_at';
    protected $updatedField = 'orc_updated_at';
    protected $deletedField = 'orc_deleted_at';

    protected $useTimestamps = true;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
