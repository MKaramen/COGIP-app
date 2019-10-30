<?php
function getAllUser()
{
    $db = new PDO(
        'mysql:host=database;dbname=cogip_test',
        'root',
        'root',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        )
    );

    $req = $db->query('SELECT id, people_fullName, people_email, people_phone, people_company FROM people');

    return $req;
}
