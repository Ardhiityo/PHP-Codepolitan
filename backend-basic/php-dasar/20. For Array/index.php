<?php

$warna = ["merah", "kuning", "hijau", "biru", "ungu", "hitam", "putih", "coklat", "abu-abu", "merah", "kuning", "hijau", "biru", "ungu", "hitam", "putih", "coklat", "abu-abu", "merah"];

// count digunakan untuk menghitung jumlag panjang array
// echo count($warna);

$jumlah_warna = 0;

for ($i = 0; $i < count($warna); $i++) {
    if ($warna[$i] == "merah") {
        $jumlah_warna++;
    }
}

echo "Jumlah warna merah adalah $jumlah_warna";
