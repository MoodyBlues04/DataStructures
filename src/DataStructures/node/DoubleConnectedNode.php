<?php

declare(strict_types=1);

namespace src\DataStructures\node;

class DoubleConnectedNode
{
    public mixed $value = null;
    public ?DoubleConnectedNode $next = null;
    public ?DoubleConnectedNode $prev = null;

    public function __construct(
        mixed $value = null,
        ?DoubleConnectedNode $prev = null,
        ?DoubleConnectedNode $next = null
    ) {
        $this->value = $value;
        $this->prev = $prev;
        $this->next = $next;
    }
}