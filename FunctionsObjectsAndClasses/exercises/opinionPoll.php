<?php
class Person{
    public $name;
    public $age;

    public function __toString()
    {
        return "$this->name - $this->age\n";
    }
}

$n=readline();
$result=[];
for($i = 0; $i < $n; $i++) {
    $tokens=explode(' ',readline());
    $person=new Person();
    $person->name=$tokens[0];
    $person->age=intval($tokens[1]);
    $result[]=$person;
}
$result=array_filter($result, function ($x){
    return $x->age>30;
});

usort($result, function ($a,$b){
    return strcmp($a->name,$b->name);
});

foreach ($result as $person){
    echo $person;
}




?>