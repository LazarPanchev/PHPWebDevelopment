<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 23.10.2018 г.
 * Time: 11:26
 */

class Pizza
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Topping[]
     */
    private $toppings;

    /**
     * @var Dough
     */
    private $dough;

    /**
     * Pizza constructor.
     * @param string $name
     * @throws Exception
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->toppings = [];
        $this->dough = null;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    private function setName(string $name): void
    {
        if ($name == '' || strlen($name) > 15) {
            throw new Exception("Pizza name should be between 1 and 15 symbols.");
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function numberOfTopics(): int
    {
        return count($this->getToppings());
    }

    private function totalCalories()
    {
        $totalCalories = 0;
        foreach ($this->getToppings() as $key => $currTopping) {
            $totalCalories += $currTopping->getCalories();
        }
        $doughCalories=$this->dough->caloriesPerGram();
        return $doughCalories+$totalCalories;
    }

    /**
     * @return Topping[]
     */
    private function getToppings(): array
    {
        return $this->toppings;
    }

    /**
     * @param Topping $topping
     * @throws Exception
     */
    public function addTopping(Topping $topping)
    {
        if (count($this->getToppings()) == 10) {
            throw new Exception('Number of toppings should be in range [0..10].');
        }
        $this->toppings[] = $topping;
    }

    public function setDough(Dough $dough)
    {
        $this->dough = $dough;
    }

    public function __toString()
    {
        $totalCalories=number_format($this->totalCalories(),2,'.','');
        return "{$this->name} - {$totalCalories} Calories.";
    }

}