<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

$user1 = new User('Иван', 'ivan', '123');
$user2 = new User('Петр', 'petr', '456');
$user3 = new User('Анна', 'anna', '789');

$user4 = new SuperUser('Админ', 'admin', 'root', 'Главный администратор');

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
$user4->showInfo();

echo "<hr>";
echo "<strong>Данные getInfo() для SuperUser:</strong><br>";
echo "<pre>";
print_r($user4->getInfo());
echo "</pre>";
echo "<hr>";

echo "Всего обычных пользователей: " . User::$userCount . "<br>";
echo "Всего супер-пользователей: " . SuperUser::$superUserCount . "<br>";
