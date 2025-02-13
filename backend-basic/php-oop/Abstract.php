<?php

abstract class Database
{
    // Abstract wajib di override
    abstract public function connect();

    public function disconnect() {}
}

class Model extends Database
{
    public function connect()
    {
        echo "Connected";
    }
}

// Abstract class tidak bisa diinstansiasi
// $database = new Database();

(new Model())->connect();
