<?php

$warna = ['merah', 'kuning', 'hijau', 'biru', "merah", "merah"];

$jumlah_warna = 0;

$i = 0;

while ($i < count($warna)) {

    if ($warna[$i] == "merah") {
        $jumlah_warna++;
    }

    $i++;
}

echo "Jumlah warna merah adalah $jumlah_warna";

echo "<br>";

$jumlah_warna = 0;

$i = 0;

do {
    if ($warna[$i] == 'merah') {
        $jumlah_warna++;
    }
    $i++;
} while ($i < count($warna));

echo "Jumlah warna merah adalah $jumlah_warna";
