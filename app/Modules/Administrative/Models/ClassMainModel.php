<?php

namespace App\Modules\Administrative\Models;

use CodeIgniter\Model;

class ClassMainModel extends Model
{
    protected $table      = 'class_main'; // Specify the table name
    protected $primaryKey = 'cls_recid'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = false; // Enable if you want to use soft deletes

    protected $allowedFields = [
        'cls_name', 
        'cls_session', 
        'cls_op_hours_start', 
        'cls_op_hours_end', 
        'cls_capacity', 
        'cls_capacity_guru', 
        'cls_status', 
        'cls_start_year', 
        'cls_class_location', 
        'cls_remarks', 
        'cls_inserted_by', 
        'cls_inserted_date', 
        'cls_updated_by', 
        'cls_updated_date', 
        'cls_id', 
        'cls_integrated', 
        'cls_inst_id'
    ]; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
