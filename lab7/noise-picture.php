<?php

session_start();

$alphabet = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$length = random_int(5, 6);
$str = '';
for ($i = 0; $i < $length; $i++) {
    $str .= $alphabet[random_int(0, strlen($alphabet) - 1)];
}

$_SESSION['captcha'] = $str;

$img = imagecreatefromjpeg(__DIR__ . '/noise.jpg');
$width  = imagesx($img);
$height = imagesy($img);

$fonts = array_values(array_filter([
    __DIR__ . '/fonts/bellb.ttf',
    __DIR__ . '/fonts/georgia.ttf',
], 'is_file'));

if (!$fonts) {
    error_log('noise-picture: шрифты не найдены в ' . __DIR__ . '/fonts');
}

$margin = 3;                                   
$step   = ($width - 2 * $margin) / $length;    

for ($i = 0; $i < $length; $i++) {
    $color = imagecolorallocate($img, random_int(0, 120), random_int(0, 120), random_int(0, 120));
    $angle = random_int(-20, 20);
    $char  = $str[$i];

    if (!$fonts) {
        imagestring($img, 5, (int)($margin + $i * $step), 10, $char, $color);
        continue;
    }

    $font = $fonts[array_rand($fonts)];

    $size = random_int(18, 30);
    do {
        $box = imagettfbbox($size, $angle, $font, $char);
        $minX = min($box[0], $box[2], $box[4], $box[6]);
        $maxX = max($box[0], $box[2], $box[4], $box[6]);
        $minY = min($box[1], $box[3], $box[5], $box[7]);
        $maxY = max($box[1], $box[3], $box[5], $box[7]);
        $glyphW = $maxX - $minX;
        $glyphH = $maxY - $minY;
        $fits = $glyphH <= $height - 2 * $margin && $glyphW <= $step;
    } while (!$fits && --$size >= 8);

    $x = (int)($margin + $i * $step + ($step - $glyphW) / 2 - $minX);
    $freeY = max(0, $height - 2 * $margin - $glyphH);
    $y = (int)($margin - $minY + random_int(0, (int)$freeY));

    imagettftext($img, $size, $angle, $x, $y, $color, $font, $char);
}

header('Content-Type: image/jpeg');
header('Cache-Control: no-store');
imagejpeg($img, null, 50);
imagedestroy($img);
