<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class StaffMainModel extends Model
{
    protected $table      = 'staff_main';
    protected $primaryKey = 'sm_recid';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['sm_fullname', 'sm_nickname', 'sm_title', 'sm_icno', 'sm_ic_type', 'sm_jpn_fileno', 'sm_gender', 'sm_race', 'sm_religion', 'sm_phone', 'sm_mobile', 'sm_email', 'sm_address_line_1', 'sm_address_line_2', 'sm_address_line_3', 'sm_city', 'sm_postcode', 'sm_state', 'sm_district', 'sm_dun', 'sm_parliament', 'sm_inserted_by', 'sm_inserted_date', 'sm_updated_by', 'sm_updated_date', 'sm_username', 'sm_institution_id', 'sm_flag', 'sm_status', 'sm_division', 'sm_submit_by', 'sm_submit_date', 'sm_verify_by', 'sm_verify_date'];

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'sm_inserted_date';
    protected $updatedField  = 'sm_updated_date';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
