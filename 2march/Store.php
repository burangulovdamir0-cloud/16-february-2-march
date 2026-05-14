<?php
abstract class Product {
protected float $price;
public function __construct(float $price) {
$this->price = $price;
    }
public function getPrice(): float {
return $this->price;
    }
abstract public function getFinalPrice(): float;
}
class PhysicalProduct extends Product {
private float $shippingCost;
public function __construct(float $price, float $shippingCost) {
parent::__construct($price);
$this->shippingCost = $shippingCost;

    }
public function getFinalPrice(): float {
return $this->price + $this->shippingCost;

    }

}
class DigitalProduct extends Product {
public function getFinalPrice(): float {
return $this->price;

    }

}
class DiscountedProduct extends Product {
private float $discountPercent;
public function __construct(float $price, float $discountPercent) {
parent::__construct($price);
$this->discountPercent = $discountPercent;

    }
public function getFinalPrice(): float {
return $this->price * (1 - $this->discountPercent / 100);

    }

}
$products = [
new PhysicalProduct(100, 20),     
new DigitalProduct(50),              
new DiscountedProduct(200, 15)   
];
foreach ($products as $product) {
echo get_class($product) . ": " . $product->getFinalPrice() . " руб.<br>";
}