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
    if (empty($sm_id)){
        return '';
    }
    // Find user name from the database

    // dummy 
    $session = \Config\Services::session();
    return $session->get('fullname');
}
