<?php

declare(strict_types=1);


/* Declare const of arrays */
define('APP_PARAMS', array(

    # App parameters
    'APP_URL'  => 'http://localhost:3000/cogip/',
    'APP_ROOT' => str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']),
    'APP_ENV'  => 'local',
    'APP_NAME' => 'cogip MVC app',

    # Database parameters
    'DB_DRIVER'   => 'mysql',     # Data source name (DSN)
    'DB_HOST'     => 'database', # Database host
    'DB_NAME'     => 'cogip_test',    # Database name
    'DB_USERNAME' => 'root',      # Database user
    'DB_PASSWORD' => 'root',          # Database password

    # PHP config

));

/* set ENV variables */
foreach (APP_PARAMS as $key => $value) {
    putenv($key . '=' . $value);
}
