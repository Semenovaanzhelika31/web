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
        echo "Путь: " . $dbPath . "<br>";
        echo "Файл существует: " . (file_exists($dbPath) ? 'Да' : 'Нет') . "<br>";

        $this->_db = new SQLite3($dbPath);

        if (!file_exists($dbPath) || filesize($dbPath) === 0) {
            echo "Создаём таблицы...<br>";

            $r1 = $this->_db->exec("CREATE TABLE msgs(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, category INTEGER, description TEXT, source TEXT, datetime INTEGER)");
            echo "Таблица msgs: " . ($r1 ? 'OK' : 'ОШИБКА: ' . $this->_db->lastErrorMsg()) . "<br>";

            $r2 = $this->_db->exec("CREATE TABLE category(id INTEGER, name TEXT)");
            echo "Таблица category: " . ($r2 ? 'OK' : 'ОШИБКА: ' . $this->_db->lastErrorMsg()) . "<br>";

            $r3 = $this->_db->exec("INSERT INTO category(id, name) SELECT 1, 'Политика' UNION SELECT 2, 'Культура' UNION SELECT 3, 'Спорт'");
            echo "Заполнение category: " . ($r3 ? 'OK' : 'ОШИБКА: ' . $this->_db->lastErrorMsg()) . "<br>";
        } else {
            echo "Файл существует, таблицы не создаются.<br>";
        }

        echo "Размер БД после операций: " . filesize($dbPath) . " байт<br>";
    }

    public function __destruct() { unset($this->_db); }
    public function saveNews($title, $category, $description, $source) { return true; }
    public function getNews() { return []; }
    public function deleteNews($id) { return true; }
}
