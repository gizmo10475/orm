<?php

declare(strict_types=1);

namespace App\Dice;

// use function Edvin\Functions\{
//     destroySession,
//     redirectTo,
//     renderView,
//     renderTwigView,
//     sendResponse,
//     url
// };

/**
 * Class GraphicalDice.
 */
class DiceGraphic extends Dice
{
    /**
     * @var integer SIDES Number of sides of the Dice.
     */
    const SIDES = 6;

    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function graphic()
    {
        return "dice-" . $this->getLastRoll();
        // return "dice-" . $this->lastRoll;
    }
}
