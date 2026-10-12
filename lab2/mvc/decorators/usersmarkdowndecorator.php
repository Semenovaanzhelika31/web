<?php

namespace MVC\Decorators;

class UsersMarkdownDecorator extends DecoratorFactory
{
    public $users;

    public function __construct(\MVC\Models\Users $users)
    {
        $this->users = $users;
    }

    public function title(): string
    {
        return '# Пользователи';
    }

    public function body(): string
    {
        $header  = "| Имя | Email |\n";
        $header .= "|-----|-------|\n";

        $rows = [];
        foreach ($this->users->collection as $user) {
            $name = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''));
            $rows[] = '| ' . $name . ' | ' . $user->email . ' |';
        }

        return $header . implode("\n", $rows);
    }

    public function items(): string
    {
        return $this->body();
    }
}