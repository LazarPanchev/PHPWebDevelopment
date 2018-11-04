<?php

abstract class Vehicle
{
    /**
     * @var float
     */
    protected $fuelQuantity;

    /**
     * @var float
     */
    protected $fuelConsumption;

    /**
     * @var float
     */
    protected $totalDistance;

    /**
     * @var float
     */
    protected $tankCapacity;

    /**
     * Vehicle constructor.
     * @param float $fuelQuantity
     * @param float $fuelConsumption
     * @param $tankCapacity
     * @throws Exception
     */
    public function __construct(float $fuelQuantity, float $fuelConsumption, $tankCapacity)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
        $this->setTankCapacity($tankCapacity);
        $this->totalDistance=0;
    }
    public abstract function refuel(float $liters);

    /**
     * @param float $fuelQuantity
     * @throws Exception
     */
    protected function setFuelQuantity(float $fuelQuantity): void
    {
        if($fuelQuantity<=0){
            throw new Exception("Fuel must be a positive number");
        }
        $this->fuelQuantity = $fuelQuantity;
    }

    public function getFuelQuantity():float{
        return $this->fuelQuantity;
    }

    protected function setFuelConsumption(float $fuelConsumption): void
    {
        $this->fuelConsumption = $fuelConsumption;
    }

    /**
     * @return float
     */

    protected function getFuelConsumption(){
        return $this->fuelConsumption;
    }


    /**
     * @param float $distance
     * @throws Exception
     */
    public function drive(float $distance)
    {
        $className=get_class($this);
        $possibleDistance = $this->fuelQuantity / $this->fuelConsumption;
        if ($distance > $possibleDistance) {

            throw new Exception("{$className} needs refueling" . PHP_EOL);
        }
        $usedFuel=$distance * ($this->fuelConsumption);  //250 * 8lit/100km = 20l.
        $this->fuelQuantity -= $usedFuel;
        $this->totalDistance+=$distance;
        echo "{$className} travelled {$distance} km" . PHP_EOL;
    }


    protected function setTankCapacity(float $tankCapacity){
        $this->tankCapacity=$tankCapacity;
    }

    public function getTankCapacity(){
        return $this->tankCapacity;
    }

    public  function __toString()
    {
        $className=get_class($this);
        return "{$className}: " . number_format($this->fuelQuantity,2,'.','') . PHP_EOL;
    }

}