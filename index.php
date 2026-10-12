<?php

declare(strict_types=1);
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
            font-size: 20px;
        }
        .card {
            background-color: #fff;
            margin: 12px 0;
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateX(5px);
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
        .student-info {
            color: #666;
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Мои лабораторные работы</h1>

    <h2>Лабораторная работа №1 — Классы и интерфейсы</h2>
    <div class="card">
        <a href="/lab1/users.php"> Код лабораторной работы №1</a>
    </div>
    <div class="card">
        <a href="/lab1/uml.html"> UML-диаграмма классов</a>
    </div>

    <h2>Лабораторная работа №2 — Шаблоны проектирования</h2>
    <div class="card">
        <a href="/lab2/singleton/settings_use.php"> Singleton (Одиночка)</a>
    </div>
    <div class="card">
        <a href="/lab2/singleton/singleton.png">Диаграмма Singleton</a>
    </div>

    <div class="card">
        <a href="/lab2/factory/factory_use.php"> Factory Method (Фабричный метод)</a>
    </div>
    <div class="card">
        <a href="/lab2/factory/factory.png"> Диаграмма Factory Method</a>
    </div>

    <div class="card">
        <a href="/lab2/mvc/mvc_use.php"> MVC (Модель-Представление-Контроллер)</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/controllers/mvc_controllers.png"> Диаграмма MVC — контроллеры</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/models/mvc_models.png"> Диаграмма MVC — модели</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/decorators/mvc_decorators.png"> Диаграмма MVC — декораторы</a>
    </div>
    <div class="card">
        <a href="/lab2/mvc/views/mvc_views.png"> Диаграмма MVC — представления</a>
    </div>

    <div class="student-info">
        Студент: Семенова Анжелика<br>
        Группа: 31 ПМ
    </div>
</body>
</html>
