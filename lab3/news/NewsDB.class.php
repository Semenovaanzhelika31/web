<?php

echo "Шаг 1: PHP работает<br>";
error_reporting(E_ALL);
ini_set('display_errors', '1');
echo "Шаг 2: error_reporting установлен<br>";

require_once __DIR__ . '/INewsDB.class.php';
echo "Шаг 3: INewsDB подключён<br>";

echo "Шаг 4: SQLite3 доступен? " . (class_exists('SQLite3') ? 'Да' : 'Нет') . "<br>";

$db = new SQLite3('/tmp/test_news.db');
echo "Шаг 5: объект SQLite3 создан<br>";

$db->exec("CREATE TABLE test(id INTEGER)");
echo "Шаг 6: таблица создана<br>";

unset($db);
echo "Шаг 7: всё работает!<br>";
