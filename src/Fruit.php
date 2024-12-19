<?php

namespace App;

abstract class Fruit implements Squeezable
{
    protected string $color;
    protected float $volume;

    public function __construct(string $color, float $volume)
    {
        $this->color = $color;
        $this->volume = $volume;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getJuiceAmount(): float
    {
        return $this->volume * 0.5;
    }

    public function isJuiceable(): bool
    {
        return true;
    }
}