<?php

declare(strict_types=1);

require __DIR__ . '/lab4/NumbersSquared.php';

$lab = $_GET['lab'] ?? null;

// Адрес MVC-фреймворка (лаба 8).
$host      = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'] ?? '';
$codespace = getenv('CODESPACE_NAME');
$domain    = getenv('GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN');

if (strpos($host, '-3000.') !== false) {
    // Codespaces: тот же адрес, но порт 3001
    $lab8Url = 'https://' . str_replace('-3000.', '-3001.', $host) . '/';
} elseif ($codespace && $domain) {
    $lab8Url = "https://{$codespace}-3001.{$domain}/";
} else {
    $lab8Url = 'http://f1316434.xsph.ru/lab8/';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои лабораторные работы</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        h2 {
            color: #4CAF50;
            margin-top: 30px;
        }
        .card {
            background-color: #fff;
            margin: 12px 0;
            padding: 18px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .card a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
            display: block;
        }
        .card a:hover {
            color: #388E3C;
        }
        .card .desc {
            color: #666;
            font-size: 13px;
            margin-top: 4px;
        }
        .back {
            display: inline-block;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
        }
        .student-info {
            color: #666;
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
        }
        /* Стили для красивого вывода кода 4-й лабы */
        .result-box {
            background-color: #fff;
            padding: 18px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-family: monospace;
            font-size: 15px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

<?php if ($lab === null): ?>
    <h1>Мои лабораторные работы</h1>

    <div class="card">
        <a href="/?lab=1">Лабораторная работа №1 — Классы и интерфейсы</a>
    </div>

    <div class="card">
        <a href="/?lab=2">Лабораторная работа №2 — Шаблоны проектирования</a>
    </div>

    <div class="card">
        <a href="/?lab=3">Лабораторная работа №3 — Веб-приложение news</a>
    </div>

    <div class="card">
        <a href="/?lab=4">Лабораторная работа №4 — Standard PHP Library</a>
    </div>

    <div class="card">
        <a href="/?lab=5">Лабораторная работа №5 — Работа с XML (RSS)</a>
    </div>

    <div class="card">
        <a href="/?lab=6">Лабораторная работа №6 — PHP Data Objects</a>
    </div>

    <div class="card">
        <a href="/?lab=7">Лабораторная работа №7 — Сессии и CAPTCHA</a>
    </div>

    <div class="card">
        <a href="/?lab=8">Лабораторная работа №8 — MVC-фреймворк</a>
    </div>

    <div class="student-info">
        Студент: Семенова Анжелика<br>
        Группа: 31 ПМ
    </div>

<?php elseif ($lab === '1'): ?>
    <h1>Лабораторная работа №1 — Классы и интерфейсы</h1>

    <div class="card">
        <a href="/lab1/users.php">Код лабораторной работы №1</a>
    </div>

    <div class="card">
        <a href="/lab1/uml.html">UML-диаграмма классов</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '2'): ?>
    <h1>Лабораторная работа №2 — Шаблоны проектирования</h1>

    <h2>1. Singleton</h2>
    <div class="card">
        <a href="/lab2/singleton/settings_use.php">Пример использования Singleton</a>
    </div>
    <div class="card">
        <a href="/lab2/singleton/singleton.png">Диаграмма Singleton</a>
    </div>

    <h2>2. Factory Method</h2>
    <div class="card">
        <a href="/lab2/factory/factory_use.php">Пример использования Factory Method</a>
    </div>
    <div class="card">
        <a href="/lab2/factory/factory.png">Диаграмма Factory Method</a>
    </div>

    <h2>3. MVC</h2>
    <div class="card">
        <a href="/lab2/mvc_use.php">Пример использования MVC</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/controllers/mvc_controllers.png">Диаграмма MVC — контроллеры</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/models/mvc_models.png">Диаграмма MVC — модели</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/decorators/mvc_decorators.png">Диаграмма MVC — декораторы</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/views/mvc_views.png">Диаграмма MVC — представления</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '3'): ?>
    <h1>Лабораторная работа №3 — Веб-приложение news</h1>

    <div class="card">
        <a href="/lab3/news/news.php">Приложение «Новостная лента»</a>
    </div>

    <div class="card">
        <a href="/lab3/news/uml.png">UML-диаграмма классов приложения</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '4'): ?>
    <h1>Лабораторная работа №4 — Standard PHP Library</h1>

    <h2>Демонстрация работы итератора NumbersSquared</h2>
    <p>Класс <code>NumbersSquared</code> реализует интерфейс <code>Iterator</code>
    и возвращает квадраты чисел в диапазоне от 3 до 7:</p>

    <div class="result-box">
        <?php
        $obj = new NumbersSquared(3, 7);
        foreach ($obj as $num => $square) {
            echo "Квадрат числа $num<sup>2</sup> = $square<br>";
        }
        ?>
    </div>

    <h2>Материалы к работе</h2>

    <div class="card">
        <a href="/lab4/diagram.png" target="_blank">UML-диаграмма классов NumbersSquared (PlantUML)</a>
    </div>

    <div class="card">
        <a href="/lab4/NumbersSquared.php" download>Скачать исходный код класса NumbersSquared.php</a>
    </div>

    <h2>Приложение news (IteratorAggregate)</h2>

    <div class="card">
        <a href="/lab4/news/news.php">Приложение «Новостная лента» (категории через итератор)</a>
    </div>

    <div class="card">
        <a href="/lab4/news/uml.png" target="_blank">UML-диаграмма классов приложения news (дополненная)</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '5'): ?>
    <h1>Лабораторная работа №5 — Работа с XML (RSS)</h1>

    <div class="card">
        <a href="/lab5/news.php">Приложение «Новостная лента» с генерацией RSS</a>
    </div>

    <div class="card">
        <a href="/lab5/rss.xml" target="_blank">Файл rss.xml</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '6'): ?>
    <h1>Лабораторная работа №6 — PHP Data Objects</h1>

    <div class="card">
        <a href="/lab6/news.php">Приложение «Новостная лента» на PDO</a>
    </div>

    <div class="card">
        <a href="/lab6/rss.xml" target="_blank">Файл rss.xml</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '7'): ?>
    <h1>Лабораторная работа №7 — Сессии и CAPTCHA</h1>

    <div class="card">
        <a href="/lab7/registration.php">Страница регистрации с проверочной картинкой</a>
    </div>

    <a class="back" href="/">Вернуться на главную</a>

<?php elseif ($lab === '8'): ?>
    <h1>Лабораторная работа №8 — MVC-фреймворк</h1>

    <h2>Контроллеры, действия и роуты</h2>
    <div class="card"><a href="<?= $lab8Url ?>test/act1/">TestController: act1</a></div>
    <div class="card"><a href="<?= $lab8Url ?>nums/1/2/3/">NumController: сумма 1 + 2 + 3</a></div>
    <div class="card"><a href="<?= $lab8Url ?>user/3/">UserController: юзер по id</a></div>
    <div class="card"><a href="<?= $lab8Url ?>user/3/name/">UserController: поле юзера</a></div>
    <div class="card"><a href="<?= $lab8Url ?>user/all/">UserController: все юзеры</a></div>
    <div class="card"><a href="<?= $lab8Url ?>user/first/2/">UserController: первые N юзеров</a></div>

    <h2>Представления и шаблоны</h2>
    <div class="card"><a href="<?= $lab8Url ?>product/1/">Product: один продукт</a></div>
    <div class="card"><a href="<?= $lab8Url ?>products/all/">Product: все продукты (таблица)</a></div>
    <div class="card"><a href="<?= $lab8Url ?>my-page/1/">Page: страница с тайтлом</a></div>

    <h2>Модели и база данных</h2>
    <div class="card"><a href="<?= $lab8Url ?>page/test/">Page: проверка модели (var_dump)</a></div>
    <div class="card"><a href="<?= $lab8Url ?>pages/">Page: все страницы из базы</a></div>
    <div class="card"><a href="<?= $lab8Url ?>db-products/">Product: все продукты из базы</a></div>

    <a class="back" href="/">Вернуться на главную</a>

<?php else: ?>
    <h1>Страница не найдена</h1>
    <p>Такой лабораторной работы нет.</p>
    <a class="back" href="/">Вернуться на главную</a>
<?php endif; ?>

</body>
</html>
