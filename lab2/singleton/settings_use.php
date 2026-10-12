<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');

echo "Шаг 1: скрипт запустился<br>";

$file = __DIR__ . '/settings.php';
echo "Шаг 2: ищем файл: " . $file . "<br>";

if (file_exists($file)) {
    echo "Шаг 3: файл найден!<br>";
    require_once $file;
    echo "Шаг 4: файл подключён<br>";
} else {
    echo "Шаг 3: ФАЙЛ НЕ НАЙДЕН!<br>";
    exit;
}

echo "Шаг 5: класс Settings существует? " . (class_exists('Singleton\\Settings') ? 'Да' : 'Нет') . "<br>";

if (class_exists('Singleton\\Settings')) {
    \Singleton\Settings::get()->items_per_page = 25;
    echo "Шаг 6: items_per_page = " . \Singleton\Settings::get()->items_per_page . "<br>";
}
