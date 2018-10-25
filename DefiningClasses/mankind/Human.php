<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19.10.2018 г.
 * Time: 9:00
 */

class Human
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    private function setFirstName(string $firstName):void
    {
        if($firstName[0]==strtolower($firstName[0])){
            throw new Exception("Expected upper case letter!Argument: firstName");
        }elseif(strlen($firstName)<4){
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName=$firstName;
    }

    /**
     * @return string
     */
    protected function getFirstName():string{
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName):void{
        if($lastName[0]==strtolower($lastName[0])){
            throw new Exception("Expected upper case letter!Argument: lastName");
        }elseif(strlen($lastName)<3){
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName=$lastName;
    }

    /**
     * @return string
     */
    protected function getLastName():string {
        return $this->lastName;
    }
}