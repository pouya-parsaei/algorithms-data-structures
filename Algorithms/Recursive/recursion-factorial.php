<?php

function findFactorialRecursive($number)
{
    if ($number < 2) {
        return 1;
    }

    return ($number * findFactorialRecursive($number - 1));
}

print_r(findFactorialRecursive(5));

function findFactorialIterative($number)
{
    $factorial = 1;

    for ($i = $number; $i >= 1; $i--) {
        $factorial = $factorial * $i;
    }

    return $factorial;
}

print_r(findFactorialIterative(5));