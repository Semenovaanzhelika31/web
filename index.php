<?php

declare(strict_types=1);

$lab = $_GET['lab'] ?? null;
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
        <a href="/lab2/mvc/mvc_use.php">Пример использования MVC</a>
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

<?php else: ?>
    <h1>Страница не найдена</h1>
    <p>Такой лабораторной работы нет.</p>
    <a class="back" href="/">Вернуться на главную</a>
<?php endif; ?>

</body>
</html>
