<?php

class Tiger extends Felime
{
    public function makeSound(): void
    {
        echo 'ROAAR!!!' . PHP_EOL;
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eatFood(Food $food): void
    {
        if($food->kindFood()=='vegetable'){
            throw new Exception("Tigers are not eating that type of food!" . PHP_EOL);
        }
        $this->addFoodEaten($food->getQuantity());
    }

    public  function __toString(){
        $weight=$this->getAnimalWeight();
        return "{$this->getAnimalType()}[{$this->getAnimalName()}, {$weight}, {$this->getLivingRegion()}, {$this->getFoodEaten()}]".PHP_EOL;
    }

}