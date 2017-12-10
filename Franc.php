<?php

require_once ('Money.php');

class Franc extends Money
{
    /**
     * Franc constructor.
     * @param int $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Franc
     */
    public function times($multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }
}
