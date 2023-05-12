<?php

declare(strict_types=1);

namespace tests;

use DataStructures\stack\ArrayStack;
use patterns\decorator\StackIterableDecorator;
use patterns\factories\StackFactory;
use PHPUnit\Framework\TestCase;
use traits\RandomValuesTrait;

include_once __DIR__ . '/../patterns/factories/StackFactory.php';
include_once __DIR__ . '/../patterns/decorator/StackIterableDecorator.php';
include_once __DIR__ . '/../DataStructures/stack/ArrayStack.php';
include_once __DIR__ . '/../traits/RandomValuesTrait.php';

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
