<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

spl_autoload_register();

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
