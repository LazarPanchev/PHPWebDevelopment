<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.10.2018 г.
 * Time: 9:27
 */

class Teacher extends Person
{
    public function printData(){
        echo $this->name . " is the teacher." .PHP_EOL;
    }
}