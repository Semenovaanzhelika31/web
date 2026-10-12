<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/settings.php';

\Singleton\Settings::get()->items_per_page = 25;
\Singleton\Settings::get()->site_name = 'Мой сайт';
\Singleton\Settings::get()->debug = true;

echo "items_per_page: " . \Singleton\Settings::get()->items_per_page . "<br>";
echo "site_name: " . \Singleton\Settings::get()->site_name . "<br>";
echo "debug: " . (\Singleton\Settings::get()->debug ? 'true' : 'false') . "<br>";

$obj1 = \Singleton\Settings::get();
$obj2 = \Singleton\Settings::get();
echo "<br>Один и тот же объект? " . ($obj1 === $obj2 ? 'Да' : 'Нет') . "<br>";
