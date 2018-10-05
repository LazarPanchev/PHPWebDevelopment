<?php

class Person{
    private $name;
    private $age;

    public function __construct(string $name,int $age)
    {
        $this->name=$name;
        $this->age=$age;
    }

    public function __toString()
    {
        return $this->name . " " . $this->age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }



}
class Family{
    private $listOfPeople;
    public function __construct()
    {
        $this->listOfPeople=[];
    }

    public function addingMembers(Person $person):void{
        array_push($this->listOfPeople,$person);
    }

    public function getOldestMember() :Person{
        usort($this->listOfPeople,function (Person $a,Person $b){
            return $b->getAge() - $a->getAge();
        });
        return $this->listOfPeople[0];
    }

}

$n=readline();
$family=null;
$family=new Family();
for($i = 0; $i < $n; $i++) {
    $tokens=array_map('trim',explode(' ',readline()));
    $name=$tokens[0];
    $age=intval($tokens[1]);
    $person=new Person($name,$age);
    $family->addingMembers($person);
}

$oldest=$family->getOldestMember();
echo $oldest;
?>