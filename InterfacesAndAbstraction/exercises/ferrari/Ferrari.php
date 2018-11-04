<?php

class Ferrari implements DriveFerrari
{
    private $model;
    /**
     * @var string
     */
    private $driverName;

    /**
     * @var int
     */
//    static $objNum;

    public function __construct(string $driverName)
    {
        $this->model='488-Spider';
        $this->setDriverName($driverName);
        //self::$objNum++;
    }

    public function setDriverName(string $driverName):void{
        $this->driverName=$driverName;
    }

    public static function useBrakes():string
    {
        return "Brakes!";
    }

    public  static function pushTheGasPedal():string
    {
        return "Zadus6avam sA!";
    }

//    public static function forUrl(string $str, string $rep="-") {
//        $result=str_replace(" ",$rep,$str);
//        $result=strtolower($result);
//        return $result;
//    }

    public function __toString(): string
    {
        $messageBrakes=self::useBrakes();
        $messageGas=self::pushTheGasPedal();
        //$driverName=$this->driverName;
      //  $num=self::$objNum;
        return "{$this->model}/{$messageBrakes}/{$messageGas}/{$this->driverName} ". PHP_EOL ; //;    // inst. {$num}" .PHP_EOL;
    }
}