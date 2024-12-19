<?php

namespace App;

class Apple extends Fruit
{
    private bool $isRotten;

    public function __construct(string $color, float $volume, bool $isRotten = false)
    {
        parent::__construct($color, $volume);
        $this->isRotten = $isRotten;
    }

    public function isRotten(): bool
    {
        return $this->isRotten;
    }

    public function isJuiceable(): bool
    {
        return !$this->isRotten;
    }

    public function getJuiceAmount(): float
    {
        return $this->isRotten ? 0 : parent::getJuiceAmount();
    }
}