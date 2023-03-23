<?php

$numbers = [6, 3, 7, 9, 5, 78, 65, 345, 200];

function bubbleSort(array $array): array
{
    $iMax = count($array);

    for ($i = 0; $i < $iMax - 1; $i++) {
        for ($j = 0; $j < $iMax - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

print_r(bubbleSort($numbers));