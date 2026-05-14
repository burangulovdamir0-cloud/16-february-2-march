<?php
class User {
    protected $name;
    protected $email;
    protected $password;
    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function getData() {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
    public function changePassword($newPassword) {
        $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
        return "Password changed for {$this->name}";
    }
}
class Admin extends User {
    private static $allUsers = [];
    public function createNewUser($name, $email, $password) {
        foreach (self::$allUsers as $user) {
            if ($user->email === $email) {
                return "Email already exists";
            }
        }
        $newUser = new User($name, $email, $password);
        self::$allUsers[] = $newUser;
        return "User $name created";
    }
    public function getUserData($email = null, $name = null) {
        $results = [];
        foreach (self::$allUsers as $user) {
            $match = true;
            if ($email && $user->email !== $email) $match = false;
            if ($name && $user->name !== $name) $match = false;
            if ($match) $results[] = $user->getData();
        }
        return $results;
    }
    public static function getAllUsers() {
        $data = [];
        foreach (self::$allUsers as $user) {
            $data[] = $user->getData();
        }
        return $data;
    }
}
$admin = new Admin("Ivan", "ivan@admin.com", "adminpass");
echo $admin->createNewUser("Anna", "anna@mail.com", "pass123") . "<br>";
echo $admin->createNewUser("Peter", "petr@mail.com", "pass456") . "<br>";
echo "All users:<br>";
$allData = Admin::getAllUsers();
foreach ($allData as $data) {
    print_r($data);
    echo "<br>";
}
echo "Search by email:<br>";
$annaData = $admin->getUserData(email: "anna@mail.com");
print_r($annaData);
?>
