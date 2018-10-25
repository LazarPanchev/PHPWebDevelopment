<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24.10.2018 г.
 * Time: 14:45
 */

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

    protected $tankCapacity;


    /**
     * Vehicle constructor.
     * @param float $fuelQuantity
     * @param float $fuelConsumption
     * @param float $tankCapacity
     * @throws Exception
     */
    protected function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCapacity)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
        $this->totalDistance=0;
        $this->setTankCapacity($tankCapacity);
    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float
    {
        return $this->fuelQuantity;
    }

    /**
     * @return mixed
     */
    public function getTankCapacity()
    {
        return $this->tankCapacity;
    }

    /**
     * @param mixed $tankCapacity
     */
    private function setTankCapacity($tankCapacity): void
    {
        $this->tankCapacity = $tankCapacity;
    }

    /**
     * @return float
     */
    public function getFuelConsumption(): float
    {
        return $this->fuelConsumption;
    }

    /**
     * @param float $fuelQuantity
     * @throws Exception
     */
    private function setFuelQuantity(float $fuelQuantity):void{
        if($fuelQuantity<0){
            $this->fuelQuantity=0;
            //throw new Exception('Fuel must be a positive number' . PHP_EOL);
        }
        $this->fuelQuantity=$fuelQuantity;
    }

    protected  function setFuelConsumption(float $fuelConsumption):void{
        $this->fuelConsumption=$fuelConsumption;
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function __toString()
    {
        $function=new \ReflectionClass($this);
        $className=$function->getName();
        $totalFuel=number_format($this->getFuelQuantity(),2,'.','');
       return "{$className}: {$totalFuel}" . PHP_EOL;
    }


    public abstract function drive(float $distance):void;

    public abstract function refuel(float $liters):void;
}