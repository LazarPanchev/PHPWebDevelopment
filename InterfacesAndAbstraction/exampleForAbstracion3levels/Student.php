<?php

class Student extends Person
{
    public function printData(){
        echo $this->name . $this->email .PHP_EOL;
    }

}