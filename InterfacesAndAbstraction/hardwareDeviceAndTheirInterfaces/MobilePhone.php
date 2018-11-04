<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 23:34 ч.
 */

class MobilePhone extends Mobile implements TouchScreen
{
    public function getSize()
    {
        return '5 inch mobilePhone' . PHP_EOL;
    }

    public function moveFinger(){
        return 'M moved finger'  . PHP_EOL;
    }

    public function clickFinger(){
        return 'M clicked finger'  . PHP_EOL;
    }


    public function writeText(){
        $this->writtenText='MPhone text';
    }
}