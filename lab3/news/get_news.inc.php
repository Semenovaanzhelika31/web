<?php

$items = $news->getNews();

if ($items === false) {
    $errMsg = 'Произошла ошибка при выводе новостной ленты';
    echo '<div style="color: red; font-weight: bold;">' . htmlspecialchars($errMsg) . '</div>';
} else {
    $count = count($items);
    echo "<p>Всего новостей: <strong>{$count}</strong></p>";

    if ($count === 0) {
        echo "<p>Новостей пока нет.</p>";
    } else {
        foreach ($items as $item) {
            echo '<div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">';
            echo '<h3>' . htmlspecialchars($item['title']) . '</h3>';
            echo '<p><strong>Категория:</strong> ' . htmlspecialchars($item['category']) . '</p>';
            echo '<p>' . htmlspecialchars($item['description']) . '</p>';
            echo '<p><em>Источник: ' . htmlspecialchars($item['source']) . '</em></p>';
            echo '<p><small>Дата: ' . date('d.m.Y H:i', (int)$item['datetime']) . '</small></p>';
            echo '<a href="' . $_SERVER['PHP_SELF'] . '?id=' . $item['id'] . '">Удалить</a>';
            echo '</div>';
        }
    }
}
