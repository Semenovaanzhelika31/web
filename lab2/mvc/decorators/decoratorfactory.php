<?php

namespace MVC\Decorators;

abstract class DecoratorFactory
{
    public static function create(string $class, object $model, string $type = 'html')
    {

        if ($type === 'html' || $type === 'rss') {
            $cls = 'MVC\\Decorators\\' . ucfirst($class) . 'Decorator';
        } else {
            $cls = 'MVC\\Decorators\\' . ucfirst($class) . ucfirst($type) . 'Decorator';
        }

        return new $cls($model);
    }

    abstract public function title() : string;
    abstract public function body() : string;
    abstract public function items() : string;
}