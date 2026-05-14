<?php
class BankAccount {
    private float $balance = 0;

    public function deposit(float $amount): void {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw(float $amount): bool {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getBalance(): float {
        return $this->balance;
    }
}

class SavingsAccount extends BankAccount {
    public function addInterest(float $rate): void {
        $interest = $this->getBalance() * ($rate / 100);
        $this->deposit($interest);
    }
}

class CreditAccount extends BankAccount {
    private float $creditLimit;

    public function __construct(float $creditLimit) {
        $this->creditLimit = $creditLimit;
    }

    public function withdraw(float $amount): bool {
        $available = $this->getBalance() + $this->creditLimit;
        if ($amount > 0 && $amount <= $available) {
            parent::withdraw($amount);
            return true;
        }
        return false;
    }
}


$savings = new SavingsAccount();
$savings->deposit(1000);
$savings->addInterest(5); 
echo "Баланс сберегательного счёта: " . $savings->getBalance() . "<br>";

$credit = new CreditAccount(500);
$credit->deposit(200);
$credit->withdraw(600); 
echo "Баланс кредитного счёта: " . $credit->getBalance() . "<br>";
?>