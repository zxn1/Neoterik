<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DomainModel extends Model
{
    protected $table      = 'domain';
    protected $primaryKey = 'd_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    //gd_id = dg = domain_group, sm_id = subject_main (NULL = all subject can be same), dskpn_id (NULL mean it is not vary - can be used by other DSKPN)
    protected $allowedFields = ['d_name', 'gd_id', 'sm_id', 'dskpn_id'];
    //Notes: 16 domains, and other static domain mapping should sm_id = NULL, dskpn_id = NULL.

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
