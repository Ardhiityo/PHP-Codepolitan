<?php

$warna = ["merah", "hijau", "biru", "kuning", "merah", "kuning", "biru", "merah"];

$jumlah_warna = 0;

foreach ($warna as $key => $value) {
    echo $key . " => " . $value . "<br>";
    $warna[$key] == "merah" ? $jumlah_warna++ : $jumlah_warna;
}

echo "Jumlah warna merah adalah " . $jumlah_warna;
