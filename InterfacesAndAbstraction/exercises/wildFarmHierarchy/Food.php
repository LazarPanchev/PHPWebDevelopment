<?php

abstract class Food
{
    /**
     * @var int
     */
    private $quantity;

    protected function __construct(int $quantity)
    {
        $this->setQuantity($quantity);
    }

    /**
     * @param int $quantity
     */
    private function setQuantity(int $quantity):void{
        $this->quantity=$quantity;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public abstract function kindFood();
}