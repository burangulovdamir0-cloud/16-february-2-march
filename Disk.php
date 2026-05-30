<?php
class Disk implements Figure {
    private float $radius;

    public function __construct(float $radius) {
        if ($radius < 0) {
            throw new InvalidArgumentException("Радиус не может быть отрицательным");
        }
        $this->radius = $radius;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setRadius(float $radius): void {
        if ($radius < 0) {
            throw new InvalidArgumentException("Радиус не может быть отрицательным");
        }
        $this->radius = $radius;
    }

    public function getArea(): float {
        return pi() * $this->radius ** 2;
    }

    public function getPerimeter(): float {
        return 2 * pi() * $this->radius;
    }
}
?>