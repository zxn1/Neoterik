<?php

namespace App\Modules\Administrative\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table      = 'settings'; // Specify the table name
    protected $primaryKey = 'id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = false; // Enable if you want to use soft deletes

    protected $allowedFields = [
        'key',
        'value'
    ]; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
