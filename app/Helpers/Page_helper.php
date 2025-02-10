<?php

function normalisasi($nilai, $total)
{
    return $nilai / sqrt($total);
}

function solusi($alt, $norm, $sol)
{
    $x = 0;
    for ($i = 0; $i < $alt; $i++) {
        $x += pow($norm - $sol, 2);
    }

    return sqrt($x);
}