<?php

class Mouse extends Mammal
{
    public function makeSound(): void
    {
        echo 'SQUEEEAAAK!' . PHP_EOL;
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eatFood(Food $food): void
    {
        if($food->kindFood()=='meat'){
            throw new Exception("Mouses are not eating that type of food!" . PHP_EOL);
        }
        $this->addFoodEaten($food->getQuantity());
    }


    public  function __toString(){
        $weight=$this->getAnimalWeight();
        return "{$this->getAnimalType()}[{$this->getAnimalName()}, {$weight}, {$this->getLivingRegion()}, {$this->getFoodEaten()}]".PHP_EOL;
    }

}