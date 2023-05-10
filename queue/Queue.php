<?php

declare(strict_types=1);

namespace queue;

include_once __DIR__ . '/QueueInterface.php';

class Queue implements QueueInterface
{
    private ?int $maxSize;
    private array $queue = [];

    public function __construct(?int $maxSize = null)
    {
        $this->maxSize = $maxSize;
    }

    public function push(mixed $value): void
    {
        if ($this->isFull()) {
            throw new \RuntimeException('queue is full');
        }

        $this->queue[] = $value;
    }

    public function remove(): void
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('queue is empty');
        }

        array_shift($this->queue);
    }

    public function element(): mixed
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('queue is empty');
        }
        return $this->queue[0];
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
        return $this->getSize() >= $this->maxSize;
    }

    public function getSize(): int
    {
        return sizeof($this->queue);
    }
}
