<?php

class Bank
{
    private $rates;

    /**
     * @param Expression $source
     * @param string $to
     * @return Money
     */
    public function reduce(Expression $source, $to)
    {
        return $source->reduce($this, $to);
    }

    /**
     * @param string $from
     * @param string $to
     * @param int $rate
     */
    public function addRate($from, $to, $rate)
    {
        $this->rates[(new Pair($from, $to))->hashCode()] = $rate;
    }

    public function rate($from, $to)
    {
        if ($from === $to) {
            return 1;
        }
        return $this->rates[(new Pair($from, $to))->hashCode()];
    }
}