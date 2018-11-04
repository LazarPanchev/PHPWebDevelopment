<?php

class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $cost;

    /**
     * Product constructor.
     * @param string $name
     * @param float $cost
     */
    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }

    /**
     * @param string $name
     */
    private function setName(string $name):void{
        $this->name=$name;
    }

    /**
     * @return string
     */
    public function getName():string{
        return $this->name;
    }

    /**
     * @param float $cost
     */
    private function setCost(float $cost):void{
        $this->cost=$cost;
    }

    /**
     * @return float
     */
    public function getCost():float{
        return $this->cost;
    }
}

?>