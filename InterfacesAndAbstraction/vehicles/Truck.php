<?php

class Truck extends Vehicle
{
    protected function setFuelConsumption(float $fuelConsumption):void{
        $this->fuelConsumption=$fuelConsumption + 1.6;
    }

    public function refuel(float $liters){
        $this->fuelQuantity+=$liters*0.95;
    }

}