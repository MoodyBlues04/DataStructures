<?php

declare(strict_types=1);

namespace src\patterns\decorator;

use src\DataStructures\stack\StackInterface;
use Iterator;
use src\patterns\iterator\IterableInterface;
use src\patterns\iterator\StackIterator;

class StackIterableDecorator implements IterableInterface
{
    private StackInterface $stack;

    public function __construct(StackInterface $stack)
    {
        $this->stack = $stack;
    }

    public function getIterator(): Iterator
    {
        return new StackIterator($this->stack);
    }
}