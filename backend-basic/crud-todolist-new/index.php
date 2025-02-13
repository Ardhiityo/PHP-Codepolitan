<?php

require_once "connection.php";
$connect = connection();

try {
    $statement = $connect->prepare("SELECT * FROM pegawai");
    $statement->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $statement = $connect->prepare("DELETE FROM pegawai WHERE id = ?");
    $statement->execute([$id]);
    header("location: /index.php");
}

$connect = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>

<body>

    <a href="add.php">Tambah Data</a>

    <form action="search.php" method="get">
        <label for="key">Cari data</label> <br>
        <input type="text" name="key" id="">
        <button>Submit</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statement as $key => $row) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                        <a href="detail.php?id=<?= $row["id"] ?>">
                            <?= $row["nama"] ?>
                        </a>
                    </td>
                    <td><?= $row["alamat"] ?></td>
                    <td><?= $row["jenis_kelamin"] ?></td>
                    <td><a href="edit.php?id=<?= $row["id"] ?>">Edit</a></td>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>