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
    private $first;
    private $last;

    public $length;

    public function __construct()
    {
        $this->length = 0;
    }

    public function peek()
    {
        return $this->first;
    }

    public function enqueue($value)
    {
        $newNode = new Node($value);

        if ($this->isEmpty()) {
            $this->first = $newNode;
            $this->last = $newNode;
            $this->length++;

            return $this;
        }

        $this->last->next = $newNode;
        $this->last = $newNode;

        $this->length++;
        return $this;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }

        if ($this->first === $this->last) {
            $this->last = null;
        }

        $holdingPointer = $this->first;
        $this->first = $this->first->next;
        $this->length--;

        return $holdingPointer;
    }

    public function isEmpty()
    {
        return !$this->length;
    }
}

$myStack = new Stack();
$myStack->enqueue('Pouya');
$myStack->enqueue('Kian');
$myStack->enqueue('Parsa');
$myStack->enqueue('Ali');
$myStack->dequeue();
$myStack->dequeue();
$myStack->dequeue();
return print_r($myStack);

//$myStack->push(10);
//$myStack->push(15);
//$myStack->pop();
//$myStack->pop();
//$myStack->pop();
