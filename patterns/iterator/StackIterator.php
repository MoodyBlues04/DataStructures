<?php

declare(strict_types=1);

namespace patterns\iterator;

use DataStructures\stack\StackInterface;
use Iterator;

include_once __DIR__ . '/../../DataStructures/stack/StackInterface.php';

class StackIterator implements Iterator
{
    private StackInterface $stack;

    private StackInterface $originalStack;

    private int $iteratedElements = 0;

    public function __construct(StackInterface $stack)
    {
        $this->originalStack = $stack;
    }

    public function rewind(): void
    {
        $this->iteratedElements = 0;
        $this->stack = clone $this->originalStack;
    }

    public function current(): mixed
    {
        return $this->stack->top();
    }

    public function key(): int
    {
        return $this->iteratedElements;
    }

    public function next(): void
    {
        $this->iteratedElements++;
        $this->stack->pop();
    }

    public function valid(): bool
    {
        return !$this->stack->isEmpty();
    }
}
