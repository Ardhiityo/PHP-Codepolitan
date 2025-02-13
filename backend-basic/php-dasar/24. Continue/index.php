<?php

$siswa = [
    [
        "nama" => "Asep",
        "kelas" => "10"
    ],
    [
        "nama" => "Budi",
        "kelas" => "10"
    ],
    [
        "nama" => "Caca",
        "kelas" => "12"
    ],
    [
        "nama" => "Cici",
        "kelas" => "12"
    ],
];

foreach ($siswa as $key => $value) {
    if ($value["kelas"] == "10") continue;
    echo "Nama : " . $value["nama"] . "<br>";
    echo "kelas : " . $value["kelas"] . "<br>";
}
