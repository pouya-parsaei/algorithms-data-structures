<?php

function mergeSort($array)
{

    if (count($array) === 1) {
        return $array;
    }

    // Split array in into right and left
    $length = count($array);
    $middle = round($length / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    return merge(
        mergeSort($left),
        mergeSort($right)
    );
}

function merge($left, $right)
{
    $result = [];
    $leftIndex = 0;
    $rightIndex = 0;

    while ($leftIndex < count($left) && $rightIndex < count($right)) {
        if ($left[$leftIndex] < $right[$rightIndex]) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    return array_merge(array_merge($result, array_slice($left, $leftIndex)), array_slice($right, $rightIndex));
}

$numbers = [5, 6, 2, 4, 834, 46, 7, 6, 0, 43, 78];
print_r(mergeSort($numbers));
