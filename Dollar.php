<?php

require_once('Money.php');

class Dollar extends Money
{
    /**
     * Dollar constructor.
     * @param int $amount
     * @param string $currency
     */
    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times($multiplier)
    {
        return Money::dollar($this->amount * $multiplier);
    }
}
