<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = 'news.db';
    private SQLite3 $_db;

    public function __construct()
    {
        $dbPath = __DIR__ . '/' . self::DB_NAME;

        echo "1. Путь к БД: " . $dbPath . "<br>";
        echo "2. Папка: " . __DIR__ . "<br>";
        echo "3. Папка существует: " . (is_dir(__DIR__) ? 'Да' : 'Нет') . "<br>";
        echo "4. Папка доступна для записи: " . (is_writable(__DIR__) ? 'Да' : 'Нет') . "<br>";
        echo "5. Файл news.db существует: " . (file_exists($dbPath) ? 'Да' : 'Нет') . "<br>";

        if (file_exists($dbPath)) {
            echo "6. Размер файла: " . filesize($dbPath) . " байт<br>";
        }

        $this->_db = new SQLite3($dbPath);
        echo "7. SQLite3 создан<br>";

        if (!file_exists($dbPath) || filesize($dbPath) === 0) {
            echo "8. Создаём таблицы...<br>";

            $r1 = $this->_db->exec("CREATE TABLE msgs(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, category INTEGER, description TEXT, source TEXT, datetime INTEGER)");
            echo "   - msgs: " . ($r1 ? 'OK' : 'ОШИБКА: ' . $this->_db->lastErrorMsg()) . "<br>";

            $r2 = $this->_db->exec("CREATE TABLE category(id INTEGER, name TEXT)");
            echo "   - category: " . ($r2 ? 'OK' : 'ОШИБКА: ' . $this->_db->lastErrorMsg()) . "<br>";

            $r3 = $this->_db->exec("INSERT INTO category(id, name) SELECT 1, 'Политика' UNION SELECT 2, 'Культура' UNION SELECT 3, 'Спорт'");
            echo "   - заполнение: " . ($r3 ? 'OK' : 'ОШИБКА: ' . $this->_db->lastErrorMsg()) . "<br>";
        } else {
            echo "8. Файл существует, таблицы не создаются<br>";
        }

        if (file_exists($dbPath)) {
            echo "9. Итоговый размер файла: " . filesize($dbPath) . " байт<br>";
        } else {
            echo "9. ФАЙЛ НЕ СОЗДАН!<br>";
        }
    }

    public function __destruct() { unset($this->_db); }
    public function saveNews($title, $category, $description, $source) { return true; }
    public function getNews() { return []; }
    public function deleteNews($id) { return true; }
}
