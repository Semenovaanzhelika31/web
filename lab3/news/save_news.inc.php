<?php

if (empty($_POST['title']) ||
    empty($_POST['category']) ||
    empty($_POST['description']) ||
    empty($_POST['source'])) {
    $errMsg = 'Заполните все поля формы!';
} else {
    $title       = trim(strip_tags($_POST['title']));
    $category    = (int)$_POST['category'];
    $description = trim(strip_tags($_POST['description']));
    $source      = trim(strip_tags($_POST['source']));

    if ($news->saveNews($title, $category, $description, $source)) {
        header('Location: news.php');
        exit;
    } else {
        $errMsg = 'Произошла ошибка при добавлении новости';
    }
}
