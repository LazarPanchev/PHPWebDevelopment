<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19.10.2018 г.
 * Time: 9:00
 */

class Worker extends Human
{
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * int
     */
    private $weekHoursPerDay;

    /**
     * Worker constructor.
     * @param string $firstName
     * @param string $lastName
     * @param float $weekSalary
     * @param int $weekHoursPerDay
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, float $weekSalary, int $weekHoursPerDay){
        parent::__construct($firstName,$lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWeekHoursPerDay($weekHoursPerDay);
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary):void{
        if($weekSalary<=10){
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary=$weekSalary;
    }

    /**
     * @param int $weekHoursPerDay
     * @throws Exception
     */
    private function setWeekHoursPerDay(int $weekHoursPerDay):void{
        if($weekHoursPerDay<1 || $weekHoursPerDay>12){
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->weekHoursPerDay=$weekHoursPerDay;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName):void{
        if(strlen($lastName)<=3){
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }

    private function getSalary():float{
        return $this->weekSalary;
    }

    private function getWorkingHours():int{
        return $this->weekHoursPerDay;
    }

    private function salaryPerHour():float{
        return number_format($this->getSalary()/($this->getWorkingHours()*7),2,'.','');
    }

    public function __toString()
    {
        $hoursPerDay=number_format($this->getWorkingHours(),2,'.','');
        $workerSalary=number_format($this->getSalary(),2,'.','');
        $result="First Name: {$this->getFirstName()}\n";
        $result.="Last Name: {$this->getLastName()}\n";
        $result.="Week Salary: {$workerSalary}\n";
        $result.="Hours per day: {$hoursPerDay}\n";
        $result.="Salary per hour: {$this->salaryPerHour()}";
        return $result;
    }

}