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

$fonts = array_values(array_filter([
    __DIR__ . '/fonts/bellb.ttf',
    __DIR__ . '/fonts/georgia.ttf',
], 'is_file'));

if (!$fonts) {
    error_log('noise-picture: шрифты не найдены в ' . __DIR__ . '/fonts');
}

$x = 20;
$y = 40;
for ($i = 0; $i < $length; $i++) {
    $color = imagecolorallocate($img, random_int(0, 120), random_int(0, 120), random_int(0, 120));
    $size = random_int(18, 30);
    $angle = random_int(-25, 25);

    if ($fonts) {
        $font = $fonts[array_rand($fonts)];
        $res = imagettftext($img, $size, $angle, $x, $y, $color, $font, $str[$i]);
        if ($res === false) {
            error_log("imagettftext не отработала для шрифта $font");
        }
    } else {
        imagestring($img, 5, $x, $y - 15, $str[$i], $color);
    }

    $x += 40;
}

header('Content-Type: image/jpeg');
header('Cache-Control: no-store');
imagejpeg($img, null, 50);
imagedestroy($img);