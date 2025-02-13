<?php

class Product
{
    public $color;

    public function __construct()
    {
        echo "New Product Was Created </br>";
    }

    public function __clone()
    {
        echo "Product Was Cloned </br>";
    }
}

$product1 = new Product();
$product1->color = "Red";
echo $product1->color . "</br>";

$product2 = clone $product1;
echo $product2->color . "</br>";
$product2->color = "Green";
echo $product2->color . "</br>";
