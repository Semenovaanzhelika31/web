<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/debug.log');

file_put_contents(__DIR__ . '/debug.log', date('Y-m-d H:i:s') . " — старт\n", FILE_APPEND);

try {
    file_put_contents(__DIR__ . '/debug.log', "шаг 1: PHP работает\n", FILE_APPEND);

    require_once __DIR__ . '/INewsDB.class.php';
    file_put_contents(__DIR__ . '/debug.log', "шаг 2: INewsDB подключён\n", FILE_APPEND);

    if (!class_exists('SQLite3')) {
        throw new Exception("SQLite3 не найден");
    }
    file_put_contents(__DIR__ . '/debug.log', "шаг 3: SQLite3 есть\n", FILE_APPEND);

    $dbPath = __DIR__ . '/news.db';
    file_put_contents(__DIR__ . '/debug.log', "шаг 4: путь = {$dbPath}\n", FILE_APPEND);

    $db = new SQLite3($dbPath);
    file_put_contents(__DIR__ . '/debug.log', "шаг 5: SQLite3 создан\n", FILE_APPEND);

    $db->exec("CREATE TABLE msgs(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        category INTEGER,
        description TEXT,
        source TEXT,
        datetime INTEGER
    )");
    file_put_contents(__DIR__ . '/debug.log', "шаг 6: таблица msgs создана\n", FILE_APPEND);

    $db->exec("CREATE TABLE category(id INTEGER, name TEXT)");
    file_put_contents(__DIR__ . '/debug.log', "шаг 7: таблица category создана\n", FILE_APPEND);

    $db->exec("INSERT INTO category(id, name)
        SELECT 1, 'Политика'
        UNION SELECT 2, 'Культура'
        UNION SELECT 3, 'Спорт'");
    file_put_contents(__DIR__ . '/debug.log', "шаг 8: категории добавлены\n", FILE_APPEND);

    file_put_contents(__DIR__ . '/debug.log', "шаг 9: файл news.db существует? " . (file_exists($dbPath) ? 'да' : 'нет') . ", размер " . (file_exists($dbPath) ? filesize($dbPath) : 0) . "\n", FILE_APPEND);

    unset($db);
    file_put_contents(__DIR__ . '/debug.log', "шаг 10: готово\n", FILE_APPEND);

} catch (Throwable $e) {
    file_put_contents(__DIR__ . '/debug.log', "ОШИБКА: " . $e->getMessage() . " в " . $e->getFile() . ":" . $e->getLine() . "\n", FILE_APPEND);
}
