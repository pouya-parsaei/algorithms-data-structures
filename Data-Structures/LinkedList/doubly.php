<?php

class Node
{
    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
        $this->prev = null;
    }
}

class DoublyLinkedList
{
    private $head;
    private $tail;
    private $length;

    public function __construct($value)
    {
        $this->head = new stdClass();

        $this->head->value = $value;
        $this->head->next = null;
        $this->head->prev = null;

        $this->tail = $this->head;

        $this->length = 1;
    }

    public function append($value)
    {
        $newNode = new Node($value);

        $newNode->prev = $this->tail;
        $this->tail->next = $newNode;
        $this->tail = $newNode;

        $this->length++;

        return $this;
    }

    public function prepend($value)
    {
        $newNode = new Node($value);

        $newNode->next = $this->head;
        $this->head->prev = $newNode;
        $this->head = $newNode;

        $this->length++;

        return $this;
    }

    public function insert($index, $value)
    {
        if ($index >= $this->length) {
            return $this->append($value);
        }

        $leader = $this->traverseToIndex($index - 1);
        $follower = $leader->next;

        $newNode = new Node($value);
        $leader->next = $newNode;
        $newNode->prev = $leader;
        $newNode->next = $follower;
        $follower->prev = $newNode;
        $this->length++;

        return $this->printList();
    }

    public function remove($index)
    {
        $leader = $this->traverseToIndex($index - 1);
        $unwantedNode = $leader->next;
        $follower = $unwantedNode->next;

        $follower->prev = $leader;
        $leader->next = $follower;

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

    public function reverse()
    {
        if (!$this->head->next) {
            return $this->head;
        }

        $first = $this->head;
        $this->tail = $this->head;
        $second = $this->tail;
        
        while ($second) {
            $temp = $second->next;
            $second->next = $first;
            $first = $second;
            $second = $temp;
        }

        $this->head->next = null;
        $this->head = $first;
        return $this;
    }
}

$linkedList = new DoublyLinkedList(10);

$linkedList->append(2);
$linkedList->append(1);
$linkedList->prepend(3);
$linkedList->insert(1, 99);
$linkedList->remove(2);
print_r($linkedList->printList());
$linkedList->reverse();
