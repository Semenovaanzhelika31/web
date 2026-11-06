<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/settings.php';

$settings = Settings::get();


$settings->items_per_page = 25;
$settings->site_name = 'Мой сайт';
$settings->debug = true;


echo "items_per_page: " . $settings->items_per_page . "<br>";
echo "site_name: " . $settings->site_name . "<br>";
echo "debug: " . ($settings->debug ? 'true' : 'false') . "<br>";

$obj1 = Settings::get();
$obj2 = Settings::get();
echo "<br>Один и тот же объект? " . ($obj1 === $obj2 ? 'Да' : 'Нет') . "<br>";
