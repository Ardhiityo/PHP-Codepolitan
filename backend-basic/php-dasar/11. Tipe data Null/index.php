<?php

$nama;

// Akan error karena value blm di definisikan
// echo $nama;

echo "<br>";

// Selalu gunakan null untuk menginisialisasi variable yang kosong, karena tidak akan menampilkan pesan error
$nama = null;
echo $nama;

// Atau menggunakan noalescing operator
$nama;

echo $nama ?? "Nama Kosong";
