<?php

include('defineAClassVehicle.php');

class Bicycle extends Vehicle
{

    /**
     * @var bool
     */
    private $forSkirt;

    private $ridingByke;

    /**
     * Bicycle constructor.
     * @param string $color
     * @param string $brand
     * @param string $model
     * @param int $year
     */
    public function __construct(int $numberDoors, string $color,string $brand,string $model,int $year){
        parent::__construct($numberDoors,$color,$brand,$model,$year);
        $this->forSkirt=null;
        $this->ridingByke=null;
    }

    public function __toString()
    {
        $numDoors = $this->numberDoors;
        $color = $this->color;
        $brand = $this->brand;
        $model = $this->model;
        $year = $this->year;
        $isRiding=$this->ridingByke?'Yes':"No";
        $table = '<table border="2"><thead><tr><th>NumDoors</th><th>Color</th>
<th>Brand</th><th>Model</th><th>Year</th><th>IsRidingNow</th></tr></thead>';
        $table .= '<tbody><tr>
                    <td style="text-align: center">' . $numDoors . '</td>
                    <td>' . $color . '</td>
                    <td>' . $brand . '</td>
                    <td>' . $model . '</td>
                    <td>' . $year . '</td>
                    <td style="text-align: center">' . $isRiding. '</td>
               </tr></tbody></table>';

        return '<h2>Bicycle Information</h2><br>' . $table;
    }

    public function ride():void{
        $this->ridingByke=true;
    }

    public function stop():void{
        $this->ridingByke=false;
    }

    public function setDoors(int $doors):void{
        $this->numberDoors=0;
    }
}

$b1=new Bicycle(0,'pink', 'BMX','556',2008);
$b2=new Bicycle(0,'white','Broom','Art',2011);
$b1->ride();
echo $b1;
$b2->stop();
echo $b2;