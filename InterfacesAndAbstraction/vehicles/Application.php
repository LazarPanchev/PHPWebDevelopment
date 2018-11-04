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
//        print_r($this->result);
        $this->finalPrint();
    }

    /**
     * @throws Exception
     */
    private function readData():void{

        for($i = 0; $i < 2; $i++) {
            [$type, $fuelQuantity, $liters]=explode(' ', readline());

            if(!class_exists($type)){
                throw new Exception("Unknown type of vehicle!");
            }
            $this->result[$type]= new $type($fuelQuantity,$liters);
        }
    }

    /**
     * @throws Exception
     */
    private function startReadCommands(){
        $numberCommands=intval(readline());

        for($i = 0; $i < $numberCommands; $i++) {
            $tokens=explode(' ', readline());
            $command=$tokens[0];
            $typeVehicle=$tokens[1];
            $typeCommand=$tokens[2];

            if(!key_exists($typeVehicle, $this->result)) {
                throw new Exception('Non valid type');
            }
            try {
                $this->result[$typeVehicle]->$command($typeCommand);
            }catch (Exception $e){
                echo $e->getMessage();
            }

        }
    }

    private function finalPrint():void{
        foreach ($this->result as $key=>$value){
            echo $value;
        }
    }
}