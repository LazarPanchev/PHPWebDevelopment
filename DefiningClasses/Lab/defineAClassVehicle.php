<?php
class Vehicle{
    /**
     * @var int
     */
    private $numberDoors;

    /**
     * @var string
     */
    private $color;

    /**
     * Vehicle constructor.
     * @param int $numberDoors
     * @param string $color
     */
    public function __construct(int $numberDoors, string $color)
    {
        $this->setDoors($numberDoors);
        $this->setColor($color);
    }

    /**
     * @param int $numberDoors
     */
    public function setDoors(int $numberDoors):void{
        $this->numberDoors=$numberDoors;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color):void{
        $this->color=$color;
    }

    /**
     * @return int
     */
    public function getDoors():int{
        return $this->numberDoors;
    }

    /**
     * @return string
     */
    public function getColor():string {
        return $this->color;
    }

    /**
     * @param $name
     * @return string
     */
    public function __get($name)
    {
       return "property doesn't exist";
    }

    /**
     * @param $color
     */
    public function paint($color):void{
        $this->setColor($color);
    }
}


//$myVehicle=new Vehicle(4,'gray');
//echo $myVehicle->getDoors() . PHP_EOL;
//echo $myVehicle->getColor() . PHP_EOL;
//$myVehicle->paint('blue');
//echo $myVehicle->getColor() . PHP_EOL;
//
//echo $myVehicle->roof;



?>