<?php

class Franc
{
    private $amount;

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

    /**
     * @param Franc $franc
     * @return bool
     */
    public function equals(Franc $franc)
    {
        return $this->amount == $franc->amount;
    }
}
