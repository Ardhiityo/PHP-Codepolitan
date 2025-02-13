<?php

$warna = "merah";
$ukuran = "XL";
$harga = 10000;
$tambahan = 5000;

if ($warna == "merah" && $ukuran == "XL") {
    echo "Biaya tambahan, total : " . $harga + $tambahan;
} else {
    echo "Harga normal";
}
