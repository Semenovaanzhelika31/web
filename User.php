<?php

declare(strict_types=1);

namespace MyProject\Classes;

require_once __DIR__ . '/AbstractUser.php';

/**
 * Класс User.
 * Представляет обычного пользователя.
 */
class User extends AbstractUser
{
    /**
     * @var string Имя пользователя.
     */
    public string $name;

    /**
     * @var string Логин пользователя.
     */
    public string $login;

    /**
     * @var string Пароль пользователя.
     */
    private string $password;

    /**
     * @var int Счетчик созданных экземпляров класса User.
     */
    public static int $userCount = 0;

    /**
     * Конструктор класса User.
     *
     * @param string $name Имя.
     * @param string $login Логин.
     * @param string $password Пароль.
     */
    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$userCount++;
    }

    /**
     * Деструктор класса User.
     * Выводит сообщение об удалении пользователя.
     */
    public function __destruct()
    {
        echo "Пользователь {$this->login} удален.<br>";
    }

    /**
     * Выводит информацию о пользователе.
     *
     * @return void
     */
    public function showInfo(): void
    {
        echo "Имя: {$this->name}, Логин: {$this->login}<br>";
    }
}