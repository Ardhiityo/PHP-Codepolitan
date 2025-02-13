<?php

class Student
{
    public static $grades = ["Sd", "Smp", "Sma"];

    private static  $totalStudent = 0;

    public static function addStudent()
    {
        return self::$totalStudent++;
    }

    public static function count()
    {
        return self::$totalStudent;
    }
}

class PartTimeStudent extends Student {}

echo Student::$grades[0] . "</br>";
PartTimeStudent::$grades[] = "Alumni";
echo implode(", ", Student::$grades) . "</br>";

PartTimeStudent::addStudent();
PartTimeStudent::addStudent();
PartTimeStudent::addStudent();
PartTimeStudent::addStudent();

// Value Sub class pada static mengikuti value dari parent nya, begitupun sebaliknya
echo Student::count();
