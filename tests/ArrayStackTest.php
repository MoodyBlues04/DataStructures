<?php

declare(strict_types=1);

namespace tests;

use stack\ArrayStack;

include_once __DIR__ . '/../stack/ArrayStack.php';

class ArrayStackTest extends \PHPUnit\Framework\TestCase
{
    public function testPush(): void
    {
        $testValue = $this->getRandomValue();

        $stack = new ArrayStack();
        $stack->push($testValue);

        $this->assertSame($testValue, $stack->top());
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
        $this->expectException(\RuntimeException::class);

        $stack = new ArrayStack();
        $stack->top();
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

    private function getStackByValues(array $values): ArrayStack
    {
        $stack = new ArrayStack();
        foreach ($values as $value) {
            $stack->push($value);
        }
        return $stack;
    }

    private function getRandomValuesArray(int $size = 5): array
    {
        $values = [];
        for ($idx = 0; $idx < $size; $idx++) {
            $values[] = $this->getRandomValue();
        }
        return $values;
    }

    private function getRandomValue(): string
    {
        return substr(md5((string)mt_rand()), 0, 7);
    }
}
