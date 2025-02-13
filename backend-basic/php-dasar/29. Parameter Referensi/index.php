<?php

// Tanda & akan membuat nilai yang ada di parameter akan merubah nilai ke yang memberi parameter pada variabel tersebut
function referensi(&$nilai)
{
    // 5 = 5 + 10 hasillnya adalah 15
    $nilai =  $nilai + 10;
}

$x = 5;

referensi($x);

// Ini akan ter-referensi oleh nilai yg telah dikirim ke parameter, dan nilainya bukan lagi 5, tetapi 10
echo $x;
