<?php

$lokasi = "Bandung";

function salam($nama)
{
    // tidak direkomendasikan menggunakan global
    global $umur;

    // Tidak bisa mengakses variabel dari luar function
    // echo $lokasi;

    $warna = "merah";

    echo "Selamat datang,  $nama!" . ", umur Anda $umur";
}

$umur = 20;

// Tidak bisa mengakses variabel dari dalam function
// echo $warna;

salam('Tony');
