<?php

function selectionSort($array)
{
    $iMax = count($array);

    for ($i = 0; $i < $iMax; $i++) {
        // Set current index as minimum
        $min = $i;
        $temp = $array[$i];

        for ($j = $i+1; $j < $iMax; $j++) {
            if ($array[$j] < $array[$min]) {
                // update minimum if current is lower than what we had previously
                $min = $j;
            }
        }
        $array[$i] = $array[$min];
        $array[$min] = $temp;
    }

    return $array;
}

print_r(selectionSort([6, 3, 7, 9, 5, 78, 65, 345, 200]));