<?php

require_once "connection.php";

try {
    $connect = connection();

    $id = $_GET["id"];

    $statement = $connect->prepare("SELECT * FROM pegawai WHERE id = :id");
    $statement->execute(["id" => $id]);

    $row = $statement->fetch();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

$connect = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>

    <a href="index.php">Back</a>

    <br>

    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status Perkawinan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?= $row["nama"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td><?= date("d F Y", strtotime($row["tanggal_lahir"])) ?></td>
                <td><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["status_perkawinan"] ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>