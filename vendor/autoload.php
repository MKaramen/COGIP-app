<?php

declare(strict_types=1);


/* App root (relative path) */
define('ROOT', str_replace('\\', '/', dirname(__DIR__)));

/* Autoload classes with spl (standard PHP library autoload register) */
spl_autoload_register(function (string $classname) 
{
    $folders = array(
        ROOT . '/app/helpers/'     . $classname . '.php',
        ROOT . '/app/route/'       . $classname . '.php',
        ROOT . '/app/controllers/' . $classname . '.php',
        ROOT . '/app/models/'      . $classname . '.php',
        ROOT . '/app/views/'       . $classname . '.php',
    );

    foreach ($folders as $filename) 
    {
        if (file_exists($filename)) require_once $filename;
    }
});

