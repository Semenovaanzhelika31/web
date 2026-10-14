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

        $isNew = !file_exists($dbPath) || filesize($dbPath) === 0;

        $this->_db = new SQLite3($dbPath);

        if ($isNew) {
            $this->_db->exec("CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
            )");

            $this->_db->exec("CREATE TABLE category(
                id INTEGER,
                name TEXT
            )");

            $this->_db->exec("INSERT INTO category(id, name)
                SELECT 1, 'Политика'
                UNION SELECT 2, 'Культура'
                UNION SELECT 3, 'Спорт'");
        }
    }

    public function __destruct()
    {
        unset($this->_db);
    }

    public function saveNews($title, $category, $description, $source)
    {
        $dt = time();

        $sql = "INSERT INTO msgs(title, category, description, source, datetime)
                VALUES(:title, :category, :description, :source, :datetime)";

        $stmt = $this->_db->prepare($sql);
        $stmt->bindValue(':title', $title, SQLITE3_TEXT);
        $stmt->bindValue(':category', (int)$category, SQLITE3_INTEGER);
        $stmt->bindValue(':description', $description, SQLITE3_TEXT);
        $stmt->bindValue(':source', $source, SQLITE3_TEXT);
        $stmt->bindValue(':datetime', $dt, SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result !== false;
    }

    public function getNews()
    {
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime
                FROM msgs, category
                WHERE category.id = msgs.category
                ORDER BY msgs.id DESC";

        $result = $this->_db->query($sql);

        if ($result === false) {
            return false;
        }

        $news = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $news[] = $row;
        }

        return $news;
    }

    public function deleteNews($id)
    {
        $sql = "DELETE FROM msgs WHERE id = :id";

        $stmt = $this->_db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result !== false;
    }
}
