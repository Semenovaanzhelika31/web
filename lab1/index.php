<?php

declare(strict_types=1);

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

// Автозагрузка классов
spl_autoload_register(function ($className) {
    // Преобразуем пространство имен в путь к файлу
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

echo "<h1>Лабораторная работа №1</h1>";

// Создание трех обычных пользователей
$user1 = new User('Анжелика', 'anzhelika', 'pass123');
$user2 = new User('Иван', 'ivan', 'pass456');
$user3 = new User('Мария', 'maria', 'pass789');

// Вывод информации о них
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

echo "<hr>";

// Создание супер-пользователя
$superUser = new SuperUser('Админ', 'admin', 'adminpass', 'Администратор');
$superUser->showInfo();

echo "<hr>";

// Вывод информации через getInfo()
echo "<h3>Информация о супер-пользователе (getInfo):</h3>";
echo "<pre>";
print_r($superUser->getInfo());
echo "</pre>";

echo "<hr>";

// Статистика
echo "<h3>Статистика:</h3>";
echo "Всего обычных пользователей: " . User::$userCount . "<br>";
echo "Всего супер-пользователей: " . SuperUser::$superUserCount . "<br>";
