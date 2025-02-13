<?php

// phpinfo();
$before = 'toni haryanto';

// Fungsi untuk menjadi Upper Case
$after = ucwords($before);
$afterUpperCase = strtoupper($after);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengenal Fungsi</title>
</head>

<body>
    <h1>Before : <?php echo $before; ?></h1>
    <h1>After : <?php echo $after; ?></h1>
    <h1>After Uppercase : <?php echo $afterUpperCase; ?></h1>
</body>

</html>