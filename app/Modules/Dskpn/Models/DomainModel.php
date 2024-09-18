<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DomainModel extends Model
{
    protected $table      = 'domain';
    protected $primaryKey = 'dmn_code';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    //gd_id = dg = domain_group, sm_id = subject_main (NULL = all subject can be same), dskpn_id (NULL mean it is not vary - can be used by other DSKPN)
    protected $allowedFields = ['dmn_dg_id', 'dmn_code', 'dmn_desc'];
    //Notes: 16 domains, and other static domain mapping should sm_id = NULL, dskpn_id = NULL.

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'dmn_created_at';
    protected $updatedField  = 'dmn_updated_at';
    protected $deletedField  = 'dmn_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
