<?php

declare(strict_types=1);

require_once __DIR__ . '/INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = 'news.db';

    private SQLite3 $_db;

    public function __construct()
    {
        $this->_db = new SQLite3(__DIR__ . '/' . self::DB_NAME);
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

$news = new NewsDB();
