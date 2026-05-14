<?php
abstract class Shape{
abstract public function calculateArea();
public function getName(): string{
return static::class; 
}
   }
class Circle extends Shape{
private float $radius;
public function __construct(float $radius){
$this->radius = $radius;
           }

public function calculateArea(): float{
return pi() * $this->radius ** 2;

    }

}
class Rectangle extends Shape{
private float $width;
private float $height;
public function __construct(float $width, float $height){
$this->width = $width;
$this->height = $height;

    }



 public function calculateArea(): float{
return $this->width * $this->height;

    }

}



class Triangle extends Shape

{
private float $base;
private float $height;
public function __construct(float $base, float $height){
$this->base = $base;
$this->height = $height;
    }



public function calculateArea(): float{
return 0.5 * $this->base * $this->height;

    }

}

$shapes = [
new Circle(5),
new Rectangle(4, 6),
new Triangle(3, 7)
];
foreach ($shapes as $shape) {
echo "Фигура: " . $shape->getName() . "<br>";
echo "Площадь: " . round($shape->calculateArea(), 2) . "<br>";
}
?>