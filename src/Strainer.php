<?php

namespace App;

class Strainer
{
    private float $totalJuice = 0;

    public function squeeze(array $fruits): float
    {
        $juiceAmount = 0;

        foreach ($fruits as $fruit) {
            if ($fruit->isJuiceable()) {
                $juiceAmount += $fruit->getJuiceAmount();
            }
        }

        $this->totalJuice += $juiceAmount;

        return $juiceAmount;
    }

    public function getTotalJuice(): float
    {
        return $this->totalJuice;
    }
}