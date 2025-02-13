<?php

function salam($nama = "")
{
    if (empty($nama)) {
        echo "Selamat Datang";
    } else {
        echo "Selamat Datang, $nama";
    }
}

salam();

echo "<br>";

$kalimat = "Saya senang belajar PHP";

// str_replace digunakan untuk mengganti kata
echo str_replace("PHP", "Javascript", $kalimat);

echo "<br>";

// str_word_count  digunakan untuk menghitung jumlah kata
echo str_word_count($kalimat);
