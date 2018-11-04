<?php


class Dough
{
    /**
     * @var float
     */
    private
        $weight;

    /**
     * @var string
     */
    private
        $floorType;

    /**
     * @var string
     */
    private
        $bakingTechnique;

    /**
     * Dough constructor.
     * @param string $floorType
     * @param string $bakingTechnique
     * @param float $weight
     * @throws Exception
     */
    public function __construct(string $floorType, string $bakingTechnique, float $weight)
    {
        $this->setFloorType($floorType);
        $this->setBakingTechnique($bakingTechnique);
        $this->setWeight($weight);
    }


    /**
     * @param string $floorType
     * @throws Exception
     */
    private function setFloorType(string $floorType): void
    {
        if($floorType!='white' && $floorType!='wholegrain'){
            throw new Exception('Invalid type of dough.');
        }
        $this->floorType = $floorType;

    }

    /**
     * @param string $bakingTechnique
     */

    private function setBakingTechnique(string $bakingTechnique): void
    {
        $this->bakingTechnique = $bakingTechnique;
    }

    /**
     * @param float $weight
     * @throws Exception
     */
    private function setWeight(float $weight): void
    {
        if($weight<1 || $weight>200){
            throw new Exception('Dough weight should be in the range[1..200].');
        }
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    protected function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    protected function getFloorType(): string
    {
        return $this->floorType;
    }

    /**
     * @return string
     */
    protected function getBakingTechnique(): string
    {
        return $this->bakingTechnique;
    }

    private function typeModifier():float {
        if($this->getFloorType()=='white'){
            return 1.5;
        }elseif ($this->getFloorType()=='wholegrain'){
            return 1.0;
        }else{
            return 0;
        }
    }

    private function techniqueModifier():float {
        if($this->getBakingTechnique()=='crispy'){
            return 0.9;
        }elseif ($this->getBakingTechnique()=='chewy'){
            return 1.1;
        }elseif ($this->getBakingTechnique()=='homemade'){
            return 1.0;
        }else{
            return 0;
        }
    }

    public function caloriesPerGram(){
        return (2 * $this->getWeight()) * $this->typeModifier() * $this->techniqueModifier();
    }
}