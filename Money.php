<?php

class Money
{
    protected $amount;

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
     * @return Dollar
     */
    static function dollar($amount)
    {
        return new Dollar($amount);
    }
}