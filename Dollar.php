<?php

require_once('Money.php');

class Dollar extends Money
{
    /**
     * Dollar constructor.
     * @param int $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Dollar
     */
    public function times($multiplier)
    {
        return new Dollar($this->amount * $multiplier);
    }

    /**
     * @param Dollar $dollar
     * @return bool
     */
    public function equals(Dollar $dollar)
    {
        return $this->amount == $dollar->amount;
    }
}
