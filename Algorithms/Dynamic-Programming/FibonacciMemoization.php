<?php

class FibonacciMemoization
{
    private $memo = [];

    public function fib(int $n)
    {
        if ($n <= 1) {
            return $n;
        }

        if (isset($this->memo[$n])) {
            return $this->memo[$n];
        }

        $result = $this->fib($n - 1) + $this->fib($n - 2);
        $this->memo[$n] = $result;
        return $result;
    }
}

$fibber = new FibonacciMemoization();
print_r($fibber->fib(10));