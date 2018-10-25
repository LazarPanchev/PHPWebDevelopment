<?php

class Cat extends Felime
{
    /**
     * @var string
     */
    private $catBreed;

    public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion, string $catBreed)
    {
        parent::__construct($animalName, $animalType, $animalWeight, $livingRegion);
        $this->setCatBreed($catBreed);
    }

    /**
     * @return string
     */
    protected function getCatBreed() :string {
        return $this->catBreed;
    }

    /**
     * @param string $catBreed
     */
    private function setCatBreed(string $catBreed) :void{
        $this->catBreed=$catBreed;
    }

    public function makeSound(): void
    {
        echo 'Meowwww' . PHP_EOL;
    }

    /**
     * @param Food $food
     */
    public function eatFood(Food $food): void
    {
        $this->addFoodEaten($food->getQuantity());
    }

    /**
     * @return string
     */
    public  function __toString(){
        return "{$this->getAnimalType()}[{$this->getAnimalName()}, {$this->getCatBreed()}, {$this->getAnimalWeight()}, {$this->getLivingRegion()}, {$this->getFoodEaten()}]".PHP_EOL;
    }
}