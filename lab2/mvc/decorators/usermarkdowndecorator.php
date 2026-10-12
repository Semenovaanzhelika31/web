<?php

namespace MVC\Decorators;

class UserMarkdownDecorator extends DecoratorFactory
{
    public function __construct(private \MVC\Models\User $user) {}

    public function title(): string
    {
        return '# Пользователь';
    }

    public function body(): string
    {
        $name = trim(($this->user->first_name ?? '') . ' ' . ($this->user->last_name ?? ''));
        return "**{$name}** ({$this->user->email})";
    }

    public function items(): string
    {
        return $this->body();
    }
}