<?php
spl_autoload_register();
class Child extends Person{

    /**
     * Child constructor.
     * @param $name
     * @param $age
     * @throws Exception
     */
    public function __construct(string $name,int $age)
    {
        parent::__construct($name,$age);
    }

    /**
     * @param int $age
     * @throws Exception
     */
    protected function setAge(int $age):void{
        if($age>15){
            throw new Exception("Child’s age must be less than 16!");
        }elseif ($age<1){
            throw new Exception("Child’s age must be positive!");
        }
        $this->age=$age;
    }

    /**
     * @param string $name
     */
}