<?php

class Car extends Vehicle{

    protected function setFuelConsumption(float $fuelConsumption):void{
        $this->fuelConsumption=$fuelConsumption + 0.9;
    }

    public function refuel(float $liters){
        $this->fuelQuantity+=$liters;
    }

}