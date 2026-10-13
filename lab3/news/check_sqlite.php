<?php
echo "PHP version: " . phpversion() . "<br>";
echo "SQLite3 extension: " . (extension_loaded('sqlite3') ? 'Загружен' : 'НЕ ЗАГРУЖЕН') . "<br>";
echo "Класс SQLite3: " . (class_exists('SQLite3') ? 'Существует' : 'НЕ СУЩЕСТВУЕТ') . "<br>";

if (class_exists('SQLite3')) {
    try {
        $db = new SQLite3('/tmp/test.db');
        echo "SQLite3 работает!<br>";
        unset($db);
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage() . "<br>";
    }
}
