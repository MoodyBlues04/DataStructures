<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use queue\Queue;
use traits\RandomValuesTrait;

include_once __DIR__ . '/../queue/Queue.php';
include_once __DIR__ . '/../traits/RandomValuesTrait.php';

class QueueTest extends TestCase
{
    use RandomValuesTrait;

    public function testPush()
    {
        $testValue = $this->getRandomValue();

        $queue = new Queue();
        $queue->push($testValue);

        $this->assertSame($testValue, $queue->element());
    }

    public function testSize()
    {
        $testValues = $this->getRandomValuesArray();
        $queue = $this->getQueueByValues($testValues);

        $this->assertSame(sizeof($testValues), $queue->getSize());
    }

    public function testRemove(): void
    {
        $valuesSize = 5;
        $testValues = $this->getRandomValuesArray($valuesSize);
        $queue = $this->getQueueByValues($testValues);

        for ($idx = $valuesSize - 1; $idx >= 0; $idx--) {
            $value = $queue->element();
            $this->assertSame($value, $testValues[$valuesSize - $idx - 1]);

            $queue->remove();
        }
    }

    public function testPopEmpty(): void
    {
        $queue = new Queue();

        $this->expectException(\RuntimeException::class);
        $queue->element();

        $this->expectException(\RuntimeException::class);
        $queue->remove();
    }

    public function testPushFull(): void
    {
        $maxSize = 2;
        $queue = new Queue($maxSize);
        $values = $this->getRandomValuesArray($maxSize);

        foreach ($values as $value) {
            $queue->push($value);
        }

        $this->expectException(\RuntimeException::class);
        $queue->push($values[0]);
    }

    private function getQueueByValues(array $values): Queue
    {
        $queue = new Queue();
        foreach ($values as $value) {
            $queue->push($value);
        }
        return $queue;
    }
}
