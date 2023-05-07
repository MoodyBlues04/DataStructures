<?php

declare(strict_types=1);

namespace stack;

interface StackInterface
{
    public function __construct(int $maxSize);

    /**
     * @throws \RuntimeException
     */
    public function push(mixed $value);

    /**
     * @throws \RuntimeException
     */
    public function pop(): void;

    /**
     * @throws \RuntimeException
     */
    public function top(): mixed;

    public function isEmpty(): bool;
}
