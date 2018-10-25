<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24.10.2018 г.
 * Time: 14:46
 */

class Car extends Vehicle
{
    public function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCapacity)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->increaseFuelConsumption();
    }

    private function increaseFuelConsumption(): void
    {
        $this->fuelConsumption += 0.9;
    }


    /**
     * @param float $distance
     * @throws Exception
     */
    public function drive(float $distance): void
    {
        $possibleDistance = $this->fuelQuantity / $this->fuelConsumption;
        if ($possibleDistance >= $distance) {
            $needFuel = $distance * ($this->fuelConsumption);
            $this->fuelQuantity -= $needFuel;
            $this->totalDistance += $distance;
            echo "Car travelled {$distance} km" . PHP_EOL;
        } else {
            throw new Exception("Car needs refueling" . PHP_EOL);
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
        }elseif ($this->getFuelQuantity()+$liters > $this->getTankCapacity()){
            throw new Exception('Cannot fit fuel in tank' . PHP_EOL);
        }else{
            $this->fuelQuantity += $liters;
        }
    }
}