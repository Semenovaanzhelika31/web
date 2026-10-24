<?php

declare(strict_types=1);

namespace MyProject\Classes;

class SuperUser extends User implements SuperUserInterface
{
    public string $role;
    public static int $superUserCount = 0;

    public function __construct(string $name, string $login, string $password, string $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$superUserCount++;
        User::$userCount--;
    }

    public function showInfo(): void
    {
        parent::showInfo();
        echo "Роль: {$this->role}<br>";
    }

    public function getInfo(): array
    {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'role' => $this->role,
        ];
    }
}
