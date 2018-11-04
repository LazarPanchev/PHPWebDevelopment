<?php

spl_autoload_register();

$n=intval(readline());

$result = [];

for($i = 0; $i < $n; $i++) {
        $tokens = explode(' ', readline());
    $volunteer = null;
    if (count($tokens) == 4) {
        $volunteer = new Citizen($tokens[0], intval($tokens[1]), $tokens[2], $tokens[3]);
    } else {
        $volunteer = new Rebel($tokens[0], intval($tokens[1]),$tokens[2]);
    }
   if(get_class($volunteer)!= 'Robot'){
       $result[$tokens[0]] = $volunteer;
   };

}

$name = readline();
while ($name!='End'){
    if(array_key_exists($name,$result)){
        $result[$name]->BuyFood();
    }

    $name=readline();
}

$totalFood=0;
foreach ($result as $name=>$obj){
    $totalFood+=$obj->getFood();
}
echo $totalFood;
