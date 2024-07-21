<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class ClassAssignModel extends Model
{
    protected $table      = 'class_assign'; // Specify the table name
    protected $primaryKey = 'ca_recid'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'

    protected $allowedFields = ['ca_class_id', 'ca_user_id', 'ca_user_id', 'ca_inserted_by', 'ca_inserted_date', 'ca_updated_by', 'ca_updated_date', 'ca_assign_type']; // Fields that are allowed to be inserted/updated

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
