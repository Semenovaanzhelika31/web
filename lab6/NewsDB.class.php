<?php

declare(strict_types=1);

require_once __DIR__ . '/INewsDB.class.php';

class NewsDB implements INewsDB, IteratorAggregate
{
    const DB_NAME = 'news.db';
    const RSS_NAME = 'rss.xml';
    const RSS_TITLE = 'Последние новости';
    const RSS_LINK = 'http://f1316434.xsph.ru/lab6/news.php';

    private PDO $_db;
    private array $items = [];

    public function __construct()
    {
        $dbPath = __DIR__ . '/' . self::DB_NAME;

        $isNew = !file_exists($dbPath) || filesize($dbPath) === 0;

        try {
            $this->_db = new PDO('sqlite:' . $dbPath);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($isNew) {
                $this->_db->beginTransaction();

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

                $this->_db->commit();
            }

            $this->getCategories();
        } catch (PDOException $e) {
            if (isset($this->_db) && $this->_db->inTransaction()) {
                $this->_db->rollBack();
            }
            $this->logError($e);
            echo 'Невозможно создать базу данных';
            exit;
        }
    }

    public function __destruct()
    {
        unset($this->_db);
    }

    private function logError(PDOException $e): void
    {
        $code = isset($this->_db) ? $this->_db->errorCode() : $e->getCode();
        $info = isset($this->_db) ? implode(' | ', $this->_db->errorInfo()) : '';
        error_log("PDO error [$code] $info: " . $e->getMessage());
    }

    private function getCategories(): void
    {
        $result = $this->_db->query("SELECT id, name FROM category");

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->items[$row['id']] = $row['name'];
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function saveNews($title, $category, $description, $source)
    {
        try {
            $dt = time();

            $title = $this->_db->quote((string)$title);
            $description = $this->_db->quote((string)$description);
            $source = $this->_db->quote((string)$source);
            $category = (int)$category;

            $sql = "INSERT INTO msgs(title, category, description, source, datetime)
                    VALUES($title, $category, $description, $source, $dt)";

            $this->_db->exec($sql);
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }

        $this->createRss();

        return true;
    }

    public function getNews()
    {
        try {
            $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime
                    FROM msgs, category
                    WHERE category.id = msgs.category
                    ORDER BY msgs.id DESC";

            $result = $this->_db->query($sql);

            $news = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $news[] = $row;
            }

            return $news;
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    public function deleteNews($id)
    {
        try {
            $id = (int)$id;
            $this->_db->exec("DELETE FROM msgs WHERE id = $id");
        } catch (PDOException $e) {
            $this->logError($e);
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

        $title = $dom->createElement('title');
        $title->appendChild($dom->createTextNode(self::RSS_TITLE));
        $channel->appendChild($title);

        $link = $dom->createElement('link');
        $link->appendChild($dom->createTextNode(self::RSS_LINK));
        $channel->appendChild($link);

        $news = $this->getNews();

        if ($news !== false) {
            foreach ($news as $row) {
                $item = $dom->createElement('item');

                $itemTitle = $dom->createElement('title');
                $itemTitle->appendChild($dom->createTextNode((string)$row['title']));

                $itemLink = $dom->createElement('link');
                $itemLink->appendChild($dom->createTextNode(self::RSS_LINK));

                $description = $dom->createElement('description');
                $description->appendChild($dom->createCDATASection((string)$row['description']));

                $pubDate = $dom->createElement('pubDate');
                $pubDate->appendChild($dom->createTextNode(date('r', (int)$row['datetime'])));

                $category = $dom->createElement('category');
                $category->appendChild($dom->createTextNode((string)$row['category']));

                $item->appendChild($itemTitle);
                $item->appendChild($itemLink);
                $item->appendChild($description);
                $item->appendChild($pubDate);
                $item->appendChild($category);

                $channel->appendChild($item);
            }
        }

        $dom->save(__DIR__ . '/' . self::RSS_NAME);
    }
}
