<?php
abstract class Animal
{
    /**
     * @var string
     */
    private $animalName;
    /**
     * @var string
     */
    private $animalType;

    /**
     * @var float
     */
    private $animalWeight;

    /**
     * @var int
     */
    private $foodEaten;

    /**
     * Animal constructor.
     * @param string $animalName
     * @param string $animalType
     * @param float $animalWeight
     */
    public function __construct(string $animalName, string $animalType, float $animalWeight)
    {
        $this->setAnimalName($animalName);
        $this->setAnimalType($animalType);
        $this->setAnimalWeight($animalWeight);
        $this->foodEaten=0;
    }

    public abstract function makeSound(): void;
    public abstract function eatFood(Food $food): void;

    /**
     * @return string
     */
    protected function getAnimalName(): string
    {
        return $this->animalName;
    }

    /**
     * @param string $animalName
     */
    private function setAnimalName(string $animalName):void{
        $this->animalName=$animalName;
    }

    /**
     * @return string
     */
    protected function getAnimalType(): string
    {
        return $this->animalType;
    }

    /**
     * @param string $animalType
     */
    private function setAnimalType(string $animalType):void{
        $this->animalType=$animalType;
    }

    /**
     * @return float
     */
    protected function getAnimalWeight(): float
    {
        return $this->animalWeight;
    }

    /**
     * @param float $animalWeight
     */
    private function setAnimalWeight(float $animalWeight):void{
        $this->animalWeight=$animalWeight;
    }

    /**
     * @return int
     */
    protected function getFoodEaten(): int
    {
        return $this->foodEaten;
    }

    /**
     * @param int $quantity
     */
    protected function addFoodEaten(int $quantity){
        $this->foodEaten += $quantity;
    }
}