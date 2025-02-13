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

    public static function motto()
    {
        return "Learn PHP OOP";
    }
}

echo Student::$grades[1] . "</br>";
echo Student::motto() . "</br>";
echo Student::addStudent() . "</br>";
echo Student::count() . "</br>";
