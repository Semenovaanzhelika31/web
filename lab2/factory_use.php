<?php

declare(strict_types=1);
spl_autoload_register(function ($className) {
    $path = str_replace('\\', '/', $className);
    $parts = explode('/', $path);
    $parts = array_map('lcfirst', $parts);
    $relativePath = implode('/', $parts) . '.php';

    $possiblePaths = [
        __DIR__ . '/' . $relativePath,                      
        __DIR__ . '/patterns/' . $relativePath,             
        __DIR__ . '/../' . $relativePath,                   
    ];

    foreach ($possiblePaths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

use Factory\Router;

$obj = Router::parse('users');
echo $obj->render();
