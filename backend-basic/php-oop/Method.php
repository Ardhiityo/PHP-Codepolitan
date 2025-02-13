<?php

class Student
{
    var $name;
    var $country = 'None';
    function sayHello()
    {
        return "Hello World";
    }
};

// Ini yg dinamakan instance
$student1 = new Student;
$student1->name = "Yusuf </br>";

$student2 = new Student;
$student2->name = "Maulana </br>";

echo $student1->name . "</br>";
echo $student1->sayHello() . "</br>";;

echo $student2->name . "</br>";
echo $student2->sayHello() . "</br>";;

$class_vars = get_class_methods('Student');
echo "<pre>";
print_r($class_vars);
echo "</pre>";

echo "</br>";

if (property_exists('Student', 'name')) {
    echo "Method does exist";
} else {
    echo "Method does not exist";
}
