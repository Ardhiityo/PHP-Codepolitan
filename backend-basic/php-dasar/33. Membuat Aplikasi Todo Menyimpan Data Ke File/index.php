<?php

$todos = [];

$file = file_get_contents('todos.txt');
$todos = unserialize($file);

echo var_dump($todos);

if (isset($_POST['todo'])) {
    $todo = $_POST['todo'];
    $todos[] = [
        'todo' => $todo,
        'status' => 0
    ];

    file_put_contents('todos.txt', serialize($todos));
}

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
        <li>
            <input type="checkbox" name="todo">
            <label>Belajar PHP</label>
            <a href="#">hapus</a>
        </li>
        <li>
            <input type="checkbox" name="todo">
            <label>Belajar PHP</label>
            <a href="#">hapus</a>
        </li>
        <li>
            <input type="checkbox" name="todo">
            <label>Belajar PHP</label>
            <a href="#">hapus</a>
        </li>
    </ul>

</body>

</html>