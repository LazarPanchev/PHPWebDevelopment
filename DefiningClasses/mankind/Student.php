<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19.10.2018 г.
 * Time: 9:00
 */

class Student extends Human
{
    /**
     * @var string
     */
    private $facultyNumber;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $lastName
     * @param $facultyNumber
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    private function setFacultyNumber(string $facultyNumber):void{
        if(strlen($facultyNumber)<5 || strlen($facultyNumber)>10){
            throw new Exception('Invalid faculty number!');
        }
        $this->facultyNumber=$facultyNumber;
    }

    private function getFacultyNumber():string {
        return $this->facultyNumber;
    }

    public function __toString()
    {
        $result="First Name: {$this->getFirstName()}\n";
        $result.="Last Name: {$this->getLastName()}\n";
        $result.="Faculty number: {$this->getFacultyNumber()}\n" .PHP_EOL;
        return $result;
    }

}