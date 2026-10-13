<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . '/models/user.php';
require_once __DIR__ . '/models/users.php';
require_once __DIR__ . '/controllers/router.php';
require_once __DIR__ . '/controllers/controller.php';
require_once __DIR__ . '/decorators/decoratorfactory.php';
require_once __DIR__ . '/decorators/userdecorator.php';
require_once __DIR__ . '/decorators/usersdecorator.php';
require_once __DIR__ . '/decorators/usermarkdowndecorator.php';
require_once __DIR__ . '/decorators/usersmarkdowndecorator.php';
require_once __DIR__ . '/views/viewfactory.php';
require_once __DIR__ . '/views/htmlview.php';
require_once __DIR__ . '/views/rssview.php';
require_once __DIR__ . '/views/userhtmlview.php';
require_once __DIR__ . '/views/userrssview.php';
require_once __DIR__ . '/views/usershtmlview.php';
require_once __DIR__ . '/views/usersrssview.php';
require_once __DIR__ . '/views/markdownview.php';
require_once __DIR__ . '/views/usermarkdownview.php';
require_once __DIR__ . '/views/usersmarkdownview.php';

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
