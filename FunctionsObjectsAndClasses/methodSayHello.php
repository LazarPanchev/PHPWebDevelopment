<?php


class Person{
    public $name;

    public function greeting()
    {
        echo $this->name . ' says "Hello"!';
    }
}

$name=readline();
$person=new Person();
$person->name=$name;
$person->greeting();

?>