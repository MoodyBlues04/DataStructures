<?php

declare(strict_types=1);

namespace tests;

use src\DataStructures\stack\ArrayStack;
use src\patterns\factories\StackFactory;
use src\traits\RandomValuesTrait;

class ArrayStackTest extends \PHPUnit\Framework\TestCase
{
    use RandomValuesTrait;

    public function testPush(): void
    {
        $testValue = $this->getRandomValue();

        $stack = new ArrayStack();
        $stack->push($testValue);

        $this->assertSame($testValue, $stack->top());
    }

    public function testSize()
    {
        $testValues = $this->getRandomValuesArray();
        $stack = StackFactory::create(ArrayStack::class, $testValues);

        $this->assertSame(sizeof($testValues), $stack->getSize());
    }

    public function testPop(): void
    {
        $testValues = $this->getRandomValuesArray();
        $stack = StackFactory::create(ArrayStack::class, $testValues);

        $idx = sizeof($testValues) - 1;
        while (!$stack->isEmpty()) {
            $value = $stack->top();
            $this->assertSame($value, $testValues[$idx]);

            $stack->pop();
            $idx--;
        }
    }

    public function testPopEmpty(): void
    {
        $stack = new ArrayStack();

        $this->expectException(\RuntimeException::class);
        $stack->top();

        $this->expectException(\RuntimeException::class);
        $stack->pop();
    }

    public function testPushFull(): void
    {
        $maxSize = 2;
        $stack = new ArrayStack($maxSize);
        $values = $this->getRandomValuesArray($maxSize);

        foreach ($values as $value) {
            $stack->push($value);
        }

        $this->expectException(\RuntimeException::class);
        $stack->push($values[0]);
    }
}