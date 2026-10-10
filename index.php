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
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        li:hover {
            transform: translateX(5px);
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
        a:hover {
            color: #388E3C;
        }
        .student-info {
            color: #666;
            margin-top: 30px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Мои лабораторные работы</h1>
    
    <ul>
        <li>
            <a href="/lab1/index.php">Лабораторная работа №1 — Классы и интерфейсы</a>
        </li>
    </ul>

    <div class="student-info">
        <p>Студент: Семенова Анжелика</p>
        <p>Группа: [номер группы]</p>
    </div>
</body>
</html>
