<?php
trait Helper {
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        trigger_error("Свойство $property не существует", E_USER_NOTICE);
        return null;
    }
}
class City {
    use Helper;
    private $name;
    private $age;
    private $population;
    public function __construct($name, $age, $population) {
        $this->name = $name;
        $this->age = $age;
        $this->population = $population;
    }
}
$city = new City("Москва", 876, 13000000);
echo "Название: " . $city->name . "<br>";
echo "Возраст: " . $city->age . " лет<br>";
echo "Население: " . $city->population . " человек<br>";
?>

<?php
trait trait1 {
    public function method() {
        return 1;
    }
}
trait trait2 {
    public function method() {
        return 2;
    }
}
trait trait3 {
    public function method() {
        return 3;
    }
}
class Test {
    use trait1, trait2, trait3 {
        trait1::method as method1;
        trait2::method as method2;
        trait3::method as method3;
    }
    public function getSum() {
        return $this->method1() + $this->method2() + $this->method3();
    }
}
$test = new Test();
echo $test->getSum();
?>

<?php
trait Trait11
{
    private function method1()
    {
        return 1;
    }
    private function method2()
    {
        return 2;
    }
}
trait Trait22
{
    use Trait1; 
    private function method3()
    {
        return 3;
    }
}
class test {
    use Trait2; 
    public function getSum()
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}
$test = new Test();
echo $test->getSum(); 
?>