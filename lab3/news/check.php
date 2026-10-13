<?php

$db = new SQLite3(__DIR__ . '/news.db');

echo "<h2>Таблицы в базе:</h2>";
$result = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
while ($row = $result->fetchArray()) {
    echo "- " . $row['name'] . "<br>";
}

echo "<h2>Категории:</h2>";
$result = $db->query("SELECT * FROM category");
while ($row = $result->fetchArray()) {
    echo "ID: " . $row['id'] . " — " . $row['name'] . "<br>";
}

echo "<h2>Структура таблицы msgs:</h2>";
$result = $db->query("PRAGMA table_info(msgs)");
while ($row = $result->fetchArray()) {
    echo "- " . $row['name'] . " (" . $row['type'] . ")<br>";
}

echo "<h2>Записей в msgs:</h2>";
$result = $db->query("SELECT COUNT(*) as cnt FROM msgs");
$row = $result->fetchArray();
echo "Всего: " . $row['cnt'] . "<br>";

echo "<h2>Новости:</h2>";
$result = $db->query("SELECT * FROM msgs ORDER BY id DESC");
while ($row = $result->fetchArray()) {
    echo "ID: " . $row['id'] . " — " . $row['title'] . " (" . $row['source'] . ")<br>";
}
