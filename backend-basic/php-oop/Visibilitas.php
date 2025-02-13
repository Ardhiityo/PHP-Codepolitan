<?php

class User
{
    public $firstName;
    public $lastName;
    public $userName;

    protected $regId = 1001;
    private $level = "User";

    public function fullname()
    {
        return $this->firstName . " " . $this->lastName;
    }

    protected function sayProtected()
    {
        return "Hello Protected";
    }

    private function sayPrivate()
    {
        return "Hello Private";
    }
    public function sayMe()
    {
        return  $this->sayPrivate();
    }
}

class Customer extends User
{
    public function sayParent()
    {
        return $this->sayProtected();
    }
};

$u = new User();
$u->firstName = "Eko";
$u->lastName = "Khannedy";
echo $u->fullname() . "</br>";

// Visibilitas Protected tidak bisa diakses dari luar class
// echo $u->sayProtected() . "</br>";

// Visibilitas Private tidak bisa diakses dari luar class
// echo $u->sayPrivate() . "</br>";

echo $u->sayMe() . "</br>";

$c = new Customer();
echo $c->sayParent();
