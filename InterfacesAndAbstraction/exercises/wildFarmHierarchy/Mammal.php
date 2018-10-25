<?php

abstract class Mammal extends Animal
{
    /**
     * @var string
     */
    private $livingRegion;

    public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion)
    {
        parent::__construct($animalName, $animalType, $animalWeight);
        $this->setLivingRegion($livingRegion);
    }

    public abstract function __toString();

    /**
     * @param string $livingRegion
     */
    private function setLivingRegion(string $livingRegion):void{
        $this->livingRegion=$livingRegion;
    }

    /**
     * @return string
     */
    public function getLivingRegion() :string{
        return $this->livingRegion;
    }
}