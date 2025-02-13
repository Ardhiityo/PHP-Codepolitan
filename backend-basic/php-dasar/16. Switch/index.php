<?php

$nilai = 70;

switch ($nilai) {
    case ($nilai >= 80):
        echo "Nilai Anda A";
        break;
    case ($nilai >= 70):
        echo "Nilai Anda B";
        break;
    case ($nilai >= 60):
        echo "Nilai Anda C";
        break;
    case ($nilai >= 50):
        echo "Nilai Anda D";
        break;
    default:
        echo "Nilai Anda E";
        break;
}
