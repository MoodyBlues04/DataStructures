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
}
