<?php

// Trarit  bisa menggunakan method abstract, properties pun bisa

trait Log
{
    public string $name = "Eko";

    public function log($message)
    {
        echo $message;
    }
}

class Table
{
    use Log;

    public function save()
    {
        return $this->log('Save');
    }
}

echo (new Table)->name . PHP_EOL;
echo (new Table)->save();
