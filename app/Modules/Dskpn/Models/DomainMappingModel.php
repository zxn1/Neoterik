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
    protected $allowedFields = ['dm_sbm_id', 'dm_dmn_code', 'dm_dskpn_id', 'dm_column_index'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'dm_created_at';
    protected $updatedField  = 'dm_updated_at';
    protected $deletedField  = 'dm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getDomain($dskpn_id, $dg_name)
    {
        $builder = $this->db->table('domain_mapping');
        $builder->select('*');
        $builder->join('domain', 'domain_mapping.dm_dmn_code = domain.dmn_code');
        $builder->join('subject_main', 'domain_mapping.dm_sbm_id = subject_main.sbm_id');
        $builder->join('domain_group', 'domain.dmn_dg_id = domain_group.dg_id');
        $builder->where('domain_mapping.dm_dskpn_id', $dskpn_id);
        $builder->where('domain_mapping.dm_deleted_at', null);
        $builder->where('domain_group.dg_title', $dg_name);

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAllDomain($dg_name)
    {
        $builder = $this->db->table('domain');
        $builder->select('*');
        $builder->join('domain_group', 'domain.dmn_dg_id = domain_group.dg_id AND domain.dmn_deleted_at IS NULL');
        $builder->where('domain_group.dg_title', $dg_name);
        $builder->orderBy('domain.dmn_id');

        $query = $builder->get();
        return $query->getResultArray();
    }

    // public function getAtribute($dskpn_id, $dg_name)
    // {
    //     $builder = $this->db->table('domain_mapping');
    //     $builder->select('*');
    //     $builder->join('domain', 'domain_mapping.dm_id = domain.dm_id');
    //     $builder->join('domain_group', 'domain.gd_id = domain_group.dg_id');
    //     $builder->where('domain_mapping.dm_dskpn_id', $dskpn_id);
    //     $builder->where('domain_mapping.dm_deleted_at', null);
    //     $builder->where('domain_group.dg_title', $dg_name);

    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
}
