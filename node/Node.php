<?php

declare(strict_types=1);

namespace app\node;

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
