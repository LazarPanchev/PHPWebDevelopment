<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 23.10.2018 г.
 * Time: 11:11
 */

class Topping
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $weight;

    /**
     * Topping constructor.
     * @param string $type
     * @param float $weight
     * @throws Exception
     */
    public function __construct(string $type, float $weight)
    {
        $this->setType($type);
        $this->setWeight($weight);
    }

    /**
     * @return string
     */
    private function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @throws Exception
     */
    private function setType(string $type): void
    {
        if($type!=='meat' && $type!=='veggies' && $type!=='cheese' && $type!=='sauce'){
            throw new Exception("Cannot place ",1);
        }
        $this->type = $type;
    }

//    /**
// * @return float
// */
//    private function getWeight(): float
//    {
//        return $this->weight;
//    }

    /**
     * @param float $weight
     * @throws Exception
     */
    private function setWeight(float $weight): void
    {
        if($weight<1 || $weight>50){
            throw new Exception("weight should be in the range [1..50].",2);
        }
        $this->weight = $weight;
    }

    private function getModifier():float {
        if($this->getType()=='meat'){
            return 1.2;
        }elseif ($this->getType()=='veggies'){
            return 0.8;
        }elseif ($this->getType()=='cheese'){
            return 1.1;
        }elseif ($this->getType()=='sauce'){
            return 0.9;
        }else{
            return 0;
        }
    }


    public function getCalories():float {
       return (2 * $this->weight) * $this->getModifier();
    }
}