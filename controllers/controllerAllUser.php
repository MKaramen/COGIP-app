<?php
require "../models/userModel.php";
$users = getAllUser();
$company = getAllCompany();
$invoice = getAllInvoice();

function makeTable($fetchFrom)
{
    echo "<table>";
    while ($data = $fetchFrom->fetch()) {

        echo "<tr>";
        foreach ($data as $value) {

            echo "<td class='table_value'>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
require "../views/htmlUsers.php";
