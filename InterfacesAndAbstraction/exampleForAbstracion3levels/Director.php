<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.10.2018 г.
 * Time: 10:19
 */

class Director extends Person
{

    public function printData(){
        echo $this->name . " is the director" .PHP_EOL;
    }
}