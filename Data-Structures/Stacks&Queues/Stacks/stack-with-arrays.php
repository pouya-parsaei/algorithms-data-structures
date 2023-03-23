<?php

class Stack
{
    private $array;

    public function __construct()
    {
        $this->array = [];
    }

    public function peek()
    {
        return $this->array[count($this->array) - 1];
    }

    public function push($value)
    {
        return array_push($this->array, $value);
    }

    public function pop()
    {
        return array_pop($this->array);
    }

    public function isEmpty()
    {
        return empty($this->array);
    }
}

$myStack = new Stack();
$myStack->push(5);
$myStack->push(10);
$myStack->push(15);
$myStack->pop();
$myStack->pop();
$myStack->pop();
return print_r($myStack->peek());
