<?php

namespace tests;

include_once __DIR__ . '/../stack/ArrayStack.php';

class StackTest
{
    public function testPush(): void
    {
        $stack = new \stack\ArrayStack(3);

        foreach ([1, 2, 3] as $value) {
            $stack->push($value);
        }

        var_dump($stack);
    }
}
