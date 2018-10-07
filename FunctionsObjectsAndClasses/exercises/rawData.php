<?php
class Car{
    private $model;
    private $engine;
    private $cargo;
    private $tireCollection;

    public function __construct(string $model, Engine $engine,Cargo $cargo)
    {
        $this->model=$model;
        $this->engine=$engine;
        $this->cargo=$cargo;
        $this->tireCollection=[];
    }

    public function addTire(Tire $tire){
        $this->tireCollection[]=$tire;
    }

    public function hasFlatTire(): bool{
        foreach ($this->tireCollection as $tire){
            if($tire->getTirePressure()<1){
                return true;
            }
        }
        return false;
    }
    public function getCarModel(): string{
        return $this->model;
    }

    public function getEnginePower():int{
        $currEngine=$this->engine;
        return $currEngine->getPower();
    }

    public function getCargoType(): string{
        $currCargo=$this->cargo;
        return $currCargo->getCargo();
    }
}

class Engine{
    private $engineSpeed;
    private $enginePower;

    public function __construct(int $engineSpeed,int $enginePower)
    {
        $this->engineSpeed=$engineSpeed;
        $this->enginePower=$enginePower;
    }

    public function getPower() :int{
        return $this->enginePower;
    }
}
class Cargo{
    private $cargoWeight;
    private $cargoType;

    public function __construct(int $cargoWeight,string $cargoType)
    {
        $this->cargoWeight=$cargoWeight;
        $this->cargoType=$cargoType;
    }
    public function getCargo() :string{
        return $this->cargoType;
    }
}
class Tire{
    private $tirePressure;
    private $tireAge;

    public function __construct(float $tirePressure,int $tireAge)
    {
        $this->tirePressure=$tirePressure;
        $this->tireAge=$tireAge;
    }

    public function getTirePressure(): float {
        return $this->tirePressure;
    }
}

$resultCars=[];
$n=intval(readline());
for($i = 0; $i < $n; $i++) {
    $tokens=explode(' ', readline());
    $model=$tokens[0];
    $engineSpeed=intval($tokens[1]);
    $enginePower=intval($tokens[2]);
    $cargoWeight=intval($tokens[3]);
    $cargoType=$tokens[4];
    $tire1Pressure=floatval($tokens[5]);
    $tire1Age=intval($tokens[6]);
    $tire2Pressure=floatval($tokens[7]);
    $tire2Age=intval($tokens[8]);
    $tire3Pressure=floatval($tokens[9]);
    $tire3Age=intval($tokens[10]);
    $tire4Pressure=floatval($tokens[11]);
    $tire4Age=intval($tokens[12]);

    $engine=new Engine($engineSpeed,$enginePower);
    $cargo=new Cargo($cargoWeight,$cargoType);
    $tire1=new Tire($tire1Pressure,$tire1Age);
    $tire2=new Tire($tire2Pressure,$tire2Age);
    $tire3=new Tire($tire3Pressure,$tire3Age);
    $tire4=new Tire($tire4Pressure,$tire4Age);

    $car=new Car($model,$engine,$cargo);
    $car->addTire($tire1);
    $car->addTire($tire2);
    $car->addTire($tire3);
    $car->addTire($tire4);
    $resultCars[]=$car;
}

$command=readline();
if($command=="fragile"){
    foreach ($resultCars as $car){
        if($car->getCargoType()==='fragile'){
            if($car->hasFlatTire()){
                echo $car->getCarModel() . PHP_EOL;
            }
        }
    }
}else{
    foreach ($resultCars as $car){
        if($car->getCargoType()==='flamable'){
            if($car->getEnginePower()>250){
                echo $car->getCarModel() . PHP_EOL;
            }
        }
    }
}

?>