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

class LinkedList
{
    private $head;
    private $tail;
    private $length;

    public function __construct($value)
    {
        $this->head = new stdClass();

        $this->head->value = $value;
        $this->head->next = null;

        $this->tail = $this->head;

        $this->length = 1;
    }

    public function append($value)
    {
        $newNode = new Node($value);

        $this->tail->next = $newNode;
        $this->tail = $newNode;

        $this->length++;

        return $this;
    }

    public function prepend($value)
    {
        $newNode = new Node($value);

        $newNode->next = $this->head;

        $this->head = $newNode;

        $this->length++;

        return $this;
    }

    public function insert($index, $value)
    {
        $leader = $this->traverseToIndex($index - 1);
        $holdingPointer = $leader->next;

        $newNode = new Node($value);
        $leader->next = $newNode;
        $newNode->next = $holdingPointer;
        $this->length++;

        return $this->printList();
    }

    public function remove($index)
    {
        $leader = $this->traverseToIndex($index - 1);
        $unwantedNode = $leader->next;
        $leader->next = $unwantedNode->next;

        $this->length--;

        return $this->printList();
    }

    private function traverseToIndex($index)
    {
        $counter = 0;
        $currentNode = $this->head;

        while ($counter !== $index) {
            $currentNode = $currentNode->next;
            $counter++;
        }

        return $currentNode;
    }

    public function printList()
    {
        $array = [];
        $currentNode = $this->head;

        while ($currentNode !== null) {
            $array[] = $currentNode->value;
            $currentNode = $currentNode->next;
        }

        return $array;
    }
}

$linkedList = new LinkedList(10);

$linkedList->append(5);
$linkedList->append(16);
$linkedList->prepend(1);
$linkedList->prepend(2);
$linkedList->insert(2, 99);
$linkedList->remove(3);
//print_r((array)$linkedList);
print_r($linkedList);
