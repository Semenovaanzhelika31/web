<?php

declare(strict_types=1);

namespace MyProject\Classes;

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/SuperUserInterface.php';

/**
 * Класс SuperUser.
 * Представляет супер-пользователя, наследника класса User.
 */
class SuperUser extends User implements SuperUserInterface
{
    /**
     * @var string Роль супер-пользователя.
     */
    public string $role;

    /**
     * @var int Счетчик созданных экземпляров класса SuperUser.
     */
    public static int $superUserCount = 0;

    /**
     * Конструктор класса SuperUser.
     *
     * @param string $name Имя.
     * @param string $login Логин.
     * @param string $password Пароль.
     * @param string $role Роль.
     */
    public function __construct(string $name, string $login, string $password, string $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$superUserCount++;
    }

    /**
     * Выводит информацию о супер-пользователе (перегрузка метода).
     *
     * @return void
     */
    public function showInfo(): void
    {
        parent::showInfo();
        echo "Роль: {$this->role}<br>";
    }

    /**
     * Возвращает информацию о супер-пользователе в виде массива.
     *
     * @return array
     */
    public function getInfo(): array
    {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'role' => $this->role,
        ];
    }
}
