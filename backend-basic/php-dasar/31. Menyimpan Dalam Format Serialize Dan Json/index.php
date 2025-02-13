<?php

$data = [
    [
        "nama" => "Eko",
        "umur" => 30,
        "alamat" => "Subang"
    ],
    [
        "nama" => "Budi",
        "umur" => 35,
        "alamat" => "Bandung"
    ],
    [
        "nama" => "Joko",
        "umur" => 33,
        "alamat" => "Cirebon"
    ]
];

// Merubah ke serialized
$to_serialized = serialize($data);
echo $to_serialized;
file_put_contents("data.txt", $to_serialized);

echo "<br>";
echo "<br>";

// Merubah ke Unserialized
$content = file_get_contents("data.txt");
$to_unserialized = unserialize($content);

echo var_dump($to_unserialized);

echo "<br>";
echo "<br>";

// Merubah ke Json
$to_json = json_encode($data);
echo $to_json;

echo "<br>";
echo "<br>";

// Merubah Json ke Array
$to_json_to_array = json_decode($to_json, true);
echo var_dump($to_json_to_array);
