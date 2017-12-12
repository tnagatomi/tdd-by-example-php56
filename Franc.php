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
        parent::__construct($amount, $currency);
    }
}
