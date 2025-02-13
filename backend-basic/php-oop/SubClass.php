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

class Customer extends User {};

$c = new Customer();
$c->firstName = "John";
$c->lastName = "Smith";
echo $c->fullname() . "</br>";

// Mengecek apakah Customer adalah SubClass dari User
echo is_subclass_of('Customer', 'User') ? "yes </br>" : "no </br>";

// Mengecek Class Parent
var_dump(class_parents($c));
