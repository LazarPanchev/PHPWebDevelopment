<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.10.2018 г.
 * Time: 9:27
 */

class Person
{
    protected $name;

    protected $email;

    public function __construct($name, $email)
    {
        $this->name=$name;
        $this->email=$email;
    }

    public function printData(){
        echo $this->name;
    }


}