<?php

class GoldenEditionBook extends Book
{
    /**
     * @param float $price
     */
    protected function setPrice(float $price): void
    {
        $price=floatval($price);
        $this->price=$price+($price * 0.30);
    }

}