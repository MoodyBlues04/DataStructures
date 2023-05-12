<?php

declare(strict_types=1);

namespace patterns\factories;

use DataStructures\stack\ArrayStack;
use DataStructures\stack\NodeStack;
use DataStructures\stack\StackInterface;

include_once __DIR__ . '/../../DataStructures/stack/ArrayStack.php';
include_once __DIR__ . '/../../DataStructures/stack/NodeStack.php';
include_once __DIR__ . '/../../DataStructures/stack/StackInterface.php';

class StackFactory
{
    /** @var string[] */
    private const VALID_CLASSES = [
        ArrayStack::class,
        NodeStack::class
    ];

    /**
     * @throws \InvalidArgumentException
     */
    public static function create(string $className, array $values): StackInterface
    {
        if (!self::isValidClassName($className)) {
            throw new \InvalidArgumentException("Invalid classname: {$className}");
        }

        /** @var StackInterface */
        $stack = new $className();
        foreach ($values as $value) {
            $stack->push($value);
        }

        return $stack;
    }

    private static function isValidClassName(string $className): bool
    {
        return in_array($className, self::VALID_CLASSES);
    }
}
