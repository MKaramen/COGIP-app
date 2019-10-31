<?php declare(strict_types=1);


spl_autoload_register(function (string $classname) {
    $folders = array(
        $_SERVER['DOCUMENT_ROOT'] . '/app/classes/'     . $classname . '.php', 
        $_SERVER['DOCUMENT_ROOT'] . '/app/route/'       . $classname . '.php', 
        $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/' . $classname . '.php', 
        $_SERVER['DOCUMENT_ROOT'] . '/app/models/'      . $classname . '.php', 
        $_SERVER['DOCUMENT_ROOT'] . '/app/views/'       . $classname . '.php',
    );
    foreach ($folders as $filename) {
        $filename = str_replace('\\', '/', $filename);
        if (file_exists($filename)) require_once $filename;
    }
});