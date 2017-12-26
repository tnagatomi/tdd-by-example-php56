<?php

interface Expression
{
    /**
     * @param int $multiplier
     * @return Expression
     */
    public function times($multiplier);

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend);

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, $to);
}