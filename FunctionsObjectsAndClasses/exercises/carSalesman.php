<?php

class Car{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct($model,$engine,
                                $weight,$color)
    {
        $this->setModel($model);
        $this->setEngine($engine);
        $this->setWeight($weight);
        $this->setColor($color);
        //$this->existingEngine=null;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function __toString()
    {
        return "$this->model:\n $this->engine:\n";
    }

    public function printWeightColor(){
        return " Weight: $this->weight\n Color: $this->color\n";
    }

}

class Engine{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct($model, $power,
                                $displacement='n/a', $efficiency='n/a')
    {
        $this->setModel($model);
        $this->setPower($power);
        $this->setDisplacement($displacement);
        $this->setEfficiency($efficiency);
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power): void
    {
        $this->power = $power;
    }

    /**
     * @return mixed
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * @param mixed $displacement
     */
    public function setDisplacement($displacement): void
    {
        $this->displacement = $displacement;
    }

    /**
     * @return mixed
     */
    public function getEfficiency()
    {
        return $this->efficiency;
    }

    /**
     * @param mixed $efficiency
     */
    public function setEfficiency($efficiency): void
    {
        $this->efficiency = $efficiency;
    }

    public function __toString()
    {
        return "  Power: $this->power\n  Displacement: $this->displacement\n  Efficiency: $this->efficiency\n";
    }

}

$carsArr=[];
$engineArr=[];
$n=intval(readline());
for ($i=0; $i<$n; $i++){
    $tokens=explode(' ',readline());
    $model=$tokens[0];
    $power=$tokens[1];
    $engine=null;
    if(count($tokens)==4){
        $displacement =$tokens[2];
        $efficiency=$tokens[3];
        $engine=new Engine($model,$power,$displacement,$efficiency);
    }elseif (count($tokens)==3){
        if(is_numeric($tokens[2])){
            $displacement=$tokens[2];
            $engine=new Engine($model,$power,$displacement,'n/a');
        }else{
            $efficiency=$tokens[2];
            $engine=new Engine($model,$power,'n/a',$efficiency);
        }
    }else{
        $engine=new Engine($model,$power,'n/a','n/a');
    }
    $engineArr[$model]=$engine;


}
$m=intval(readline());
for ($i=0; $i<$m; $i++){
    $tokens=explode(' ',readline());
    $model=$tokens[0];
    $engine=$tokens[1];
    $car=null;
    if(count($tokens)==4){
        $weight=$tokens[2];
        $color=$tokens[3];
        $car=new Car($model,$engine,$weight,$color);
    }elseif (count($tokens)==3){
        if(is_numeric($tokens[2])){
            $weight=$tokens[2];
            $car=new Car($model,$engine,$weight,'n/a');
        }else{
            $color=$tokens[2];
            $car=new Car($model,$engine,'n/a',$color);
        }
    }else{
        $car=new Car($model,$engine,'n/a','n/a');
    }

    $carsArr[]=$car;

}

foreach ($carsArr as $car){
    $currModel=$car->getEngine();
    $currEngine=$engineArr[$currModel];
    echo $car;
    echo $currEngine;
    echo $car->printWeightColor();
}
?>