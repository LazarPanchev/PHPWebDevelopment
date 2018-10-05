<?php

class Person
{
    public $name;
    public $age;
    public $occupation;
    public function __construct($name,$age,$occupation)
    {
        $this->name=$name;
        $this->age=$age;
        $this->occupation=$occupation;
    }
}

$input = readline();
$result=[];
while ($input !== 'END') {
    $tokens = explode(' ', $input);
    $name = $tokens[0];
    $age = intval($tokens[1]);
    $occupation = $tokens[2];
    $person=new Person($name,$age,$occupation);
    $result[]=$person;

    $input = readline();
}

usort($result,function ($a,$b){
    return $a->age - $b->age;
});

foreach($result as $obj){
    echo "$obj->name - age: $obj->age, occupation: $obj->occupation\n";
}

?>