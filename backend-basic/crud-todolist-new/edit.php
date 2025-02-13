<?php

require_once "connection.php";

$connect = connection();

$id = $_GET["id"];

$statement = $connect->prepare("SELECT * FROM pegawai WHERE id = ?");
$statement->execute([$id]);

$person = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <form action="add.php" method="post">
        <div>
            <label for="nama">Nama</label> <br>
            <input type="text" name="nama" id="nama" value="<?= $person["nama"] ?>">
        </div>
        <div>
            <label for="kelamin">Jenis kelamin</label> <br>
            <select name="jenis_kelamin" id="kelamin">
                <option value="pria" <?= $person["jenis_kelamin"] == "pria" ? "selected" : "" ?>>Pria</option>
                <option value="wanita" <?= $person["jenis_kelamin"] == "wanita" ? "selected" : "" ?>>Wanita</option>
            </select>
        </div>
        <div>
            <label for="alamat">Alamat</label> <br>
            <input type="text" name="alamat" id="alamat" value="<?= $person["alamat"] ?>">
        </div>
        <div>
            <label for="tempat_lahir">Tempat lahir</label> <br>
            <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $person["tempat_lahir"] ?>">
        </div>
        <div>
            <label for="tanggal_lahir">Tanggal lahir</label> <br>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $person["tanggal_lahir"] ?>">
        </div>
        <div>
            <label for="nomor_seluler">Nomor seluler</label> <br>
            <input type="text" name="nomor_seluler" id="nomor_seluler" value="<?= $person["nomor_seluler"] ?>">
        </div>
        <div>
            <label for="status_perkawinan">Status perkawinan</label> <br>
            <select name="status_perkawinan" id="status_perkawinan">
                <option value="belum kawin" <?= $person["status_perkawinan"] == "belum kawin" ? "selected" : ""  ?>>Belum kawin</option>
                <option value="kawin" <?= $person["status_perkawinan"] == "kawin" ? "selected" : ""  ?>>kawin</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>