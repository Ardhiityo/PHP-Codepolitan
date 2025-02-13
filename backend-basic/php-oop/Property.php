<?php

class Student
{
    var $name;
    var $country = 'None';
};

// Ini yg dinamakan instance
$student1 = new Student;
$student1->name = "Yusuf";
echo $student1->name . "</br>";

$student2 = new Student;
$student2->name = "Maulana";
echo $student2->name . "</br>";

$class_vars = get_class_vars('Student');
echo "<pre>";
print_r($class_vars);
echo "</pre>";

echo "</br>";

if (property_exists('Student', 'name')) {
    echo "Property does exist";
} else {
    echo "Property does not exist";
}
