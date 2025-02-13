<?php

$data = [1, 2, 3, 4, 5, 6, 7, 8, 9];

$genap = array_filter($data, function ($item) {
    return $item % 2 == 0;
});

print_r($genap);

$ganjil = array_filter($data, function ($item) {
    return $item % 2 == 1;
});
print_r($ganjil);

class IsPositiveInt
{
    public function __invoke($value)
    {
        return (int) $value == $value && $value > 0;
    }
}

$int = new IsPositiveInt();
var_dump($int(5));
var_dump($int("5"));
var_dump($int(5.0));
var_dump($int(-5));
var_dump($int(5.5));
