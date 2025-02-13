<?php

namespace App;

use PDO;

class Connection
{

    public function get(): PDO
    {
        $user = "root";
        $password = "";
        $db_name = "latihan_old";
        $dsn = "mysql:dbname=$db_name;host=127.0.0.1";

        $pdo = new PDO($dsn, $user, $password);

        return $pdo;
    }
}
