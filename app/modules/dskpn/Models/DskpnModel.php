<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class DskpnModel extends Model
{
    protected $table      = 'dskpn'; // Specify the table name
    protected $primaryKey = 'dskpn_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['dskpn_code', 'dskpn_theme', 'dskpn_sub_theme', 'dskpn_status', 'dskpn_remarks', 'dskpn_delete_reason', 'dskpn_approved_at', 'dskpn_created_by', 'dskpn_updated_by', 'dskpn_approved_by', 'dskpn_version', 'dskpn_duration', 'dskpn_tm_id', 'dskpn_parent_involvement', 'dskpn_notes']; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = true;

    protected $createdField  = 'dskpn_created_at';
    protected $updatedField  = 'dskpn_updated_at';
    protected $deletedField  = 'dskpn_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
