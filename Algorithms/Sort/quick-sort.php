<?php

function quickSort($my_array)
{
    $loe = $gt = [];
    if (count($my_array) < 2) {
        return $my_array;
    }
    $pivot_key = key($my_array);
    $pivot = array_shift($my_array);
    foreach ($my_array as $val) {
        if ($val <= $pivot) {
            $loe[] = $val;
        } elseif ($val > $pivot) {
            $gt[] = $val;
        }
    }
    return array_merge(quickSort($loe), array($pivot_key => $pivot), quickSort($gt));
}

$my_array = [3, 0, 2, 5, -1, 4, 1];
echo 'Original Array : ' . implode(',', $my_array) . '\n';
$my_array = quickSort($my_array);
echo 'Sorted Array : ' . implode(',', $my_array);
