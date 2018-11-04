<?php

class Tablet extends Mobile implements TouchScreen
{

    public function getSize()
    {
        return '10 inch Tablet' . PHP_EOL;
    }

    public function moveFinger(){
        return 'T moved finger'  . PHP_EOL;
    }

    public function clickFinger(){
        return 'T clicked finger'  . PHP_EOL;
    }


    public function writeText(){
        $this->writtenText='T text';
    }
}