<?php

class Application
{
    /**
     * @var Vehicle[]
     */
    private $result=[];

    /**
     * @throws Exception
     */
    public function run(){
        $this->readData();
        $this->startReadCommands();
        $this->finalPrint();
    }

    /**
     * @throws Exception
     */
    private function readData():void{

        $arr=['Car 30 0.04 70','Truck 100 0.5 300','Bus 40 0.3 150'];
        for($i = 0; $i < count($arr); $i++) {
            [$type, $fuelQuantity, $liters, $tankCapacity]=explode(' ', $arr[$i]);

            if(!class_exists($type)){
                throw new Exception("Unknown type of vehicle!");
            }
            $this->result[$type]= new $type($fuelQuantity,$liters, $tankCapacity);
        }
    }

    /**
     * @throws Exception
     */
    private function startReadCommands(){
        $numberCommands=8;
         $secArr=['Refuel Car -10','Refuel Truck 0','Refuel Car 10','Refuel Car 300','Drive Bus 10','Refuel Bus 1000','DriveEmpty Bus 100','Refuel Truck 1000'];
        for($i = 0; $i < $numberCommands; $i++) {
            [$command,$typeVehicle,$typeCommand]=explode(' ', $secArr[$i]);

            if(!key_exists($typeVehicle, $this->result)) {
                throw new Exception('Non valid type');
            }
            try {
                $this->result[$typeVehicle]->$command($typeCommand);
            }catch (Exception $e){
                echo $e->getMessage() . PHP_EOL;
            }

        }
    }

    private function finalPrint():void{
        foreach ($this->result as $key=>$value){
            echo $value;
        }
    }
}