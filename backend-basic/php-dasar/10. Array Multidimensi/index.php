<?php


$binatang = ["singa", "harimau", "singa", ["kambing", "kerbau", "kuda"], "ayam", "bebek", "kucing"];

echo $binatang[3][1];

echo "<br>";

// array multidimensi cara 1
$karnivora = ["singa", "harimau", "singa"];
$herbivora = ["kambing", "kerbau", "kuda"];
$omnivora = ["ayam", "bebek", "kucing"];

$binatang = [$karnivora, $herbivora, $omnivora];

echo $binatang[0][1];

echo "<br>";

// array multidimensi dengan index property cara 2
$karnivora = ["singa", "harimau", "singa"];
$herbivora = ["kambing", "kerbau", "kuda"];
$omnivora = ["ayam", "bebek", "kucing"];

$binatang = ["karnivora" => $karnivora, "herbivora" => $herbivora, "omnivora" => $omnivora];

echo $binatang["karnivora"][1];
