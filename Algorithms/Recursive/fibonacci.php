<?php

function fibonacciIterative($n)
{
    $n1 = 1; // first number
    $n2 = 0; // second number
    for ($i = 0; $i <= $n; $i++) {
//        echo " $n2,";
        $result = $n2;
        $temp = $n1 + $n2; // temporary variable
        $n1 = $n2;   // $n2 value shifted to $n1
        $n2 = $temp; // temporary value ( sum ) is shifted.
    }
    return $result;

//    return $n2;
}

//print_r(fibonacciIterative(8));

function fibonacciIterative2($n)
{
    $array = [0, 1];

    for ($i = 2; $i <= $n; $i++) {
        $array[] = $array[$i - 2] + $array[$i - 1];
    }

    return $array[$n];
}

//print_r(fibonacciIterative2(50));


function fibonacciRecursive($n)
{
    if ($n <= 1) {
        return $n;
    }

    return (fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2));
}

print_r(fibonacciRecursive(4));



