<?php

class Vegetable extends Food
{
    /**
     * @var string
     */
    private $typeFood;

    /**
     * Vegetable constructor.
     * @param int $quantity
     */
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
        $this->typeFood='vegetable';
    }

    public function kindFood():string
    {
        return $this->typeFood;
    }
}