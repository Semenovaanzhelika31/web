<?php
// Роутер для встроенного сервера PHP (замена .htaccess): php -S 0.0.0.0:3001 router.php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// статические файлы из webroot отдаём как есть
if (strpos($path, '/project/webroot/') === 0 && is_file(__DIR__ . $path)) {
    return false;
}

require __DIR__ . '/index.php';
