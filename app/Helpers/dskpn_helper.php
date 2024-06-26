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
        return '<span class="badge badge-m bg-gradient-secondary">Dihantar</span>';
    } else if ($status == 1) {
        return '<span class="badge badge-m bg-gradient-info">Lulus</span>';
    } else if ($status == 2) {
        return '<span class="badge badge-m bg-gradient-danger">Ditolak</span>';
    } else if ($status == 3) {
        return '<span class="badge badge-m bg-gradient-secondary">Permohonan<br>Pemadaman</span>';
    } else if ($status == 4) {
        return '<span class="badge badge-m bg-gradient-danger">Dipadam</span>';
    } else {
        return 'Unknown';
    }
}

function get_dskpn_tema($dskpn_theme)
{
    switch ($dskpn_theme) {
        case 'Individu':
            return '<span class="badge badge-m bg-gradient-success">Individu</span>';
        case 'Keluarga':
            return '<span class="badge badge-m bg-gradient-info">Keluarga</span>';
        case 'Masyarakat':
            return '<span class="badge badge-m bg-gradient-primary">Masyarakat</span>';
        default:
            return '<span class="badge badge-m bg-gradient-secondary">' . $dskpn_theme . '</span>';
    }
}
