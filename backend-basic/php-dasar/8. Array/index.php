<?php

// Cara 1
// $binatang = array("mangga", "jeruk", "apel", "anggur");

// Cara 2
$buah = ["mangga", "jeruk", "apel", "anggur"];

// Mengakses Array
echo $buah[0];

echo "<br>";

// Mengganti value Array
$buah[0] = "semangka";

echo $buah[0];

echo "<br>";

// Melihat isi data Array
echo print_r($buah);

echo "<br>";

// Melihat isi data Array dengan lengkap beserta tipe data
echo var_dump($buah);

echo "<br>";

// Menambahkan data Array di index terakhir cara 1
$buah[] = "melon";
echo var_dump($buah);

echo "<br>";

// Menambahkan data Array di index terakhir cara 2
$buah[10] = "durian";
echo var_dump($buah);

echo "<br>";

// Mengecek apabila data tidak ada, maka tidak menampilkan pesan error
echo $buah[50] ?? 'Data tidak ada';
