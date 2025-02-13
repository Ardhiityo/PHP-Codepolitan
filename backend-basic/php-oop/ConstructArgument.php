<?php

class Student
{
    public static $instanceCount = 0;

    public $total;
    public $target;

    public function __construct($args = [])
    {
        self::$instanceCount++;
        $this->total = $args["total"] ?? null;
        $this->target = $args["target"] ?? null;
    }
}

class Elementary extends Student
{
    public $total = 3;
}

class Junior extends Student
{
    public $total = 2;
}

class Senior extends Student
{
    public $total = 4;
}

$student = new Student(["total" => 1, "target" => 2]);
echo "Total : " .  $student->total . "</br>";
echo "Target : " .  $student->target . "</br>";

$elemenary = new Elementary(["total" => 2, "target" => 3]);
echo "Total : " . $elemenary->total . "</br>";
echo "Target : " . $elemenary->target . "</br>";

$junior = new Junior(["total" => 3, "target" => 4]);
echo "Total : " . $junior->total . "</br>";
echo "Target : " . $junior->target . "</br>";

$senior = new Senior(["total" => 4, "target" => 5]);
echo "Total : " . $senior->total . "</br>";
echo "Target : " . $senior->target . "</br>";
