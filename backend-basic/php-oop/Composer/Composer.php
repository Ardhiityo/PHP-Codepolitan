<?php
require_once 'vendor/autoload.php';

use Faker\{Factory};

$faker = Factory::create();
echo $faker->name() . "</br>";
echo $faker->email() . "</br>";
echo $faker->text() . "</br>";
