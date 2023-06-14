<?php

declare(strict_types=1);

namespace src\DataStructures\graphs;

/**
 * Represents graph without connection weight
 */
class AdjacencyList
{
    /** @var array<array<int,int>> */
    private array $data = [];

    /**
     * @param array<array<int,int>> $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function add()
    {
    }
}