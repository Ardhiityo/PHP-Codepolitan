<?php

$nilai = 80;
$wawancara = "B";

if ($nilai >= 70) {
    echo "Anda diterima";
    if ($wawancara == "A") {
        echo "Nilai anda memuaskan";
    } else {
        echo "Nilai anda cukup memuaskan";
    }
} else {
    echo "Nilai anda E";
}
