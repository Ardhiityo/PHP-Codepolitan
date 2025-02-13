<?php

$siswa = [];

// Tidak perlu memberikan nomor index, akan terurut otomatis
$siswa[] = "Rizky";
$siswa[] = "Rizal";
$siswa[] = "Reza";;

echo var_dump($siswa);

echo "<br>";

$guru = [];
$guru["Matematika"] = "Budi";
$guru["Fisika"] = "Rudi";
$guru["Biologi"] = "Dodi";

echo var_dump($guru);

echo "<br>";

// Mengakses Array dengan property index
echo $guru["Matematika"];

echo "<br>";

// Membuat data array sekaligus dengan index prooperty
$mobil = [
    "merk" => "Toyota",
    "warna" => "Hitam",
    "tahun" => 2020
];

echo var_dump($mobil);

echo "<br>";

echo $mobil["merk"];
