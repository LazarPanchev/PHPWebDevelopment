<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name, float $salary, string $position, string $department,
                                ?string $email = 'n/a', ?int $age = -1)
    {
        $this->setName($name);
        $this->setSalary($salary);
        $this->setPosition($position);
        $this->setDepartment($department);
        $this->setEmail($email);
        $this->setAge($age);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department): void
    {
        $this->department = $department;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function __toString(): string
    {
        return sprintf("%s %.2f %s %d\n",$this->getName(), $this->getSalary(), $this->getEmail(), $this->getAge());
    }


}

class Department
{
    private $departmentName;
    private $employeeArr;

    public function __construct(string $departmentName)
    {
        $this->departmentName = $departmentName;
        $this->employeeArr = [];
    }

    public function addEmployee(Employee $employee)
    {
        $this->employeeArr[] = $employee;
    }

    public function getAverage() : float
    {
        $sum = 0;
        foreach ($this->employeeArr as $employee) {
            $sum += $employee->getSalary();
        }
        return $sum / count($this->employeeArr);
    }

    public function getEmployeeArr()
    {
        return $this->employeeArr;
    }

    public function getDepartmentName(){
        return $this->departmentName;
    }
}

$nLines = intval(readline());
$result = [];
for ($i = 0; $i < $nLines; $i++) {
    $tokens = explode(' ', readline());
    $name = $tokens[0];
    $salary = floatval($tokens[1]);
    $position = $tokens[2];
    $department = $tokens[3];
    if (count($tokens) == 5) {
        if (is_numeric($tokens[4])) {
            $employee = new Employee($name, $salary, $position, $department, null, $tokens[4]);
        } else {
            $employee = new Employee($name, $salary, $position, $department, $tokens[4]);
        }
    } elseif (count($tokens) == 6) {
        $email = $tokens[4];
        $age = intval($tokens[5]);
        $employee = new Employee($name, $salary, $position, $department, $email, $age);
    } else {
        $employee = new Employee($name, $salary, $position, $department);
    }

    if (!array_key_exists($department, $result)) {
        $newDepartment = new Department($department);
        $result[$department] = $newDepartment;
    }
    $result[$department]->addEmployee($employee);
}

usort($result, function (Department $a, Department $b) {
    return $b->getAverage() - $a->getAverage();
});

$highestSalaryDepartment = $result[0];
$arr=$highestSalaryDepartment->getEmployeeArr();
usort($arr,function (Employee $a,Employee $b){
    return $b->getSalary() - $a->getSalary();
});

echo "Highest Average Salary: " . $highestSalaryDepartment->getDepartmentName() . PHP_EOL;
foreach ($arr as $employeeObj){
    echo $employeeObj;
}

?>