<?php

declare(strict_types=1);

require_once __DIR__ . '/INewsDB.class.php';

class NewsDB implements INewsDB, IteratorAggregate
{
    const DB_NAME = 'news.db';
    const RSS_NAME = 'rss.xml';
    const RSS_TITLE = 'Последние новости';
    const RSS_LINK = 'http://localhost/lab3/news/news.php';

    private SQLite3 $_db;
    private array $items = [];

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

        $this->getCategories();
    }

    public function __destruct()
    {
        unset($this->_db);
    }

    private function getCategories(): void
    {
        $sql = "SELECT id, name FROM category";

        $result = $this->_db->query($sql);

        if ($result === false) {
            return;
        }

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $this->items[$row['id']] = $row['name'];
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
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

        if ($result === false) {
            return false;
        }

        $this->createRss();

        return true;
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

        if ($result === false) {
            return false;
        }

        $this->createRss();

        return true;
    }

    private function createRss(): void
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        $rss = $dom->createElement('rss');
        $dom->appendChild($rss);

        $version = $dom->createAttribute('version');
        $version->value = '2.0';
        $rss->appendChild($version);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        $channel->appendChild($dom->createElement('title', self::RSS_TITLE));
        $channel->appendChild($dom->createElement('link', self::RSS_LINK));

        $news = $this->getNews();

        if ($news !== false) {
            foreach ($news as $row) {
                $item = $dom->createElement('item');

                $title = $dom->createElement('title');
                $title->appendChild($dom->createTextNode((string)$row['title']));

                $link = $dom->createElement('link');
                $link->appendChild(
                    $dom->createTextNode(self::RSS_LINK . '?id=' . $row['id'])
                );

                $description = $dom->createElement('description');
                $description->appendChild(
                    $dom->createCDATASection((string)$row['description'])
                );

                $pubDate = $dom->createElement('pubDate');
                $pubDate->appendChild(
                    $dom->createTextNode(date('r', (int)$row['datetime']))
                );

                $category = $dom->createElement('category');
                $category->appendChild($dom->createTextNode((string)$row['category']));

                $item->appendChild($title);
                $item->appendChild($link);
                $item->appendChild($description);
                $item->appendChild($pubDate);
                $item->appendChild($category);

                $channel->appendChild($item);
            }
        }

        $dom->save(__DIR__ . '/' . self::RSS_NAME);
    }
}
