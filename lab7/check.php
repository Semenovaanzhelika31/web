<?php
header('Content-Type: text/plain; charset=utf-8');

echo "PHP: " . PHP_VERSION . "\n";
echo "GD загружен: " . (extension_loaded('gd') ? 'да' : 'НЕТ') . "\n";
echo "imagecreatefromjpeg: " . (function_exists('imagecreatefromjpeg') ? 'есть' : 'НЕТ') . "\n";
echo "imagettftext: " . (function_exists('imagettftext') ? 'есть' : 'НЕТ') . "\n";

if (function_exists('gd_info')) {
    $i = gd_info();
    echo "JPEG: " . ($i['JPEG Support'] ? 'да' : 'нет') . "\n";
    echo "FreeType: " . ($i['FreeType Support'] ? 'да' : 'нет') . "\n";
}

foreach (['noise.jpg', 'fonts/bellb.ttf', 'fonts/georgia.ttf', 'noise-picture.php'] as $f) {
    $p = __DIR__ . '/' . $f;
    echo "$f: " . (is_file($p) ? 'найден, ' . filesize($p) . ' байт' : 'НЕ НАЙДЕН') . "\n";
}

echo "\nПробуем открыть noise.jpg:\n";
if (function_exists('imagecreatefromjpeg')) {
    $img = @imagecreatefromjpeg(__DIR__ . '/noise.jpg');
    echo $img ? "OK, размер " . imagesx($img) . "x" . imagesy($img) . "\n" : "ОШИБКА открытия\n";
}