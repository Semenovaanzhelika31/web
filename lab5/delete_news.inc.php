<?php

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id === false || $id <= 0) {
        header('Location: news.php');
        exit;
    }

    if ($news->deleteNews($id)) {
        header('Location: news.php');
        exit;
    } else {
        $errMsg = 'Произошла ошибка при удалении новости';
    }
} else {
    header('Location: news.php');
    exit;
}
