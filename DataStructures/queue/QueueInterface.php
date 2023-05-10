<?php

declare(strict_types=1);

namespace DataStructures\queue;

// TODO create getIterator for each type of struct (and methods like swap etc on it)
interface QueueInterface
{
    public function __construct(int $maxSize);

    public function push(mixed $value): void;

    public function remove(): void;

    public function element(): mixed;

    public function isEmpty(): bool;

    public function isFull(): bool;

    public function getSize(): int;
}
