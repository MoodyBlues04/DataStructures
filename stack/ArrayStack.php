<?php

declare(strict_types=1);

namespace stack;

include_once __DIR__ . '/StackInterface.php';

class ArrayStack implements \stack\StackInterface
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
            throw new \RuntimeException('stack is full');
        }
        $this->stack[] = $value;
    }

    public function pop(): void
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('stack is empty');
        }
        array_pop($this->stack);
    }

    public function top(): mixed
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('stack is empty');
        }
        return end($this->stack);
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
