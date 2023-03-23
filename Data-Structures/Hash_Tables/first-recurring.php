<?php

function findFirstRecurring(array $array)
{
    for ($i = 0, $iMax = count($array); $i < $iMax; $i++) {
        for ($j = $i + 1, $jMax = count($array); $j < $jMax; $j++) {
            if ($array[$i] === $array[$j]) {
                return $array[$i];
            }
        }
    }
    return null;
}//time complexity: O(n^2), space complexity: O(1)

function findFirstRecurring2(array $array)
{
    $tempArray = [];

    foreach ($array as $value) {
        if (isset($tempArray[$value])) {
            return $value;
        } else {
            $tempArray[$value] = 1;
        }
    }
}

function findFirstRecurringWithHashTables(array $array)
{
    $object = new stdClass();

    for ($i = 0, $iMax = count($array); $i < $iMax; $i++) {
        if (property_exists($object, $array[$i])) {
            return $array[$i];
        } else {
            $object->{$array[$i]} = $i;
        }
    }

    return null;
}


print_r(findFirstRecurring2([1, 2, 5, 5, 6, 3, 2, 6, 5]));

