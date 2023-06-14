<?php

declare(strict_types=1);

namespace src\patterns\factories;

use src\DataStructures\stack\ArrayStack;
use src\DataStructures\stack\NodeStack;
use src\DataStructures\stack\StackInterface;

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