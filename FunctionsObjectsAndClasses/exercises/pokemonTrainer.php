<?php
class Trainer{
    private $name;
    private $numberOfBadges;
    private $collectionOfPokemon;

    public function __construct(string $name){
        $this->name=$name;
        $this->numberOfBadges=0;
        $this->collectionOfPokemon=[];
    }
    public function removePokemon(Pokemon $pokemon){
        $index = array_search($pokemon, $this->collectionOfPokemon);
        unset($this->collectionOfPokemon[$index]);
    }

    public function addPokemon(Pokemon $pokemon){
        $this->collectionOfPokemon[]=$pokemon;   //array push
    }

    public function getPokemons():array {
        return $this->collectionOfPokemon;
    }

    public function increaseBadges(): void {
        $this->numberOfBadges++;
    }

    public function getBadges():int{
        return $this->numberOfBadges;
    }

    public function __toString()
    {
        $pokemonNums=count($this->getPokemons());
        return "$this->name $this->numberOfBadges $pokemonNums\n";
    }

}

class Pokemon{
    private $name;
    private $element;
    private $health;

    public function __construct(string $name,string $element,int $health)
    {
        $this->name=$name;
        $this->element=$element;
        $this->health=$health;
    }

    public function getElement():string {
        return $this->element;
    }

    public function getHealth(): string {
        return $this->health;
    }

    public function loseHealth():void{
        $this->health-=10;
    }


}

$input=readline();
$result=[];
while ($input!=='Tournament'){
    $tokens=explode(' ', $input);
    $trainerName=$tokens[0]; //which catch the pokemon, unique
    $pokemonName=$tokens[1];
    $element=$tokens[2];
    $health=intval($tokens[3]);

    $trainer=new Trainer($trainerName);

    $pokemon=new Pokemon($pokemonName,$element,$health);

    if(!array_key_exists($trainerName,$result)){
        $result[$trainerName]=$trainer;

    }
    $result[$trainerName]->addPokemon($pokemon);

    $input=readline();
}

$secondInput=readline();
while ($secondInput!=='End'){
    $receivedElement=$secondInput;
    foreach ($result as $trainerName=>$trainerObj){
        $hasSearchedPokemon=false;
        foreach ($trainerObj->getPokemons() as $currPokemon){
            if($currPokemon->getElement()==$receivedElement){
                $hasSearchedPokemon=true;
            }
        }
        if($hasSearchedPokemon){
            $result[$trainerName]->increaseBadges();
        }else{
            $arr=$result[$trainerName]->getPokemons();
            foreach ($arr as $pokemonCurr){
                $pokemonCurr->loseHealth();
                if($pokemonCurr->getHealth()<=0){
                    $result[$trainerName]->removePokemon($pokemonCurr);
                }
            }
        }
    }
    $secondInput=readline();
}

usort($result,function (Trainer $a, Trainer $b){
    return $b->getBadges()-$a->getBadges();
});

foreach ($result as $trainer){
    echo $trainer;
}

?>