<?php

use App\Connection;

require_once __DIR__ . "/Connection.php";


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = new Connection();
    $get_connection = $connection->get();

    $nama = $_POST["nama"];
    $umur = intval($_POST["umur"]);
    $alamat = trim($_POST["alamat"]);
    $jenis_kelamin = $_POST["jenis_kelamin"];

    try {
        $statement = $get_connection
            ->prepare("
        INSERT INTO karyawan (nama, umur, alamat, jenis_kelamin) VALUES (?, ?, ?, ?)
        ");
        $statement->execute([
            $nama,
            $umur,
            $alamat,
            $jenis_kelamin
        ]);
        header("Location: /list.php");
        exit();
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    } finally {
        $get_connection = null;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
</head>

<body>

    <form action="add-data.php" method="post">

        <div>
            <label for="nama">Nama</label>
            <br>
            <input type="text" name="nama" id="nama">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <br>
            <textarea name="alamat" id="alamat" rows="10" cols="20">
            </textarea>
        </div>
        <div>
            <label for="umur">Umur</label>
            <br>
            <input type="number" name="umur" id="umur">
        </div>
        <div>
            <label for="kelamin">Jenis Kelamin</label>
            <br>
            <select name="jenis_kelamin" id="kelamin">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>

</body>

</html>