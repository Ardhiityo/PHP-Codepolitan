<?php

$kalimat = "Hello World";

// membuat file & menulis file : file_put_contents(namafile.formatfile, isi file)
// file_put_contents("data.txt", $kalimat);

// membaca file :
$isi_file = file_get_contents("data.txt");
// echo $isi_file;

echo "<br>";

$kalimat_kedua = "Hello Dunia \n";

// membuat file & menulis file tanpa menimpa isi dari file tersebut apabila nama file sama
file_put_contents("data.txt", $kalimat_kedua, FILE_APPEND);

echo $isi_file;
