<?php

use App\Connection;

require_once __DIR__ . "/Connection.php";

$connection = new Connection();
$get_connection = $connection->get();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        $id = $_GET["id"];
        $statement =
            $get_connection
            ->prepare("
        SELECT * FROM karyawan WHERE id = ?");
        $statement->execute([
            $id
        ]);

        $user = $statement->fetch();
        $nama = $user["nama"];
        $umur = $user["umur"];
        $alamat = $user["alamat"];
        $jenis_kelamin = $user["jenis_kelamin"];
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    } finally {
        $get_connection = null;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $umur = intval($_POST["umur"]);
    $alamat = trim($_POST["alamat"]);
    $jenis_kelamin = $_POST["jenis_kelamin"];

    try {
        $statement = $get_connection
            ->prepare("
        UPDATE karyawan SET nama = ?, umur = ?, alamat = ?, jenis_kelamin = ? WHERE id = ?
        ");
        $statement->execute([
            $nama,
            $umur,
            $alamat,
            $jenis_kelamin,
            $id
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
    <title>Edit Data</title>
</head>

<body>

    <form action="edit-data.php" method="post">

        <input type="hidden" name="id" value="<?= $id ?>">

        <div>
            <label for="nama">Nama</label>
            <br>
            <input type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <br>
            <textarea name="alamat" id="alamat" rows="10" cols="20"><?= $alamat ?></textarea>
        </div>
        <div>
            <label for="umur">Umur</label>
            <br>
            <input type="number" name="umur" id="umur" value="<?= $umur ?>">
        </div>
        <div>
            <label for="kelamin">Jenis Kelamin</label>
            <br>
            <select name="jenis_kelamin" id="kelamin">
                <option value="pria"
                    <?= $jenis_kelamin == "pria" ? "selected" : "" ?>>Pria</option>
                <option value="wanita"
                    <?= $jenis_kelamin == "wanita" ? "selected" : "" ?>>Wanita</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>

</body>

</html>