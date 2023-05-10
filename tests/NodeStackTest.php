<?php

declare(strict_types=1);

namespace stack;

use PHPUnit\Framework\TestCase;
use traits\RandomValuesTrait;
use stack\NodeStack;

include_once __DIR__ . '/../stack/NodeStack.php';
include_once __DIR__ . '/../traits/RandomValuesTrait.php';


class NodeStackTest extends TestCase
{
    use RandomValuesTrait;

    public function testPush()
    {
        $testValue = $this->getRandomValue();

        $stack = new NodeStack();
        $stack->push($testValue);

        $this->assertSame($testValue, $stack->top());
    }

    public function testSize()
    {
        $testValues = $this->getRandomValuesArray();
        $stack = $this->getStackByValues($testValues);

        $this->assertSame(sizeof($testValues), $stack->getSize());
    }

    public function testPop(): void
    {
        $testValues = $this->getRandomValuesArray();
        $stack = $this->getStackByValues($testValues);

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
        $stack = new NodeStack();

        $this->expectException(\RuntimeException::class);
        $stack->top();

        $this->expectException(\RuntimeException::class);
        $stack->pop();
    }

    public function testPushFull(): void
    {
        $maxSize = 2;
        $stack = new NodeStack($maxSize);
        $values = $this->getRandomValuesArray($maxSize);

        foreach ($values as $value) {
            $stack->push($value);
        }

        $this->expectException(\RuntimeException::class);
        $stack->push($values[0]);
    }

    private function getStackByValues(array $values): NodeStack
    {
        $stack = new NodeStack();
        foreach ($values as $value) {
            $stack->push($value);
        }
        return $stack;
    }
}
