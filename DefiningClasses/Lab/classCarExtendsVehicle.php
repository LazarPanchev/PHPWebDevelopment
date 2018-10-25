<?php
include('defineAClassVehicle.php');

class Car extends Vehicle{
    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $model;

    /**
     * @var int
     */
    private $year;

    /**
     * Car constructor.
     * @param int $numberDoors
     * @param string $color
     * @param string $brand
     * @param string $model
     * @param int $year
     */
    public function __construct(int $numberDoors, string $color,string $brand,string $model,int $year){
        parent::__construct($numberDoors,$color);
        $this->brand=$brand;
        $this->model=$model;
        $this->year=$year;
    }
}

$car=new Car(4,'red','Audi','A4',2016);
print_r($car);


?>