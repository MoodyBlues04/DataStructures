<?php

declare(strict_types=1);

namespace queue;

interface QueueInterface
{
    public function __construct(int $maxSize);

    public function push(mixed $value);

    public function remove(): void;

    public function element(): mixed;
}
