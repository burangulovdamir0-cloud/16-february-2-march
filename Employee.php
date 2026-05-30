<?php
class Employee
{
    private $name;
    private $age;
    private $salary;
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setAge($age) {
        $this->age = $age;
    }
    public function getAge() {
        return $this->age;
    }
    public function setSalary($salary) {
        $this->salary = $salary;
    }
    public function getSalary() {
        return $this->salary;
    }
}
$employee = new Employee();
$employee->setName("Иван Иванов");
$employee->setAge(30);
$employee->setSalary(50000.50);
echo "Имя: " . $employee->getName() . "\n";
echo "Возраст: " . $employee->getAge() . "\n";
echo "Зарплата: " . $employee->getSalary() . "\n";
?>
