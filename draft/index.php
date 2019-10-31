<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/config/_env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/vendor/autoload.php';

$test = new Database();

$company = $test->getData("company_name", "company");

while ($data = $company->fetch()) {
    print_r($data);
}
