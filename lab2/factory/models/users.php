<?php

declare(strict_types=1);

namespace Factory\Models;

class Users extends Collection
{
    public function __construct(public ?array $users = null)
    {
        $users ??= [
            new User(
                'dmitry.koterov@gmail.com',
                'password',
                'Дмитрий',
                'Котеров'),
            new User(
                'igorsimdyanov@gmail.com',
                'password',
                'Игорь',
                'Симдянов'),
            new User(
                'anzhelika@gmail.com',
                'password',
                'Анжелика',
                'Семенова'),
            new User(
                'ivan.petrov@gmail.com',
                'password',
                'Иван',
                'Петров'),
            new User(
                'maria.sidorova@gmail.com',
                'password',
                'Мария',
                'Сидорова'),
        ];
        parent::__construct($users);
    }
}
