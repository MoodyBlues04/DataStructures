<?php

namespace stack;

use stack\StackInterface;

include_once __DIR__ . '/StackInterface.php';

class ArrayStack implements StackInterface
{
    /**
     * @var ?int $maxSize unlimit on null
     */
    private ?int $maxSize;

    private array $stack = [];

    public function __construct(int $maxSize = null)
    {
        $this->maxSize = $maxSize;
    }

    public function push(mixed $value): void
    {
        if ($this->isFull()) {
            return;
        }
        $this->stack[] = $value;
    }

    public function pop(): void
    {
        if ($this->isEmpty()) {
            return;
        }
        array_pop($this->stack);
    }

    public function top(): mixed
    {
        return $this->isEmpty() ? null : end($this->stack);
    }

    public function isEmpty(): bool
    {
        return sizeof($this->stack) === 0;
    }

    public function isFull(): bool
    {
        if ($this->maxSize === null) {
            return false;
        }
        return sizeof($this->stack) === $this->maxSize;
    }
}
