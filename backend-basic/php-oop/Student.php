<?php

class Student {};

$class = get_declared_classes();
echo "Classes: " . implode(', ', $class) . "<br>";

$className = ['Product', 'Student', 'student'];
foreach ($className as $class) {
    if (class_exists($class)) {
        echo "{$class} is a declared class.<br>";
    } else {
        echo "{$class} is not a declared class.<br>";
    }
}
