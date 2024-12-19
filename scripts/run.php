<?php

use App\Apple;
use App\Juicer;

require_once __DIR__.'/../vendor/autoload.php';

try {
    $juicer = new Juicer(20);

    for ($i = 1; $i <= 100; $i++) {
        echo "\nAction {$i}\n";
        echo $juicer->getContainerStatus();

        if ($i % 9 === 0) {
            $volume = rand(1, 5);
            $isRotten = (rand(1, 100) <= 20);
            $apple = new Apple('green', $volume, $isRotten);
            $juicer->addFruit($apple);
        }

        $juicer->squeeze();
    }

    echo "Squeezing complete! Total juice: {$juicer->getTotalJuice()}l.\n";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}\n";
}