<?php

spl_autoload_register();

//$result=[];
//$carTokens=explode(' ','Car 30 0.04 70');
//$typeVehicle=$carTokens[0];
//$fuelQuantity=floatval($carTokens[1]);
//$fuelConsumption=floatval($carTokens[2]);
//$tankCapacity=floatval($carTokens[3]);
//$car=new $typeVehicle($fuelQuantity,$fuelConsumption,$tankCapacity);
//$result[$typeVehicle]=$car;
//
//$truckTokens=explode(' ','Truck 100 0.5 300');
//$typeVehicle=$truckTokens[0];
//$fuelQuantity=floatval($truckTokens[1]);
//$fuelConsumption=floatval($truckTokens[2]);
//$truckCapacity=floatval($truckTokens[3]);
//$truck=new $typeVehicle($fuelQuantity,$fuelConsumption,$tankCapacity);
//$result[$typeVehicle]=$truck;
//
//$busTokens=explode(' ','Bus 40 0.3 150');
//$typeVehicle=$busTokens[0];
//$fuelQuantity=floatval($busTokens[1]);
//$fuelConsumption=floatval($busTokens[2]);
//$tankCapacity=floatval($busTokens[3]);
//$bus=new $typeVehicle($fuelQuantity,$fuelConsumption,$tankCapacity);
//$result[$typeVehicle]=$bus;
//
//$arr=['Refuel Car -10','Refuel Truck 0','Refuel Car 10','Refuel Car 300','Drive Bus 10',
//    'Refuel Bus 1000','DriveEmpty Bus 100','Refuel Truck 1000'];
//
//for ($i=0; $i<count($arr); $i++){
//    $inputTokens=explode(' ', $arr[$i]);
//    $command=strtolower($inputTokens[0]);
//    $typeVehicle=$inputTokens[1];
//    $param=floatval($inputTokens[2]);
//    try{
//        $result[$typeVehicle]->$command($param);
//    }catch (Exception $e){
//        echo $e->getMessage();
//    }
//}
//echo $car;
//echo $truck;
//echo $bus;



$result=[];
$carTokens=explode(' ',readline());
$typeVehicle=$carTokens[0];
$fuelQuantity=floatval($carTokens[1]);
$fuelConsumption=floatval($carTokens[2]);
$tankCapacity=floatval($carTokens[3]);
$car=new $typeVehicle($fuelQuantity,$fuelConsumption,$tankCapacity);

$result[$typeVehicle]=$car;

$truckTokens=explode(' ',readline());
$typeVehicle=$truckTokens[0];
$fuelQuantity=floatval($truckTokens[1]);
$fuelConsumption=floatval($truckTokens[2]);
$truckCapacity=floatval($truckTokens[3]);
$truck=new $typeVehicle($fuelQuantity,$fuelConsumption,$tankCapacity);
$result[$typeVehicle]=$truck;

$busTokens=explode(' ',readline());
$typeVehicle=$busTokens[0];
$fuelQuantity=floatval($busTokens[1]);
$fuelConsumption=floatval($busTokens[2]);
$tankCapacity=floatval($busTokens[3]);
$bus=new $typeVehicle($fuelQuantity,$fuelConsumption,$tankCapacity);
$result[$typeVehicle]=$bus;

$commands=intval(readline());

for ($i=0; $i<$commands; $i++){
    $inputTokens=explode(' ', readline());
    $command=strtolower($inputTokens[0]);
    $typeVehicle=$inputTokens[1];
    $param=floatval($inputTokens[2]);
    try{
        $result[$typeVehicle]->$command($param);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
echo $car;
echo $truck;
echo $bus;
