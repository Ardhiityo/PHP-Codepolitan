<?php
$nama = 'Toni haryanto';
$html = '
    <h3>Lorem ipsum dolor sit amet.</h3>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mix HTML</title>
</head>

<body>

    <h1>Hello, <?php echo $nama; ?></h1>

    <?php echo $html; ?>

    <?php echo '<h1>From PHP</h1>'; ?>

</body>

</html>