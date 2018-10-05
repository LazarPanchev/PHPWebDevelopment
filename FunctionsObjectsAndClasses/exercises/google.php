<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var array
     */
    private $pokemons;

    /**
     * @var array
     */
    private $parents;

    /**
     * @var array
     */
    private $children;

    /**
     * @var Car
     */
    private $car;

    /**
     * Person constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->company = null;
        $this->car = null;
        $this->pokemons = [];
        $this->parents = [];
        $this->children = [];
    }

    public function addCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function addCar(Car $car): void
    {
        $this->car = $car;
    }

    public function addPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[] = $pokemon;
    }

    public function addParent(Parents $parent): void
    {
        $this->parents[] = $parent;
    }

    public function addChild(Children $child): void
    {
        $this->children[] = $child;
    }

    public function __toString(): string
    {
        return "$this->name\nCompany:\n$this->company" . "Car:\n$this->car" .
            "Pokemon:\n" .  implode('', $this->pokemons)  .
            "Parents:\n" .  implode('', $this->parents) .
            "Children:\n" . implode('', $this->children);
    }
}

class Company
{
    /**
     * @var string
     */
    private $companyName;
    /**
     * @var string
     */
    private $department;

    /**
     * float
     */
    private $salary;

    /**
     * Company constructor.
     * @param string $companyName
     * @param string $department
     */
    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString():string
    {
        $printSalary=number_format($this->salary,2,'.','');
        return "$this->companyName $this->department $printSalary\n";
    }

}

class Pokemon
{
    /**
     * @var string
     */
    private $pokemonName;

    /**
     * @var string
     */
    private $pokemonType;

    /**
     * Pokemon constructor.
     * @param string $pokemonName
     * @param string $pokemonType
     */
    public function __construct(string $pokemonName, string $pokemonType)
    {
        $this->pokemonName = $pokemonName;
        $this->pokemonType = $pokemonType;
    }

    public function __toString():string
    {
        return "$this->pokemonName $this->pokemonType\n";
    }


}

class Parents
{
    /**
     * @var string
     */
    private $parentName;
    /**
     * @var string
     */
    private $parentBirthday;

    /**
     * Parents constructor.
     * @param string $parentName
     * @param string $parentBirthday
     */
    public function __construct(string $parentName, string $parentBirthday)
    {
        $this->parentName = $parentName;
        $this->parentBirthday = $parentBirthday;
    }

    public function __toString():string
    {
        return "$this->parentName $this->parentBirthday\n";
    }


}

class Children
{
    /**
     * @var string
     */
    private $childName;
    /**
     * @var string
     */
    private $childBirthday;

    /**
     * Children constructor.
     * @param string $childName
     * @param string $childBirthday
     */
    public function __construct(string $childName, string $childBirthday)
    {
        $this->childName = $childName;
        $this->childBirthday = $childBirthday;
    }

    public function __toString():string
    {
        return "$this->childName $this->childBirthday\n";
    }

}

class Car
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var int
     */
    private $speed;

    /**
     * Car constructor.
     * @param string $model
     * @param int $speed
     */
    public function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    public function __toString():string
    {
        return "$this->model $this->speed\n";
    }

}

$input = readline();
$result = [];
while ($input !== 'End') {
    $tokens = explode(' ', $input);
    $name = $tokens[0];
    $person = new Person($name);
    switch ($tokens[1]) {
        case "company":
            $companyName = $tokens[2];
            $department = $tokens[3];
            $salary = floatval($tokens[4]);
            $company = new Company($companyName, $department, $salary);
            if (!array_key_exists($name, $result)) {
                $result[$name] = $person;
            }
            $result[$name]->addCompany($company);
            break;
        case "pokemon":
            $pokemonName = $tokens[2];
            $pokemonType = $tokens[3];
            $pokemon = new Pokemon($pokemonName, $pokemonType);
            if (!array_key_exists($name, $result)) {
                $result[$name] = $person;
            }
            $result[$name]->addPokemon($pokemon);
            break;
        case "parents":
            $parentName = $tokens[2];
            $parentBirthday = $tokens[3];
            $parent = new Parents($parentName, $parentBirthday);
            if (!array_key_exists($name, $result)) {
                $result[$name] = $person;
            }
            $result[$name]->addParent($parent);
            break;
        case "children":
            $childName = $tokens[2];
            $childBirthday = $tokens[3];
            $child = new Children($childName, $childBirthday);
            if (!array_key_exists($name, $result)) {
                $result[$name] = $person;
            }
            $result[$name]->addChild($child);
            break;
        case "car":
            $carModel = $tokens[2];
            $carSpeed = $tokens[3];
            $car = new Car($carModel, $carSpeed);
            if (!array_key_exists($name, $result)) {
                $result[$name] = $person;
            }
            $result[$name]->addCar($car);
            break;
    }

    $input = readline();
}

$nameForPrint = readline();
echo $result[$nameForPrint];
?>