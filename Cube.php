<?php
class Cube implements iCube {
    private float $side;

    public function __construct(float $side) {
        $this->side = $side;
    }

    public function getVolume(): float {
        return $this->side ** 3;
    }

    public function getSurfaceArea(): float {
        return 6 * ($this->side ** 2);
    }
}
$cube = new Cube(3.0);
echo $cube->getVolume();       
echo $cube->getSurfaceArea();
?>