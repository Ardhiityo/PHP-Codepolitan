<?php

$nama  = 'Asep';

// Benar
$ucapan  = "Selamat datang, $nama";
echo $ucapan;

echo "<br>";

// Salah
$greetings  = 'Selamat datang, $nama';
echo $greetings;

echo "<br>";

// Benar
echo 'Hai,' . ' ' . 'Asep';

// Salah
// echo 'Hai,' + 'Asep';
