<?php

class Money
{
    protected $amount;
    protected $currency;

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
        return null;
    }

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * @param Money $money
     * @return bool
     */
    public function equals(Money $money)
    {
        return ($this->amount == $money->amount) && (get_class($this) === get_class($money));
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function dollar($amount)
    {
        return new Dollar($amount, 'USD');
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function franc($amount)
    {
        return new Franc($amount, 'CHF');
    }
}