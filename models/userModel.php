<?php

function dbConnect()
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
    return $db;
}

function getAllUser()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, people_fullName, people_email, people_phone, people_company FROM people');

    return $req;
}

function getAllCompany()
{
    $db = dbConnect();
    $req = $db->query('SELECT id,company_name, company_tva, company_country FROM company');
    return $req;
}

function getAllInvoice()
{
    $db = dbConnect();
    $req = $db->query('SELECT id,invoice_number, invoice_date FROM invoice');
    return $req;
}
