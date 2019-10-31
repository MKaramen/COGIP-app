<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/config/_env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/vendor/autoload.php';

$page = "company.php";

var_dump(BaseModel::displayPage($page));
