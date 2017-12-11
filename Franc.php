<?php

require_once ('Money.php');

class Franc extends Money
{
    /**
     * Franc constructor.
     * @param int $amount
     * @param string $currency
     */
    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = 'CHF';
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times($multiplier)
    {
        return new Franc($this->amount * $multiplier, null);
    }
}
