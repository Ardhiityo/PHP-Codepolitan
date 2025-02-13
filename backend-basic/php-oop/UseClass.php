<?php

class Student
{
    var $firstName;
    var $lastName;
    function fullName()
    {
        return $this->firstName . " " . $this->lastName;
    }
};

// Ini yg dinamakan instance
$student1 = new Student;

$student1->firstName = "Eko";
$student1->lastName = "Kurniawan";
echo $student1->fullName() . "</br>";

$student2 = new Student;

$student2->firstName = "Budi";
$student2->lastName = "Nugraha";
echo $student2->fullName() . "</br>";
