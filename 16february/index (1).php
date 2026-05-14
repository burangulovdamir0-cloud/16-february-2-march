<?php
class User {
    protected $name;
    protected $email;
    protected $password;
    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function getData() {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
    public function changePassword($newPassword) {
        $this->password = $newPassword;
        echo "Password for user {$this->name} has been successfully changed.<br>";
    }
}
class Admin extends User {
    private static $allUsers = [];
    public function createNewUser($name, $email, $password) {
        $newUser = new User($name, $email, $password);
        self::$allUsers[] = $newUser;
        echo "User $name has been successfully created.<br>";
        return $newUser;
    }
    public function getUserData($email = null, $name = null) {
        $results = [];
        foreach (self::$allUsers as $user) {
            $matches = true;
            if ($email && $user->email !== $email) {
                $matches = false;
            }
            if ($name && $user->name !== $name) {
                $matches = false;
            }
            if ($matches) {
                $results[] = $user->getData();
            }
        }

        return $results;
    }
}
$admin = new Admin("Ivan", "ivan@admin.com", "adminpass");
$admin->createNewUser("Anna", "anna@mail.com", "pass123");
$admin->createNewUser("Peter", "petr@mail.com", "pass456");
echo "All users:<br>";
$allData = $admin->getUserData();
foreach ($allData as $data) {
    print_r($data);
}
echo "Searching for user by email:<br>";
$annaData = $admin->getUserData(email: "anna@mail.com");
print_r($annaData);
?>
