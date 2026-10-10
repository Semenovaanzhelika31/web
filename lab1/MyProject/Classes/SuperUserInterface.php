<?php

declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Интерфейс SuperUserInterface.
 * Определяет метод для получения информации о супер-пользователе.
 */
interface SuperUserInterface
{
    /**
     * Возвращает ассоциативный массив с данными о пользователе.
     *
     * @return array
     */
    public function getInfo(): array;
}
