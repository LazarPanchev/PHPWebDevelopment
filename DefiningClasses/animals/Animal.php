<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 17:08 ч.
 */

abstract class Animal
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $gender;

    /**
     * Animal constructor.
     * @param string $name
     * @param int $age
     * @param string $gender
     * @throws Exception
     */
    public function __construct(string $name, int $age, string $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
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
     * @throws Exception
     */
    private function setName(string $name): void
    {
        if(($name==null || $name=='')) {                                       //possible mistake
            throw new Exception('Invalid input!');
        }
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
     * @throws Exception
     */
    private function setAge(int $age): void
    {
        if(($age<0) ||  $age==null || $age=='')  {
            throw new Exception('Invalid input!');
        }elseif (!is_numeric($age)){
            throw new Exception('Invalid input!');
        }
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @throws Exception
     */
    private function setGender(string $gender): void
    {
        if($gender=='' || $age=null) {
            throw new Exception('Invalid input!');
        }
        $this->gender = $gender;
    }

    public abstract function produceSound();

    public abstract function __toString();

}