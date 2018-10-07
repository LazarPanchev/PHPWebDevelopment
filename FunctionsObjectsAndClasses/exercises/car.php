<?php

class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distance;
    private $travelTimeSec;

    /**
     * Car constructor.
     * @param $speed
     * @param $fuel
     * @param $fuelEconomy
     */
    public function __construct($speed, $fuel, $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->distance = 0;
        $this->travelTimeSec = 0;
    }

    public function travel($distance): void
    {
        $fuelPerKm = $this->fuelEconomy / 100;
        $needFuelForTravel = $distance * $fuelPerKm;
        $minutesPerKm=60/$this->speed;
        if ($needFuelForTravel <= $this->fuel) {
            $this->distance += $distance;
            $this->travelTimeSec += $distance * $minutesPerKm;
            $this->fuel -= $needFuelForTravel;
        } else {
            $realTravelbyCar =$this->fuel/$fuelPerKm;
            $this->distance += $realTravelbyCar;
            $this->fuel = 0;
            $this->travelTimeSec += $realTravelbyCar * $minutesPerKm;
        }
    }

    public function refuel($liters): void
    {
        $this->fuel += $liters;
    }
    public function getTotalDistance()
    {
        $formatted=number_format(round($this->distance,1),1);
        printf("Total Distance: %.1f\n",$formatted);
    }

    public function getTotalTravelTime()
    {
        $hours = floor($this->travelTimeSec / 60);
        $minutes = floor($this->travelTimeSec % 60);
        echo "Total Time: $hours hours and $minutes minutes" . PHP_EOL;
    }

    public function getRemainingFuel()
    {
        // echo "Fuel left: " . $this->fuel . PHP_EOL;
        printf("Fuel left: %.1f liters\n", $this->fuel);
    }

}

$input = explode(' ', readline());
$speed = floatval($input[0]);
$fuel = floatval($input[1]);
$fuelEconomy = floatval($input[2]);
$car = new Car($speed, $fuel, $fuelEconomy);

$secondInput = readline();

while ($secondInput != "END") {
    $tokens = explode(' ', $secondInput);
    if (count($tokens) == 2) {
        switch ($tokens[0]) {
            case "Travel":
                $distance = floatval($tokens[1]);
                $car->travel($distance);
                break;
            case "Refuel":
                $liters = floatval($tokens[1]);
                $car->refuel($liters);
                break;
        }
    } else {
        switch ($tokens[0]) {
            case "Distance":
                $car->getTotalDistance();
                break;
            case "Time":
                $car->getTotalTravelTime();
                break;
            case "Fuel";
                $car->getRemainingFuel();
                break;
        }
    }
    $secondInput = readline();
}

?>