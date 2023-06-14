<?php

declare(strict_types=1);

namespace src\DataStructures\stack;

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
        return $this->getSize() === 0;
    }

    public function isFull(): bool
    {
        if ($this->maxSize === null) {
            return false;
        }
        return $this->getSize() === $this->maxSize;
    }

    public function getSize(): int
    {
        return sizeof($this->stack);
    }
}