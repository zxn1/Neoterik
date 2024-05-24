<?php

use Config\Database;

// Function get Kompetensi teras
function getKompetensi($gd_id, $sm_id, $dskpn_id)
{
    // Connect to the database
    $db = Database::connect();

    // Build the query to select the desired row
    $query = $db->table('domain')
        ->select('d_name')
        ->where('gd_id', $gd_id)
        ->where('sm_id', $sm_id)
        ->where('dskpn_id', $dskpn_id)
        ->get();

    // Fetch the row as an array
    $row = $query->getRowArray();

    return $row;
}




// Function get 16 Domain
function getDomain($d_id, $ls_id)
{
}
// Function get 7 Kemahiran Insaniah
function getKemahiranInsan($d_id, $ls_id)
{
}
