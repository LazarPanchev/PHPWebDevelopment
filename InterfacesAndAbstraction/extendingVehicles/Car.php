<?php

class Car extends Vehicle{

    protected function setFuelConsumption(float $fuelConsumption):void{
        $this->fuelConsumption=$fuelConsumption + 0.9;
    }

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

}