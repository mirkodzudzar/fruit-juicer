<?php

namespace App;

use App\Strainer;
use App\FruitContainer;

class Juicer
{
    private FruitContainer $container;
    private Strainer $strainer;

    public function __construct(float $capacity)
    {
        $this->container = new FruitContainer($capacity);
        $this->strainer = new Strainer;
    }

    public function addFruit(Fruit $fruit): void
    {
        $this->container->addFruit($fruit);

        if ($fruit instanceof Apple && $fruit->isRotten()) {
            echo "Fruit is rotten!\n";
            return;
        }

        $fullClass = get_class($fruit);
        $baseClass = basename(str_replace('\\', '/', $fullClass));

        echo basename($baseClass)." added with volume: {$fruit->getVolume()}l.\n";
    }

    public function squeeze(): void
    {
        $fruits = $this->container->getAllFruits();

        if (empty($fruits)) {
            echo "No fruits to squeeze!\n";
            return;
        }

        $juiceAmount = $this->strainer->squeeze($fruits);

        $this->container->clearFruits();

        if ($juiceAmount == 0) {
            echo "Fruit is not squeezed!\n";
            return;
        }

        echo "Fruit is squeezed, with juice of {$juiceAmount}l.\n";
    }

    public function getContainerStatus(): string
    {
        return sprintf(
            "Container status: %d fruits, %.2fl space left.\n",
            $this->container->getFruitCount(),
            $this->container->getRemainingSpace(),
        );
    }

    public function getTotalJuice(): float
    {
        return $this->strainer->getTotalJuice();
    }
}