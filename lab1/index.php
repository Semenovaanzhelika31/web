<?php
declare(strict_types=1);
interface ShapeInterface
{
    public function calculateArea(): float;
}

class Circle implements ShapeInterface
{
    private float $radius;
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return M_PI * ($this->radius ** 2);
    }
}

$circle = new Circle(5.0);
echo "Площадь круга: " . $circle->calculateArea() . PHP_EOL;
