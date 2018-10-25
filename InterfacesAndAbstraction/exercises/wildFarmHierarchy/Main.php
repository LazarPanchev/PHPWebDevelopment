<?php

class Main
{
    const END='End';

    /**
     * @var Animal
     */
    private $animal;

    /**
     * @var Food;
     */
    private $food;

    private $counter;

    public function __construct()
    {
        $this->animal=null;
        $this->food=null;
        $this->counter=0;
    }

    public function run(){
        $this->readData();
    }

    public function readData(){
        $inputData = readline();
        while ($inputData !== self::END) {
            $tokens = explode(' ', $inputData);
            if ($this->counter % 2 == 0) {
                $this->animal=Factory::getAnimal($tokens);
            } else {
                $this->food=Factory::getFood($tokens);
                $this->printData();
            }
            $this->counter++;
            $inputData = readline();
        }
    }

    public function printData(){
        try{
            $this->animal->makeSound();
            $this->animal->eatFood($this->food);
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
        echo $this->animal;
    }
}