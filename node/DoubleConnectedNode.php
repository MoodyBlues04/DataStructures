<?php

declare(strict_types=1);

namespace node;

class DoubleConnectedNode
{
    public mixed $value;
    public ?DoubleConnectedNode $next = null;
    public ?DoubleConnectedNode $prev = null;

    public function __construct(
        mixed $value = null,
        ?DoubleConnectedNode $prev = null,
        ?DoubleConnectedNode $next = null
    ) {
    }
}
