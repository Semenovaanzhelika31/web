<?php

namespace MVC\Views;

use MVC\Decorators\DecoratorFactory;

class MarkdownView extends ViewFactory
{
    public function __construct(private DecoratorFactory $decorator) {}

    public function render(): string
    {
        return $this->decorator->title() . "\n\n" . $this->decorator->body();
    }
}