<?php

require_once('Money.php');

class Dollar extends Money
{
    private $currency;

    /**
     * Dollar constructor.
     * @param int $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
        $this->currency = 'USD';
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
        return new Dollar($this->amount * $multiplier);
    }
}
