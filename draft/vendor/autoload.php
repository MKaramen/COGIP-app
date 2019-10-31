<?php

declare(strict_types=1);


spl_autoload_register(function (string $classname) {
    $folders = array(
        $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/classes/'     . $classname . '.php',
        $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/route/'       . $classname . '.php',
        $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/controllers/' . $classname . '.php',
        $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/models/'      . $classname . '.php',
        $_SERVER['DOCUMENT_ROOT'] . '/COGIP-app/draft/app/views/'       . $classname . '.php',
    );
    foreach ($folders as $filename) {
        $filename = str_replace('\\', '/', $filename);
        if (file_exists($filename)) require_once $filename;
    }
});
