<?php

declare(strict_types=1);

namespace src\traits;

trait RandomValuesTrait
{
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