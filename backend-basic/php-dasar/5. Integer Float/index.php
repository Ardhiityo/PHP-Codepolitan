<?php

$a = 20;
$b = 3;

// Normal
echo $a / $b;

echo '<br>';

// Mengambil 2 digit terakhir
echo round($a / $b, 2);

echo '<br>';

// Pembulatan berdasarkan 0.5
echo round($a / $b);

echo '<br>';

// Increment
$a++;
echo $a;

echo '<br>';

// Decrement
$a--;
echo $a;
