<?php

declare(strict_types=1);

namespace queue;

class Queue
{
    private int $maxSize;
    private array $queue;

    public function __construct($maxSize = null)
    {
        $this->maxSize = $maxSize;
    }
}
