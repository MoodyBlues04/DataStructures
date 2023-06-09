<?php

declare(strict_types=1);

namespace tests;

use src\DataStructures\stack\ArrayStack;
use src\patterns\decorator\StackIterableDecorator;
use src\patterns\factories\StackFactory;
use PHPUnit\Framework\TestCase;
use src\traits\RandomValuesTrait;

class IterableTest extends TestCase
{
    use RandomValuesTrait;

    public function testStackIterator(): void
    {
        $testValues = $this->getRandomValuesArray();
        $stack = StackFactory::create(ArrayStack::class, $testValues);

        $decoratedStack = new StackIterableDecorator($stack);
        $iterator = $decoratedStack->getIterator();

        foreach ($iterator as $key => $value) {
            $expected = $testValues[sizeof($testValues) - 1 - $key];
            $this->assertSame($expected, $value);
        }
    }
}