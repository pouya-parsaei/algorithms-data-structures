<?php

class Node
{
    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class Stack
{
    private $top;
    private $bottom;

    public $length;

    public function __construct()
    {
        $this->top = null;
        $this->bottom = null;
        $this->length = 0;
    }

    public function peek()
    {
        return $this->top;
    }

    public function push($value)
    {
        $newNode = new Node($value);

        if (!$this->length) {
            $this->top = $newNode;
            $this->bottom = $newNode;
            $this->length++;

            return $this;
        }

        $holdingPointer = $this->top;
        $this->top = $newNode;
        $this->top->next = $holdingPointer;

        $this->length++;

        return $this;
    }

    public function pop()
    {
        if (!$this->top) {
            return null;
        }

        if ($this->top === $this->bottom) {
            $this->bottom = null;
        }

        $this->top = $this->top->next;

        $this->length--;

        return $this;
    }

    public function isEmpty()
    {
        return (bool)$this->length;
    }
}

$myStack = new Stack();
$myStack->push(5);
$myStack->push(10);
$myStack->push(15);
$myStack->pop();
$myStack->pop();
$myStack->pop();
print_r($myStack);
