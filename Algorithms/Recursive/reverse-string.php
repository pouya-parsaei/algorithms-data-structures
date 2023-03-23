<?php
function reverseString($str)
{
    $arrayStr = str_split($str);
    $GLOBALS['reversedArray'] = [];
    //We are using closure here so that we don't add the above variables to the global scope.
    function addToArray($arr)
    {
        if (count($arr) > 0) {
            $GLOBALS['reversedArray'][] = array_pop($arr);
            addToArray($arr);
        }
        return;
    }

    addToArray($arrayStr);

    return implode("", $GLOBALS['reversedArray']);
}

//print_r(reverseString('yoyo master'));

function reverseStringRecursive($str)
{
    if ($str === "") {
        return "";
    } else {
        return reverseStringRecursive(substr($str, 1)) . substr($str, 0, 1);
    }
}

print_r(reverseStringRecursive('yoyo master'));
