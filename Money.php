<?php

class Money implements Expression
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
        return new Money($this->amount * $multiplier, $this->currency);
    }

    /**
     * @param Money $addend
     * @return Expression
     */
    public function plus(Money $addend)
    {
        return new Sum($this, $addend);
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
        return ($this->amount === $money->amount) && ($this->currency === $money->currency);
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function dollar($amount)
    {
        return new Money($amount, 'USD');
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function franc($amount)
    {
        return new Money($amount, 'CHF');
    }
}