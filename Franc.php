<?php

require_once ('Money.php');

class Franc extends Money
{
    private $currency;

    /**
     * Franc constructor.
     * @param int $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
        $this->currency = 'CHF';
    }

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times($multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }
}
