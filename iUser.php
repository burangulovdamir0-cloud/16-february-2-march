<?php
	interface iUser
	{
		public function setName($name);
		public function getName();
		public function setAge($age);
		public function getAge();
    }
	?>

<?php
    interface iUser2 {
    public function __construct(string $name, int $age);
    public function getName(): string;
    public function getAge(): int;
}
?>

<?php
interface iUser3
{
    public function getName(): string;
    public function setName(string $name): void;
    public function getAge(): int;
    public function setAge(int $age): void;
}
?>