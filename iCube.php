<?php
interface iCube {
    public function __construct(float $side);
    public function getVolume(): float;
    public function getSurfaceArea(): float;
}
?>
