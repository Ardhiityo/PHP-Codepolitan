<?php

use App\Connection;

require_once __DIR__ . "/Connection.php";

$connection = new Connection();

$get_connection = $connection->get();

$statement = $get_connection->prepare("SELECT * FROM karyawan");
$statement->execute();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id = $_POST["id"];
        $statement = $get_connection->prepare("DELETE FROM karyawan WHERE id = ?");
        $statement->execute([$id]);
        header("Location: /list.php");
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}


$get_connection = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="/add-data.php">Tambah Data</a>

    <form action="search.php" method="get">
        <input type="text" name="search">
        <button type="submit">Submit</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statement as $row) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["umur"] ?></td>
                    <td><?= $row["alamat"] ?></td>
                    <td><?= $row["jenis_kelamin"] ?></td>
                    <td>
                        <a href="/edit-data.php?id=<?= $row["id"] ?>">Edit</a>
                    </td>
                    <td>
                        <form action="list.php" method="post">
                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>