<?php
interface Figure {
    public function getArea(): float;
    public function getPerimeter(): float;
}
class Disk implements Figure {
    private float $radius;
    public function __construct(float $radius) {
        $this->radius = $radius;
    }
    public function getArea(): float {
        return pi() * $this->radius ** 2;
    }
    public function getPerimeter(): float {
        return 2 * pi() * $this->radius;
    }
}
$disk = new Disk(5.0);
echo "Площадь: " . round($disk->getArea(), 2) . "<br>";
echo "Периметр: " . round($disk->getPerimeter(), 2) . "<br>";
?>

<?php
class FiguresCollection {
    private array $figures = [];
    public function addFigure(Figure $figure): void {
        $this->figures[] = $figure;
    }
    public function getTotalPerimeter(): float {
        $total = 0.0;
        foreach ($this->figures as $figure) {
            $total += $figure->getPerimeter();
        }
        return $total;
    }
}
?>

<?php
interface iCube {
    public function __construct(float $side);
    public function getVolume(): float;
    public function getSurfaceArea(): float;
}
?>

<?php
class Cube implements iCube {
    private float $side;
    public function __construct(float $side) {
        if ($side <= 0) {
            throw new InvalidArgumentException("Сторона куба должна быть положительным числом");
        }
        $this->side = $side;
    }
    public function getVolume(): float {
        return $this->side ** 3;
    }
    public function getSurfaceArea(): float {
        return 6 * ($this->side ** 2);
    }
}
?>

<?php
interface iUser {
    public function __construct(string $name, int $age);
    public function getName(): string;
    public function getAge(): int;
}
?>

<?php
class User implements iUser {
    private string $name;
    private int $age;
    public function __construct(string $name, int $age) {
        if ($age < 0) {
            throw new InvalidArgumentException("Возраст не может быть отрицательным");
        }
        $this->name = $name;
        $this->age = $age;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getAge(): int {
        return $this->age;
    }
}
?>

<?php
interface iUser2 {
    public function getName(): string;
    public function setName(string $name): void;
    public function getAge(): int;
    public function setAge(int $age): void;
}
?>

<?php
interface iEmployee extends iUser {
    public function getSalary(): float;
    public function setSalary(float $salary): void;
}
?>

<?php
interface Figure3d {
    public function getVolume(): float;
    public function getSurfaceSquare(): float;
}
class Cube2 implements Figure3d {
    private float $side;
    public function __construct(float $side) {
        $this->side = $side;
    }
    public function getVolume(): float {
        return $this->side ** 3;
    }
    public function getSurfaceSquare(): float {
        return 6 * ($this->side ** 2);
    }
}
interface iFigure {
    public function getArea(): float;
}
class Quadrate implements iFigure {
    private float $side;
    public function __construct(float $side) {
        $this->side = $side;
    }
    public function getArea(): float {
        return $this->side ** 2;
    }
}
class Rectangle implements iFigure {
    private float $width;
    private float $height;
    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }
    public function getArea(): float {
        return $this->width * $this->height;
    }
}
$arr = [
    new Quadrate(2),
    new Cube2(3),
    new Rectangle(4, 5),
    new Quadrate(1.5),
    new Cube2(2.5),
    new Rectangle(3, 2)
];
echo "Площади объектов iFigure:<br>";
foreach ($arr as $figure) {
    if ($figure instanceof iFigure) {
        echo round($figure->getArea(), 2) . "<br>";
    }
}
echo "<br>Результаты:<br>";
foreach ($arr as $figure) {
    if ($figure instanceof iFigure && !($figure instanceof Figure3d)) {
        echo "Плоская: " . round($figure->getArea(), 2) . "<br>";
    } elseif ($figure instanceof Figure3d) {
        echo "Объёмная (площадь поверхности): " . round($figure->getSurfaceSquare(), 2) . "<br>";
    }
}
?>


