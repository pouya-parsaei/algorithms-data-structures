<?php

class Node
{
    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    public function __construct()
    {
        $this->root = null;
    }

    public function insert($value)
    {
        $newNode = new Node($value);

        if (is_null($this->root)) {
            return $this->root = $newNode;
        }

        $currentNode = $this->root;

        while (true) {
            if ($value > $currentNode?->value) {
                if (!$currentNode?->right) {
                    $currentNode->right = $newNode;
                    return $this;
                }
                $currentNode = $currentNode->right;
            }

            if ($value < $currentNode?->value) {
                if (!$currentNode?->left) {
                    $currentNode->left = $newNode;
                    return $this;
                }
                $currentNode = $currentNode->left;
            }

        }
    }

    public function lookup($value)
    {
        if (!$this->root) {
            return false;
        }

        $currentNode = $this->root;

        if ($value === $currentNode->value) {
            return $currentNode;
        }

        while ($currentNode) {
            if ($value > $currentNode->value) {
                if ($value === $currentNode->right->value) {
                    return $currentNode->right;
                }

                $currentNode = $currentNode->right;
            }

            if ($value < $currentNode->value) {
                if ($value === $currentNode->left->value) {
                    return $currentNode->left;
                }

                $currentNode = $currentNode->left;
            }
        }

        return false;
    }

    public function lookup2($value)
    {
        if (!$this->root) {
            return false;
        }

        $currentNode = $this->root;

        while ($currentNode) {
            if ($value < $currentNode->value) {
                $currentNode = $currentNode->left;
            } else if ($value > $currentNode->value) {
                $currentNode = $currentNode->right;
            } else if ($value === $currentNode->value) {
                return $currentNode;
            }
        }

        return false;
    }

    public function remove($value)
    {
        if (!$this->root) {
            return false;
        }

        $currentNode = $this->root;
        $parentNode = null;

        while ($currentNode) {
            if ($value < $currentNode->value) {
                $parentNode = $currentNode;
                $currentNode = $currentNode->left;
            } else if ($value > $currentNode->value) {
                $parentNode = $currentNode;
                $currentNode = $currentNode->right;
            } else if ($currentNode->value === $value) {
                //We have a match, get to work!

                //Option 1: No right child:
                if ($currentNode->right === null) {
                    if ($parentNode === null) {
                        $this->root = $currentNode->left;
                    } else {

                        // If parent > current value, make current left child a child of parent
                        if ($currentNode->value < $parentNode->value) {
                            $parentNode->left = $currentNode->left;

                            // If parent  < current value, make left child a right child of parent
                        } else if ($currentNode->value > $parentNode->value) {
                            $parentNode->right = $currentNode->left;
                        }
                    }

                    //Option 2: Right child which doesn't have a left child:
                } else if ($currentNode->right->left === null) {
                    $currentNode->right->left = $currentNode->left;

                    if ($parentNode === null) {
                        $this->root = $currentNode->left;
                    } else {

                        // if parent > current, make right child a left child of the parent
                        if ($currentNode->value < $parentNode->value) {
                            $parentNode->left = $currentNode->right;

                            // if parent < current, make right child a right child of the parent
                        } else if ($currentNode->value > $parentNode->value) {
                            $parentNode->right = $currentNode->right;
                        }
                    }

                    //Option 3: Right child that has a left child
                } else {
                    // find the right child's left most child
                    $leftMost = $currentNode->right->left;
                    $leftMostParent = $currentNode->right;

                    while ($leftMost->left !== null) {
                        $leftMostParent = $leftMost;
                        $leftMost = $leftMost->left;
                    }

                    //Parent's left subtree is now leftmost's right subtree
                    $leftMostParent->left = $leftMost->right;
                    $leftMost->left = $currentNode->left;
                    $leftMost->right = $currentNode->right;

                    if ($parentNode === null) {
                        $this->root = $leftMost;
                    } else {
                        if ($currentNode->value < $parentNode->value) {
                            $parentNode->left = $leftMost;
                        } else if ($currentNode->value > $parentNode->value) {
                            $parentNode->right = $leftMost;
                        }
                    }
                }
                return true;
            }
        }
    }

    public function breadthFirstSearch()
    {
        $currentNode = $this->root;
        $list = [];
        $queue = [];
        $queue[] = $currentNode;

        while (count($queue) > 0) {
            $currentNode = array_shift($queue);
            $list[] = $currentNode->value;
            if ($currentNode->left) {
                $queue[] = $currentNode->left;
            }
            if ($currentNode->right) {
                $queue[] = $currentNode->right;
            }
        }

        return $list;
    }

    public function breadthFirstSearchRecursive(array $queue, array $list)
    {
        if (!count($queue)) {
            return $list;
        }

        $currentNode = array_shift($queue);
        $list[] = $currentNode->value;

        if ($currentNode->left) {
            $queue[] = $currentNode->left;
        }
        if ($currentNode->right) {
            $queue[] = $currentNode->right;
        }

        return $this->breadthFirstSearchRecursive($queue, $list);
    }
}

$tree = new BinarySearchTree();
$tree->insert(9);
$tree->insert(4);
$tree->insert(6);
$tree->insert(20);
$tree->insert(170);
$tree->insert(15);
$tree->insert(1);
//return print_r($tree->lookup2(20));
//$tree->remove(20);
//return print_r(json_encode(traverse($tree->root)));
//print_r($tree->breadthFirstSearch());
print_r($tree->breadthFirstSearchRecursive([$tree->root], []));

function traverse($node)
{
    $tree = new stdClass();
    $tree->value = $node->value;
    $tree->left = $node->left === null ?: traverse($node->left);

    $tree->right = $node->right === null ?: traverse($node->right);

    return $tree;
}