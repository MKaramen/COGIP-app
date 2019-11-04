<?php

declare(strict_types=1);


/**
 * Bootstrap app (initialize app)
 *   - start session if not already started
 *   - load the config file (.env.php)
 *   - setup autoloader (autoload.php)
 */
#if(!isset($_SESSION)) session_start();
require_once './app/config/.env.php';
require_once './vendor/autoload.php';

/* Setup routing */
$route = new Route();
$route->routeRequest();
$test = new PagesModel;
$test->users();






/* instantiate database class */
#new \App\Classes\Database();

## set custom error handler
//set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

//require_once __DIR__ . '/../app/routing/routes.php';

//new \App\RouteDispatcher($router);
