<?php

declare(strict_types=1);

namespace src\DataStructures\node;

class Node
{
    public mixed $value;
    public ?Node $next;

    public function __construct(mixed $value = null, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}