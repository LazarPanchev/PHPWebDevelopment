<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24.10.2018 г.
 * Time: 15:44
 */

class Bus extends Vehicle
{

    public function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCapacity)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
    }

    /**
     * @param float $distance
     * @throws Exception
     */
    public function drive(float $distance): void
    {
        $quantity = $this->fuelQuantity;
        $newConsumption = $this->fuelConsumption + 1.4;
        $possibleDistance = $quantity / $newConsumption;
        if ($possibleDistance >= $distance) {
            $needFuel = $distance * $newConsumption;
            $this->fuelQuantity -= $needFuel;
            $this->totalDistance += $distance;
            echo "Bus travelled {$distance} km" . PHP_EOL;
        } else {
            throw new Exception("Bus needs refueling" . PHP_EOL);
        }
    }

    /**
     * @param float $distance
     * @throws Exception
     */
    public function driveempty(float $distance): void
    {
        $possibleDistance = $this->fuelQuantity / $this->fuelConsumption;
        if ($possibleDistance >= $distance) {
            $needFuel = $distance * ($this->fuelConsumption);
            $this->fuelQuantity -= $needFuel;
            $this->totalDistance += $distance;
            echo "Bus travelled {$distance} km" . PHP_EOL;
        } else {
            throw new Exception("Bus needs refueling" . PHP_EOL);
        }
    }

    /**
     * @param float $liters
     * @throws Exception
     */
    public function refuel(float $liters): void
    {
        if ($this->getFuelQuantity() + $liters < 0) {
            throw new Exception('Fuel must be a positive number' . PHP_EOL);
        } elseif ($this->getFuelQuantity() + $liters > $this->getTankCapacity()) {
            throw new Exception('Cannot fit fuel in tank' . PHP_EOL);
        } else {
            $this->fuelQuantity += $liters;
        }
    }
}