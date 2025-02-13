<?php

$nama = $_GET['nama'] ?? 'Guest';
$alamat = $_GET['alamat'] ?? 'Tidak diketahui';

echo var_dump($_GET);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query String GET</title>
</head>

<body>

    <h1>Selamat datang, <?php echo $nama ?></h1>
    <h1>Alamat anda di <?php echo $alamat ?></h1>

    <p>Selamat belajar pemrograman PHP dasar.</p>

    <form method="GET">
        <label for="nama">Nama</label>
        <input type="text" name="nama" placeholder="Nama">
        <br>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" placeholder="Alamat">
        <button type="submit">Send</button>
    </form>

</body>

</html>