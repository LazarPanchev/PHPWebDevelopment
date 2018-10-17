<?php

class Employee
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
     * @var float
     */
    protected $salary;

    /**
     * @var int
     */
    private $age;

    /**
     * Employee constructor.
     * @param string $firstName
     * @param string $secondName
     * @param float $salary
     * @param int $age
     */
    public function __construct(string $firstName, string $lastName, float $salary, int $age)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        try {
            $this->setSalary($salary);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        try {
            $this->setAge($age);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param float $salary
     * @throws Exception
     */
    public function setSalary(float $salary): void
    {
        if ($salary < 0) {
            throw new Exception('Salary must be bigger than 0!');
        }
        $this->salary = $salary;
    }

    public function getSalary():float {
        return $this->salary;
    }

    /**
     * @param int $age
     * @throws Exception
     */
    public function setAge(int $age): void
    {
        if ($age < 16) {
            throw new Exception('The age must be bigger or equal to 16!');
        }
        $this->age = $age;
    }

    /**
     * @param $increasePercent
     * @throws Exception
     */
    public function increaseSalary($increasePercent): void
    {
        if ($increasePercent < 10) {
            throw new Exception('Increase must be greater than 10 percent!');
        }
        $oldSalary = $this->salary;
        $this->salary = $oldSalary + ($oldSalary * $increasePercent/100);
    }

}

$employee = new Employee('Pesho', 'Ivanov', 100, 22);
try{
    $employee->increaseSalary(20);
    echo $employee->getSalary(). PHP_EOL;
}catch (Exception $exception){
    echo $exception->getMessage() ;
}
print_r($employee);

?>