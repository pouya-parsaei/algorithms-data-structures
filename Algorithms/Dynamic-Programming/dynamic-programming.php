<?php

function fibonacci($n) //O(2^n)
{
    if ($n <= 1) {
        return $n;
    }

    return (fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2));
}

function fibonacciBottomUpApproach($n) //O(n)
{
    $calculations = 0;
    //creating array which contains Fibonacci terms
    //int f[n+1];
    $f = [];
    $f[0] = 0;
    $f[1] = 1;
    for ($i = 2; $i <= $n; $i++) {
        $calculations++;
        $f[$i] = $f[$i - 1] + $f[$i - 2];
    }
    return $f[$n];
}

print_r(fibonacciBottomUpApproach(150));