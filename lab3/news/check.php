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

echo "<h2>Новости в базе:</h2>";
$result = $db->query("SELECT id, title, category, description, source, datetime FROM msgs ORDER BY id DESC");
while ($row = $result->fetchArray()) {
    echo "<strong>ID:</strong> " . $row['id'] . "<br>";
    echo "<strong>Заголовок:</strong> " . $row['title'] . "<br>";
    echo "<strong>Категория:</strong> " . $row['category'] . "<br>";
    echo "<strong>Текст:</strong> " . $row['description'] . "<br>";
    echo "<strong>Источник:</strong> " . $row['source'] . "<br>";
    echo "<strong>Дата:</strong> " . date('d.m.Y H:i', $row['datetime']) . "<br>";
    echo "<hr>";
}
