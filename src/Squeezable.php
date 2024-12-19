<?php

namespace App;

interface Squeezable
{
    public function getJuiceAmount(): float;
    public function isJuiceable(): bool;
}