<?php

namespace App;

include '../Models/Models.php';

use Models\{Table as Tables};

class Table
{
    public static function get()
    {
        echo 'App.table.get() </br>';
    }
}

Table::get();
Tables::get();
