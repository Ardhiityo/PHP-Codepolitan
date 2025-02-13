<?php

$warna = ["merah", "kuning", "hijau", "biru", "ungu", "coklat", "putih", "hitam"];

foreach ($warna as $key => $value) {
    echo "Warna $value ada di index ke-$key<br>";
    if ($value == "ungu") {
        echo "Warna ungu ada di index ke-$key";
        break;
    }
}
