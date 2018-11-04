<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 22.10.2018 г.
 * Time: 10:26 ч.
 */

class Bus extends Vehicle
{
    /**
     * @param float $liters
     * @throws Exception
     */
    public function refuel(float $liters){
        if($this->getFuelQuantity()+$liters>$this->getTankCapacity()){
            throw new Exception("Cannot fit fuel in tank");
        }
        $this->fuelQuantity+=$liters;
    }

    protected function increaseConsumption(){
        return $this->getFuelConsumption() + 1.4;
    }

    public function DriveEmpty($distance){
        parent::drive($distance);
    }

    /**
     * @param float $distance
     * @throws Exception
     */
    public function drive($distance){
        $className=get_class($this);
        $possibleDistance = $this->getFuelQuantity() / $this->increaseConsumption();
        if ($distance > $possibleDistance) {

            throw new Exception("{$className} needs refueling" . PHP_EOL);
        }
        $usedFuel=$distance * ($this->getFuelConsumption());  //250 * 8lit/100km = 20l.
        $this->fuelQuantity -= $usedFuel;
        $this->totalDistance+=$distance;
        echo "{$className} travelled {$distance} km" . PHP_EOL;
    }

}