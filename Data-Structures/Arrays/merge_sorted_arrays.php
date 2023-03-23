<?php

function mergeSortedArrays(array $array1, array $array2)
{
    if (count($array1) === 0) {
        return $array2;
    }

    if (count($array2) === 0) {
        return $array1;
    }

    $result = [];

    $array1Item = $array1[0];
    $array2Item = $array2[0];

    $i = 1;
    $j = 1;

    while ($array1Item || $array2Item) {
        if ((is_null($array2Item) || $array1Item < $array2Item) && ($i <= count($array1))) {
            $result[] = $array1Item;
            $array1Item = $array1[$i] ?? null;
            $i++;
        } else {
            $result[] = $array2Item;
            $array2Item = $array2[$j] ?? null;
            $j++;
        }
    }

    return $result;
}

$result = mergeSortedArrays([2,5,7], [1,3]);

print_r($result);