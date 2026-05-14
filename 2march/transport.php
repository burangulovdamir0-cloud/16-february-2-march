<?php
abstract class Transport {
protected float $speed;
public function setSpeed(float $speed): void {
$this->speed = $speed;

    }
abstract public function move(): void;

}
class Car extends Transport {
public function move(): void {
echo "Автомобиль едет со скоростью {$this->speed} км/ч<br>";

    }

}
class Bike extends Transport {
public function move(): void {
echo "Велосипед едет со скоростью {$this->speed} км/ч<br>";

    }

}
class Plane extends Transport {
public function move(): void {
echo "Самолёт летит со скоростью {$this->speed} км/ч<br>";

    }

}
$transport = [
new Car(),
new Bike(),
new Plane()

];
foreach ($transport as $vehicle) {
$vehicle->setSpeed(rand(10, 100));
$vehicle->move();
}
?>
