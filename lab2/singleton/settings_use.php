<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

declare(strict_types=1);

require_once __DIR__ . '/settings.php';

use Singleton\Settings;

Settings::get()->items_per_page = 25;
Settings::get()->site_name = 'Мой сайт';
Settings::get()->debug = true;

echo "items_per_page: " . Settings::get()->items_per_page . "<br>";
echo "site_name: " . Settings::get()->site_name . "<br>";
echo "debug: " . (Settings::get()->debug ? 'true' : 'false') . "<br>";

$obj1 = Settings::get();
$obj2 = Settings::get();
echo "<br>Один и тот же объект? " . ($obj1 === $obj2 ? 'Да' : 'Нет') . "<br>";
