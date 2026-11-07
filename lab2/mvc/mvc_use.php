<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/models/user.php';
require_once __DIR__ . '/models/users.php';
require_once __DIR__ . '/decorators/userdecorator.php';
require_once __DIR__ . '/decorators/usersdecorator.php';
require_once __DIR__ . '/decorators/usermarkdowndecorator.php';
require_once __DIR__ . '/decorators/usersmarkdowndecorator.php';
require_once __DIR__ . '/views/viewfactory.php';
require_once __DIR__ . '/views/markdownview.php';
require_once __DIR__ . '/views/usermarkdownview.php';
require_once __DIR__ . '/views/usersmarkdownview.php';

$usersModel = new Users(); 
$userModel = new User('test@mail.ru', 'pass', 'Иван', 'Иванов'); // Если нужен один

echo "<h2>Markdown-представление (все пользователи)</h2>";
echo "<pre>";
$usersDecorator = new UsersMarkdownDecorator($usersModel->getUsers()); 
$markdownView = new MarkdownView($usersDecorator); 
echo $markdownView->render();
echo "</pre>";

echo "<h2>Markdown-представление (один пользователь)</h2>";
echo "<pre>";
$userDecorator = new UserMarkdownDecorator($userModel);
$userMarkdownView = new MarkdownView($userDecorator);
echo $userMarkdownView->render();
echo "</pre>";
