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
        <?php foreach ($todos as $key => $value) : ?>
            <li>
                <input type="checkbox" name="todo" <?php echo $value["status"] == 1 ? "checked" : "" ?>>
                <label><?php echo $value["todo"] ?></label>
                <a href="#">hapus</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>