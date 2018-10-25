<?php

class Meat extends Food
{
    private $typeFood;

    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
        $this->typeFood='meat';
    }

    public function kindFood():string
    {
        return $this->typeFood;
    }
}