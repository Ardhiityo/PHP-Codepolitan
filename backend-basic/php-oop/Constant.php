<?php

class Time
{
    public const DAY = 60 * 60 * 24;

    public function tommorrow()
    {
        return time() + self::DAY;
    }
}

$time = new Time;

// Dalam pemanggilan const tidak perlu menggunakan instance
echo Time::DAY . "</br>";

echo $time->tommorrow() . "</br>";
