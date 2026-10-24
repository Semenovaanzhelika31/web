<?php

declare(strict_types=1);

namespace MyProject\Classes;

class User extends AbstractUser
{
    public string $name;
    public string $login;
    private string $password;
    public static int $userCount = 0;

    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$userCount++;
    }

    public function __destruct()
    {
        echo "Пользователь {$this->login} удален.<br>";
    }

    public function showInfo(): void
    {
        echo "Имя: {$this->name}, Логин: {$this->login}<br>";
    }
}
