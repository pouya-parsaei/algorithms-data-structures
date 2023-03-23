<?php

function reverse(string $string): string
{
    $backwards = [];
    $totalItems = strlen($string) - 1;

    for ($i = $totalItems; $i >= 0; $i--) {
        $backwards[] = $string[$i];
    }

    return implode($backwards);
}

$result = reverse('Hello Pouya!');

print_r($result);