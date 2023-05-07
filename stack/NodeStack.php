<?php

declare(strict_types=1);

namespace stack;

use node\DoubleConnectedNode;

include_once __DIR__ . '/StackInterface.php';
include_once __DIR__ . '/../node/DoubleConnectedNode.php';

class NodeStack implements StackInterface
{
    private ?int $maxSize;

    private ?int $currentSize = 0;

    private ?DoubleConnectedNode $currentNode = null;

    public function __construct($maxSize = null)
    {
        $this->maxSize = $maxSize;
    }

    public function push(mixed $value)
    {
        if ($this->isFull()) {
            throw new \RuntimeException('stack is full');
        }

        $nextNode = new DoubleConnectedNode($value, $this->currentNode);
        if (!$this->isEmpty()) {
            $this->currentNode->next = $nextNode;
        }

        $this->currentNode = $nextNode;
        $this->currentSize++;
    }

    public function pop(): void
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('stack is empty');
        }

        $this->currentNode = $this->currentNode->prev;
        $this->currentSize--;
    }

    public function top(): mixed
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('stack is empty');
        }
        return $this->currentNode->value;
    }

    public function isEmpty(): bool
    {
        return $this->currentSize === 0;
    }

    public function isFull(): bool
    {
        if (null === $this->maxSize) {
            return false;
        }
        return $this->currentSize === $this->maxSize;
    }

    public function getSize(): int
    {
        return $this->currentSize;
    }
}
