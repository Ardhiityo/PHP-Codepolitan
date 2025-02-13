<?php

// Interface hanya bisa menggunakan method abstract, properties tidak bisa

interface TableInterface
{
    public function save(array $data);
}

interface LogInterface
{
    public function log(string $message);
}

class Table implements TableInterface, LogInterface
{
    public function save(array $data)
    {
        return "Save method from table Class" . PHP_EOL;
    }

    public function log($message)
    {
        return $message;
    }
}

echo (new Table)->save([]);
echo (new Table)->log("Message");
