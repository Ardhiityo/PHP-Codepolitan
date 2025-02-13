<?php
$siswa = [
    [
        "nama" => "Rizky",
        "kelas" => "10",
        "jurusan" => "RPL"
    ],
    [
        "nama" => "Rizal",
        "kelas" => "10",
        "jurusan" => "RPL"
    ],
    [
        "nama" => "Ridho",
        "kelas" => "10",
        "jurusan" => "RPL"
    ],
    [
        "nama" => "Rendi",
        "kelas" => "10",
        "jurusan" => "RPL"
    ],
    [
        "nama" => "Rina",
        "kelas" => "10",
        "jurusan" => "RPL"
    ],
    [
        "nama" => "Reni",
        "kelas" => "10",
        "jurusan" => "RPL"
    ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">

        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
        </thead>

        <tbody>

            <!-- Foreach cara 1 -->
            <?php foreach ($siswa as $key => $value) { ?>

                <tr>
                    <td><?php echo $value["nama"] ?></td>
                    <td><?php echo $value["kelas"] ?></td>
                    <td><?php echo $value["jurusan"] ?></td>
                </tr>

            <?php } ?>

            <!-- Foreach cara 2 -->
            <?php foreach ($siswa as $key => $value) : ?>

                <tr>
                    <td><?php echo $value["nama"] ?></td>
                    <td><?php echo $value["kelas"] ?></td>
                    <td><?php echo $value["jurusan"] ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
</body>

</html>