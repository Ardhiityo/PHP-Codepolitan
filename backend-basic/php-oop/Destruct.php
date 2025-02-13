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

    public function __destruct()
    {
        self::$instanceCount--;
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

$elemenary = new Elementary(["total" => 2, "target" => 3]);
$junior = new Junior(["total" => 3, "target" => 4]);
$senior = new Senior(["total" => 4, "target" => 5]);

unset($senior);

echo "Count : " . Student::$instanceCount . "</br>";
