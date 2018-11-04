<?php

class Person
{
    /**
     * @var int
     */
    protected $age;

    /**
     * @var string
     */
    protected $name;

    /**
     * Person constructor.
     * @param string $name
     * @param int $age
     * @throws Exception
     */
    public function __construct(string $name,int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @param int $age
     * @throws Exception
     */
    protected function setAge(int $age)
    {
        if (intval($age) < 1) {
            throw new Exception('Age must be positive!');
        }
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    protected function setName(string $name):void{
        if(strlen($name)<3){
            throw new Exception("Name’s length should not be less than 3 symbols!");
        }
        $this->name=$name;
    }
}