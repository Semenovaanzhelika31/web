-- Таблица для моделей (шаги «Модели в MVC» и «Применение MVC»)
CREATE TABLE IF NOT EXISTS page (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    text TEXT NOT NULL
) DEFAULT CHARSET=utf8;

INSERT INTO page (title, text) VALUES
('Страница 1', 'Текст первой страницы'),
('Страница 2', 'Текст второй страницы'),
('Страница 3', 'Текст третьей страницы'),
('Страница 4', 'Текст четвёртой страницы'),
('Страница 5', 'Текст пятой страницы');

-- Продукты из базы данных (последнее задание)
CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    quantity INT NOT NULL,
    description TEXT NOT NULL
) DEFAULT CHARSET=utf8;

INSERT INTO product (name, price, quantity, description) VALUES
('product1', 100, 5, 'Описание первого продукта'),
('product2', 200, 6, 'Описание второго продукта'),
('product3', 300, 7, 'Описание третьего продукта');
