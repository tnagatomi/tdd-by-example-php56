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
        return $this->amount == $money->amount;
    }
}