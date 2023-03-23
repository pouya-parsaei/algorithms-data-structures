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

//function fibonacciMaster()
//{ //O(n)
//    let cache = {
//};
//  return function fib(n) {
//      calculations++;
//      if (n in cache) {
//          return cache[n];
//      } else {
//          if (n < 2) {
//              return n;
//          } else {
//              cache[n] = fib(n - 1) + fib(n - 2);
//              return cache[n];
//          }
//      }
//  }
//}