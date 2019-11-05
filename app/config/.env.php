<?php

declare(strict_types=1);


/* App root (relative path) and URL root (absolute path) */
define('APP_ROOT', str_replace('\\', '/', dirname(dirname(__DIR__))));

/* Get the app URL */
function getAppURL(): string
{
    if (isset($_SERVER['HTTPS'])) $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    else $protocol = 'http';

    return $protocol . '://localhost/COGIP-app';
}

/* Declare const of arrays (APP_PARAMS) */
define('APP_PARAMS', array(

    # App parameters
    'APP_URL'     => getAppURL(),     # URL root 
    'APP_ROOT'    => APP_ROOT,        # app root (dir of index file)
    'APP_ENV'     => 'local',         # app (site) status : dev (local) or prod (final)
    'APP_NAME'    => 'Cogip',         # app (site) name
    'APP_VERSION' => '1.0',           # app version

    # Database parameters
    'DB_DRIVER'   => 'mysql',         # Data source name (DSN)
    'DB_HOST'     => 'database',     # Database host
    'DB_NAME'     => 'cogip',    # Database name
    'DB_USERNAME' => 'root',          # Database user
    'DB_PASSWORD' => 'root',              # Database password

    # PHP config
));

/* Set env variables */
foreach (APP_PARAMS as $key => $value) {
    putenv($key . '=' . $value);
}
