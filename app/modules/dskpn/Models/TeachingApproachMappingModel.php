<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class TeachingApproachMappingModel extends Model
{
    protected $table      = 'teaching_approach_mapping';
    protected $primaryKey = 'tappm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tappm_tapp_id', 'tappm_dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'tappm_created_at';
    protected $updatedField  = 'tappm_updated_at';
    protected $deletedField  = 'tappm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAtribute($dskpn_id, $dg_name)
    {
        $builder = $this->db->table('domain_mapping');
        $builder->select('*');
        $builder->join('domain', 'domain_mapping.dm_id = domain.dm_id');
        $builder->join('domain_group', 'domain.dg_id = domain_group.dg_id');
        $builder->where('domain_mapping.dm_dskpn_id', $dskpn_id);
        $builder->where('domain_mapping.dm_deleted_at', null);
        $builder->where('domain_group.dg_title', $dg_name);

        $query = $builder->get();
        return $query->getResultArray();
    }
}
