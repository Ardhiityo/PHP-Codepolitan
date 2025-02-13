<?php

class User
{
    var $firstName;
    var $lastName;
    var $userName;

    function fullname()
    {
        return $this->firstName . " " . $this->lastName;
    }
}

class Customer extends User
{
    var $city;
    var $country;
    function fullname()
    {
        return  $this->firstName . " " . $this->lastName . "(customer)";
    }
};

$u = new User();
$u->firstName = "Eko";
$u->lastName = "Khannedy";

$c = new Customer();

$c->firstName = "John";
$c->lastName = "Smith";

echo $c->fullname() . "</br>";
