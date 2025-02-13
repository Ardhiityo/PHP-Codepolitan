<?php

$todos = [];

if (file_exists("todos.txt")) {
    $file = file_get_contents('todos.txt');
    $todos = unserialize($file);
}

echo var_dump($todos);

if (isset($_POST['todo'])) {
    $todo = $_POST['todo'];
    $todos[] = [
        'todo' => $todo,
        'status' => 0
    ];
    saveData($todos);
}

if (isset($_GET["status"])) {
    $todos[$_GET["key"]]["status"] = $_GET["status"];
    saveData($todos);
}

if (isset($_GET["key"])) {
    unset($todos[$_GET["key"]]);
    saveData($todos);
}

function saveData($todos)
{
    file_put_contents('todos.txt', serialize($todos));
    header("location: index.php");
};

echo "<br>";
echo "<br>";
echo "<br>";

print_r($todos);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Todo App</h1>
    <p>Apa Kegiatanmu hari ini?</p>

    <form method="POST">
        <input type="text" name="todo">
        <button type="submit">Add Todo</button>
    </form>

    <ul>
        <?php foreach ($todos as $key => $value) : ?>
            <li>

                <input type="checkbox" id="todo" onclick="window.location.href='index.php?status= <?php echo $value['status'] == 1 ? 0 : 1 ?> &key=<?php echo $key; ?>'" <?php if ($value["status"] == 1) echo "checked"; ?>>

                <label for="todo">

                    <?php
                    if ($value["status"] == 1)
                        echo "<del> " . $value["todo"] . "</del>";
                    else
                        echo $value["todo"];
                    ?>
                </label>

                <a href="index.php?key=<?php echo $key ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus ini?')">hapus</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>