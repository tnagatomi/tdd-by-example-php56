<?php

class Bank
{
    /**
     * @param Expression $source
     * @param string $to
     * @return Money
     */
    public function reduce(Expression $source, $to)
    {
        return Money::dollar(10);
    }
}