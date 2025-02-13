<?php

declare(strict_types=1);

function sum(int $a, int $b)
{
    return $a + $b;
}

// Error
// echo sum(1.5, 2.5);

echo sum(1, 2);
