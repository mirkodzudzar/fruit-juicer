<?php

namespace App;

use RuntimeException;

class FruitContainer
{
    private float $capacity;
    private array $fruits = [];

    public function __construct(float $capacity)
    {
        $this->capacity = $capacity;
    }

    public function addFruit(Fruit $fruit): void
    {
        $currentVolume = $this->getCurrentVolume();

        if ($currentVolume + $fruit->getVolume() > $this->capacity) {
            throw new RuntimeException("Not enough space in container");
        }

        $this->fruits[] = $fruit;
    }

    private function getCurrentVolume(): float
    {
        return array_reduce($this->fruits, fn($sum, $fruit) => $sum + $fruit->getVolume(), 0);
    }

    public function getAllFruits(): array
    {
        return $this->fruits;
    }

    public function clearFruits(): void
    {
        $this->fruits = [];
    }

    public function getFruitCount(): int
    {
        return count($this->fruits);
    }

    public function getRemainingSpace(): float
    {
        return $this->capacity - $this->getCurrentVolume();
    }
}