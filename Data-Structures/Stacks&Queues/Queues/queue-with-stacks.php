<?php

class MyQueue {
    protected $queue;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->queue = array();
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        return array_push($this->queue, $x);
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop() {
        return array_shift($this->queue);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek() {
        return reset($this->queue);
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty() {
        return empty($this->queue);
    }
}

$myQueue = new MyQueue();

$myQueue->push(10);
$myQueue->push(15);
$myQueue->pop();
$myQueue->push(20);
print_r($myQueue->peek());
