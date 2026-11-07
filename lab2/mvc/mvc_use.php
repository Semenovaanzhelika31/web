<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $path = str_replace('\\', '/', $className);
    
    $possiblePaths = [
        __DIR__ . '/' . $path . '.php',
        __DIR__ . '/' . strtolower($path) . '.php',
        __DIR__ . '/../' . $path . '.php',
        __DIR__ . '/../' . strtolower($path) . '.php',
    ];

    foreach ($possiblePaths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

use MVC\Controllers\Controller;

echo "<h2>HTML-представление (один пользователь)</h2>";
echo "<pre>";
echo (new Controller('users/0.html'))->render();
echo "</pre>";

echo "<h2>Markdown-представление (все пользователи)</h2>";
echo "<pre>";
echo (new Controller('users.markdown'))->render();
echo "</pre>";

echo "<h2>Markdown-представление (один пользователь)</h2>";
echo "<pre>";
echo (new Controller('users/0.markdown'))->render();
echo "</pre>";
