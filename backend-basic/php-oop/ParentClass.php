<?php

class Programmer
{
    public static function makeSystem()
    {
        return "Start Coding";
    }
}

class AmateurProgrammer extends Programmer
{
    public static function makeSystem()
    {
        echo "Read Documentation" . "</br>";
        echo parent::makeSystem() . "</br>";
        echo "Clean Up Mess." . "</br>";
    }
}


echo Programmer::makeSystem() . "</br>";
AmateurProgrammer::makeSystem();


class Image
{
    public static $resizeStatus = true;

    public static function geometry()
    {
        echo "760 x 300";
    }
}

class PhotoProfile extends Image
{
    static function geometry()
    {
        if (self::$resizeStatus) {
            echo "Resize to 50 x 50";
        } else {
            parent::geometry();
        }
    }
}

// Image::geometry() . "</br>";
// PhotoProfile::geometry() . "</br>";

Image::$resizeStatus = false;
PhotoProfile::geometry() . "</br>";
