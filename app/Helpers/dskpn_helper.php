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
    // Find user name from the database

    // dummy 
    $session = \Config\Services::session();
    return $session->get('fullname');
}

function get_user_role()
{
    $session = \Config\Services::session();
    return $session->get('current_role');
}

function get_dskpn_status($status)
{
    if ($status == NULL) {
        return '<span class="badge badge-m bg-gradient-secondary">Menunggu Kelulusan</span>';
    } else if ($status == 1) {
        return '<span class="badge badge-m bg-gradient-info">Lulus</span>';
    } else if ($status == 2) {
        return '<span class="badge badge-m bg-gradient-danger">Ditolak</span>';
    } else if ($status == 3) {
        return '<span class="badge badge-m bg-gradient-secondary">Menunggu Kelulusan<br>Memadam DSKPN</span>';
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
            return '<span class="badge badge-m bg-gradient-secondary">'.$dskpn_theme.'</span>';
    }
}