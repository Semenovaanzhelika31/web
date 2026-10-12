<?php

declare(strict_types=1);

// Абсолютный путь к автозагрузчику Composer
require_once '/workspaces/php8/vendor/autoload.php';

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
