<?php

namespace stack;

interface StackInterface
{
    public function push(mixed $value);

    public function pop(): void;

    public function top(): mixed;

    public function isEmpty(): bool;
}
