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
    return $session->get('current_role');
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
        return '<span class="badge badge-no-role">TIADA AKSES</span>'; // Return a placeholder if no roles found
    }
}
