<?php

require_once "connection.php";

$connect = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nomor_seluler = $_POST["nomor_seluler"];
    $status_perkawinan = $_POST["status_perkawinan"];

    try {
        $statement = $connect->prepare(
            "INSERT INTO pegawai 
        (nama, 
        jenis_kelamin, 
        alamat, 
        tempat_lahir, 
        tanggal_lahir, 
        nomor_seluler, 
        status_perkawinan) 
        
        VALUES 
        
        (?, ?, ?, ?, ?, ?, ?)"
        );

        $statement->execute([
            $nama,
            $jenis_kelamin,
            $alamat,
            $tempat_lahir,
            $tanggal_lahir,
            $nomor_seluler,
            $status_perkawinan
        ]);
        header("location: /index.php");
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <form action="add.php" method="post">
        <div>
            <label for="nama">Nama</label> <br>
            <input type="text" name="nama" id="nama">
        </div>
        <div>
            <label for="kelamin">Jenis kelamin</label> <br>
            <select name="jenis_kelamin" id="kelamin">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
        </div>
        <div>
            <label for="alamat">Alamat</label> <br>
            <input type="text" name="alamat" id="alamat">
        </div>
        <div>
            <label for="tempat_lahir">Tempat lahir</label> <br>
            <input type="text" name="tempat_lahir" id="tempat_lahir">
        </div>
        <div>
            <label for="tanggal_lahir">Tanggal lahir</label> <br>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        <div>
            <label for="nomor_seluler">Nomor seluler</label> <br>
            <input type="text" name="nomor_seluler" id="nomor_seluler">
        </div>
        <div>
            <label for="status_perkawinan">Status perkawinan</label> <br>
            <select name="status_perkawinan" id="status_perkawinan">
                <option value="belum kawin">Belum kawin</option>
                <option value="kawin">kawin</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>