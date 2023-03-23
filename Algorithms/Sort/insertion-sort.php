<?php

function insertionSort(array $array): array
{
    $iMax = count($array);

    for ($i = 0; $i < $iMax; $i++) {
        if ($array[$i] < $array[0]) {
            // move number to the first position
            array_unshift($array, array_splice($array, $i, 1)[0]);
        } else {
            // find where number should go
            for ($j = 1; $j < $i; $j++) {
                if ($array[$i] > $array[$j - 1] && $array[$i] < $array[$j]) {
                    // move number to the right spot
                    array_splice($array, $j, 0, array_splice($array, $i, 1)[0]);
                }
            }
        }
    }

    return $array;
}

print_r(insertionSort([6, 3, 7, 9, 5, 78, 65, 345, 200]));
