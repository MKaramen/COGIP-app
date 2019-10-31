<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/COGIP-APP/app/config/_env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/COGIP-APP/vendor/autoload.php';

class BaseView extends Database
{
    public function __construct($page)
    {
        $this->page = $page;
    }
}
