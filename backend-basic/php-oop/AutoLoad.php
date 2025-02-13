<?php

function autoLoad($class)
{
    if (preg_match('/\A\w+\Z/', $class)) {
        include "Classes/" . $class . ".php";
    }
}

spl_autoload_register("autoLoad");

$student = new Student();
echo $student->name . "</br>";
