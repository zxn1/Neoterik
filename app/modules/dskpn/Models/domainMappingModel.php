<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DomainMappingModel extends Model
{
    protected $table      = 'domain_mapping';
    protected $primaryKey = 'dm_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    //if ls_id is missing it refers to specification part (not related to subject mapping - ex: Reka bentuk instruksi, Kaedah, Integrasi Teknologi and Pendekatan part)
    protected $allowedFields = ['dm_isChecked', 'd_id', 'ls_id', 'dskpn_id'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getDomain($dskpn_id, $dg_id)
    {
        $builder = $this->db->table('domain_mapping');
        $builder->select('*');
        $builder->join('domain', 'domain_mapping.d_id = domain.d_id');
        $builder->join('learning_standard', 'domain_mapping.ls_id = learning_standard.ls_id');
        $builder->join('subject_main', 'learning_standard.sm_id = subject_main.sm_id');
        $builder->join('domain_group', 'domain.gd_id = domain_group.dg_id');
        $builder->where('domain_mapping.dskpn_id', $dskpn_id);
        $builder->where('domain_group.dg_id', $dg_id);

        $query = $builder->get();
        return $query->getResultArray();
    }
}
