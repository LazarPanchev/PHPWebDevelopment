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
     * Vehicle constructor.
     * @param float $fuelQuantity
     * @param float $fuelConsumption
     */
    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
        $this->totalDistance=0;
    }

    protected function setFuelQuantity(float $fuelQuantity): void
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    protected function setFuelConsumption(float $fuelConsumption): void
    {
        $this->fuelConsumption = $fuelConsumption;
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

    public abstract function refuel(float $liters);

    public  function __toString()
    {
        $className=get_class($this);
        return "{$className}: " . number_format($this->fuelQuantity,2,'.','') . PHP_EOL;
    }
}