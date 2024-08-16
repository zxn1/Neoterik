<?php

namespace App\Modules\Dskpn\Models;

use CodeIgniter\Model;

class TopicMainModel extends Model
{
    protected $table      = 'topic_main'; // Specify the table name
    protected $primaryKey = 'tm_id'; // Specify the primary key

    protected $returnType     = 'array'; // Can be 'array' or 'object'
    protected $useSoftDeletes = true; // Enable if you want to use soft deletes

    protected $allowedFields = ['tm_desc', 'tm_year', 'tm_ctm_id']; // Fields that are allowed to be inserted/updated

    // If you want to use timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'tm_created_at';
    protected $updatedField  = 'tm_updated_at';
    protected $deletedField  = 'tm_deleted_at';

    // Validation rules
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
