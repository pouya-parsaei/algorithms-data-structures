<?php

function inception($counter)
{
    print_r($counter . PHP_EOL);
    if ($counter > 3) {
        return 'done';
    }

    $counter++;

    return inception($counter);
}

print_r(inception(0));

//1. Identify the base case
//2. Identify the recursive case
//3. Get closer and closer and return when needed. Usually you have 2 returns