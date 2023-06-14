<?php

declare(strict_types=1);

namespace src\patterns\iterator;

use Iterator;

interface IterableInterface
{
    public function getIterator(): Iterator;
}