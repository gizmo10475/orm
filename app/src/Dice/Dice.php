<?php

namespace App\Dice;

/**
 * Class Dice.
 */
class Dice
{
    const FACES = 6;
    private ?int $roll = null;

    public function roll(): int
    {
        $this->roll = rand(1, self::FACES);

        return $this->roll;
    }

    public function rollTwo(): int
    {
        $this->roll = rand(2, self::FACES * 2);

        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll;
    }
}
