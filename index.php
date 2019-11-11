<?php declare(strict_types=1);


/**
 * Bootstrap app (initialize app)
 *   - start session if not already started
 *   - load the config file (.env.php)
 *   - setup autoloader (autoload.php)
 */
if(!isset($_SESSION)) session_start();
require_once './app/config/.env.php';
require_once './vendor/autoload.php';

/* Setup routing */
$route = new Route();
$route->routeRequest();