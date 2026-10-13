<?php

declare(strict_types=1);

require_once __DIR__ . '/INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = 'news.db';

    private SQLite3 $_db;

    public function __construct()
    {
        $dbPath = __DIR__ . '/' . self::DB_NAME;

        $this->_db = new SQLite3($dbPath);

        if (!file_exists($dbPath) || filesize($dbPath) === 0) {
            $this->_db->exec("
                CREATE TABLE msgs(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT,
                    category INTEGER,
                    description TEXT,
                    source TEXT,
                    datetime INTEGER
                )
            ");

            $this->_db->exec("
                CREATE TABLE category(
                    id INTEGER,
                    name TEXT
                )
            ");

            $this->_db->exec("
                INSERT INTO category(id, name)
                SELECT 1 as id, 'Политика' as name
                UNION SELECT 2 as id, 'Культура' as name
                UNION SELECT 3 as id, 'Спорт' as name
            ");
        }
    }

    public function __destruct()
    {
        unset($this->_db);
    }

    public function saveNews($title, $category, $description, $source)
    {
        return true;
    }

    public function getNews()
    {
        return [];
    }

    public function deleteNews($id)
    {
        return true;
    }
}
