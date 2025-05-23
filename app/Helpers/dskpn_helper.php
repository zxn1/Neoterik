<?php

use Config\Database;

// Function get Kompetensi teras
function get_lain_lain($dm_id)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('extra_additional_field')
        ->select('*')
        ->where('dm_id', $dm_id)
        ->get();

    // Fetch the row as an array
    $row = $query->getRowArray();
    return $row;
}

function get_user_name($sm_id)
{
    if (empty($sm_id)) {
        return '';
    }

    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('staff_main')
        ->select('sm_fullname')
        ->where('sm_recid', $sm_id)
        ->get();

    // Fetch the row as an array
    $row = $query->getRowArray();

    // Check if the row is not empty and contains the 'sm_fullname' key
    if (!empty($row) && isset($row['sm_fullname'])) {
        return $row['sm_fullname'];
    } else {
        return ''; // Return an empty string if no matching record is found
    }
}

function get_dskpn_code_by_dskpn_id($dskpn_id)
{
    // Connect to the database
    $db = Database::connect();
    // Build the query to select the desired row
    $query = $db->table('dskpn')
        ->select('dskpn_code')
        ->where('dskpn_id', $dskpn_id)
        ->get();

    $row = $query->getRowArray();
    if(!empty($row))
    {
        return $row['dskpn_code'];
    }
    return null;
}

function get_tp_ref_code($dskpn_id, $sm_id)
{
    // Connect to the database
    $db = Database::connect();
    // Build the query to select the desired row
    $query = $db->table('learning_standard')
        ->select('ls_ref_code')
        ->where('dskpn_id', $dskpn_id)
        ->where('sm_id', $sm_id)
        ->get();

    // Fetch the row as an array
    $row = $query->getRowArray();

    // Check if the row is not empty and contains the 'sm_fullname' key
    if (!empty($row)) {
        return $row['ls_ref_code'];
    } else {
        return ''; // Return an empty string if no matching record is found
    }
}

function get_user_role()
{
    $session = \Config\Services::session();
    $session = $session->get('current_role');
    if(isset($session) && !empty($session))
        return is_array($session)?$session:array($session);
    return array();
}

function year_to_string($year)
{
    if($year == 1)
        return "Satu";
    else if($year == 2)
        return "Dua";
    else if($year == 3)
        return "Tiga";
    else if($year == 4)
        return "Empat";
    else if($year == 5)
        return "Lima";
    else if($year == 6)
        return "Enam";
}

function generateRandomNumber($maxLength = 9) {
    // Generate a random number with a length up to $maxLength
    $maxNumber = str_repeat('9', $maxLength); // Max number with $maxLength digits
    return rand(0, (int)$maxNumber);
}

function get_dskpn_status($status)
{
    if ($status == NULL) {
        return '<span class="badge badge-m bg-secondary">Dihantar</span>';
    } else if ($status == 1) {
        return '<span class="badge badge-m bg-info">Lulus</span>';
    } else if ($status == 2) {
        return '<span class="badge badge-m bg-danger">Ditolak</span>';
    } else if ($status == 3) {
        return '<span class="badge badge-m bg-secondary">Permohonan<br>Pemadaman</span>';
    } else if ($status == 4) {
        return '<span class="badge badge-m bg-danger">Dipadam</span>';
    } else if ($status == 5) {
        return '<span class="badge badge-m bg-warning text-muted">Draf</span>';
    } else {
        return 'Unknown';
    }
}

function get_dskpn_tema($dskpn_theme)
{
    switch ($dskpn_theme) {
        case 'Individu':
            return '<span class="badge badge-m bg-success">Individu</span>';
        case 'Keluarga':
            return '<span class="badge badge-m bg-info">Keluarga</span>';
        case 'Masyarakat':
            return '<span class="badge badge-m bg-primary">Masyarakat</span>';
        default:
            return '<span class="badge badge-m bg-secondary">' . $dskpn_theme . '</span>';
    }
}

function get_versioning_status()
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('settings')
    ->select('value')
    ->where('key', 'dskpn_versioning')
    ->get();

    // Fetch the first row (since you're expecting one row)
    $row = $query->getRow();

    // Check if row is returned and access the value
    if ($row) {
        return $row->value;
    } else {
        return null;  // In case no result is found
    }
}

// Get mapped subject for clusters
function get_cluster_subject($ctm_id)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('cluster_subject_mapping')
        ->join('subject_main', 'subject_main.sbm_id = cluster_subject_mapping.csm_sbm_id')
        ->select('subject_main.sbm_desc')
        ->where('csm_ctm_id', $ctm_id)
        ->get();

    // Fetch the results as an array of rows
    $rows = $query->getResultArray();

    // Initialize an array to store subjects
    $subjects = [];

    // Check if the rows are not empty
    if (!empty($rows)) {
        // Loop through each row to get the 'sbm_desc'
        foreach ($rows as $row) {
            $subjects[] = $row['sbm_desc'];
        }
        // Return the subjects as a comma-separated string
        return implode(', ', $subjects);
    } else {
        return null; // Return an empty string if no matching records are found
    }
}

// Get mapped cluster(s) for a subject
function get_subject_cluster($sbm_id)
{
    $db = \Config\Database::connect();

    $query = $db->table('cluster_subject_mapping')
        ->where('csm_sbm_id', $sbm_id)
        ->get();

    $rows = $query->getResultArray();

    return !empty($rows) ? $rows : null;
}

function get_topic_dskpn($tm_id){

    $db = \Config\Database::connect();

    $query = $db->table('dskpn')
        ->where('dskpn_tm_id', $tm_id)
        ->get();

     $rows = $query->getResultArray();
    
    return !empty($rows) ? $rows : null;
}

function get_user_roles($sm_recid)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('user_access_roles')
        ->join('access_roles', 'access_roles.ar_id = user_access_roles.uar_ar_id', 'left')
        ->select('access_roles.ar_name')
        ->where('uar_sm_recid', $sm_recid)
        ->get();

    // Fetch the results as an array of rows
    $rows = $query->getResultArray();

    // Initialize an array to store roles with HTML markup
    $roles = [];

    // Check if the rows are not empty
    if (!empty($rows)) {
        // Loop through each row to get the 'ar_name'
        foreach ($rows as $row) {
            // Wrap each role name with a span tag for styling
            $roles[] = '<span class="badge badge-role">' . $row['ar_name'] . '</span>';
        }
        // Return the roles as an HTML string
        return implode(' ', $roles);
    } else {
        return '<span class="badge badge-no-role">TIADA</span>'; // Return a placeholder if no roles found
    }
}

function core_competency_exist($sbm_id)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to check if the record exists
    $exists = $db->table('core_competency')
        ->where('cc_sbm_id', $sbm_id)
        ->where('cc_deleted_at IS NULL')
        ->countAllResults();

    // Check if the record exists
    if ($exists > 0) {
        return true;
    } else {
        return false;
    }
}

// For tccm
function get_cluster_subject_list($ctm_id)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('cluster_subject_mapping')
        ->join('subject_main', 'subject_main.sbm_id = cluster_subject_mapping.csm_sbm_id')
        ->select('subject_main.sbm_desc')
        ->where('csm_ctm_id', $ctm_id)
        ->get();

    // Fetch the results as an array of rows
    $rows = $query->getResultArray();

    // Initialize an array to store subjects
    $subjects = [];

    // Check if the rows are not empty
    if (!empty($rows)) {
        // Loop through each row to get the 'sbm_desc'
        foreach ($rows as $row) {
            $subjects[] = $row['sbm_desc'];
        }
        // Return the subjects as a comma-separated string
        return implode(', ', $subjects);
    } else {
        return null; // Return an empty string if no matching records are found
    }
}

// For tccm
function get_cluster_desc($ctm_id)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('cluster_main')
        ->select('ctm_desc') // Select only the required column
        ->where('ctm_id', $ctm_id)
        ->get();

    // Fetch the results as an array of rows
    $rows = $query->getResultArray();

    // Check if the rows are not empty and access the first row
    if (!empty($rows)) {
        return $rows[0]['ctm_desc']; // Return the description from the first row
    } else {
        return null; // Return null if no matching records are found
    }
}


// For tccm
function get_subject($tccm_id)
{
    // Connect to the database
    $db = Database::connect();

    // Get the subject id first from the tccm table
    $query = $db->table('teacher_cluster_class_mapping')
        ->select('tccm_sbm_id') // Select only the required column
        ->where('tccm_id', $tccm_id)
        ->get()
        ->getRowArray(); // Fetch the first row as an associative array

    // Check if a subject ID was found
    if ($query) {
        // Based on the ID found, get the subject description
        $query2 = $db->table('subject_main')
            ->select('sbm_desc') // Select only the required column
            ->where('sbm_id', $query['tccm_sbm_id']) // Use the sbm_id from the previous query
            ->get()
            ->getRowArray(); // Fetch the first row as an associative array

        // Check if a subject description was found
        if ($query2) {
            return $query2['sbm_desc']; // Return the subject description
        }
    }

    return null; // Return null if no matching records are found
}
