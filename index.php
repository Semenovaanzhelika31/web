<?php

declare(strict_types=1);

/**
 * Главная страница сайта.
 * Содержит список выполненных лабораторных работ.
 */
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
        .card {
            background-color: #fff;
            margin: 15px 0;
            padding: 20px;
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
            font-size: 18px;
            font-weight: bold;
            display: block;
        }
        .card a:hover {
            color: #388E3C;
        }
        .card .desc {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
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
    <h1> Мои лабораторные работы</h1>

    <div class="card">
        <a href="/lab1/users.php"> Лабораторная работа №1 — Классы и интерфейсы</a>
    </div>
    <div class="card">
        <a href="/lab1/uml.html"> UML-диаграмма классов</a>
    </div>
        <div class="card">
        <a href="/lab1/users.php"> Лабораторная работа №2 — Шаблоны проектирования</a>
    </div>

    <div class="student-info">
        Студент: Семенова Анжелика<br>
        Группа: 31 ПМ
    </div>
</body>
</html>
