<?php

class Car
{
    private $model;
    private $fuelAmount;
    private $costFor1Km;
    private $distanceTravelled;

    public function __construct(string $model, float $fuelAmount,
                                float $costFor1Km)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->costFor1Km = $costFor1Km;
        $this->distanceTravelled = 0;
    }

    public function canMove(float $amountOfKm): bool{
        $plannedTravel=round($amountOfKm*$this->costFor1Km,2);
        if($plannedTravel<=round($this->fuelAmount,2)){
            $this->distanceTravelled+=$amountOfKm;
            $this->fuelAmount-=$plannedTravel;
            return true;
        }else{
            return false;
        }
    }
    public function __toString()
    {
        $remainFuel=number_format(abs($this->fuelAmount),2,'.','');
        return "$this->model $remainFuel $this->distanceTravelled\n";
    }


}

$n = intval(readline());
$result = [];
for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', readline());
    $model = $tokens[0];
    $fuelAmount = floatval($tokens[1]);
    $fuelCostFor1Km = floatval($tokens[2]);
    $car = new Car($model, $fuelAmount, $fuelCostFor1Km);
    $result[$model] = $car;
}

$input = readline();
while ($input!=='End'){
    $tokens=explode(' ', $input);
    $model=$tokens[1];
    $amountOfKm=floatval($tokens[2]);

    $currCar=$result[$model];
    if(!$currCar->canMove($amountOfKm)){
        echo 'Insufficient fuel for the drive' . PHP_EOL;
    }

    $input=readline();
}

foreach ($result as $car){
    echo $car;
}
?>