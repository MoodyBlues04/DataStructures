<?php

declare(strict_types=1);

namespace patterns\decorator;

use DataStructures\stack\StackInterface;
use Iterator;
use patterns\iterator\IterableInterface;
use patterns\iterator\StackIterator;

include_once __DIR__ . '/../../DataStructures/stack/StackInterface.php';
include_once __DIR__ . '/../iterator/IterableInterface.php';
include_once __DIR__ . '/../iterator/StackIterator.php';

class StackIterableDecorator implements IterableInterface
{
    private StackInterface $stack;

    public function __construct(StackInterface $stack)
    {
        $this->stack = $stack;
    }

    public function getIterator(): Iterator
    {
        return new StackIterator($this->stack);
    }
}
