<?php

spl_autoload_register();

$persons = [];
$products = [];
//$tokensPersons=array_filter(explode(';',readline()));
$tokensPersons = preg_split("/[=;]/", readline());
for ($i = 0; $i < count($tokensPersons) - 1; $i += 2) {
    $personName = $tokensPersons[$i];
    $money = floatval($tokensPersons[$i + 1]);

    try {
        $person = new Person($personName, $money);
        $persons[$personName] = $person;
    } catch (Exception $exception) {
        echo $exception->getMessage();
        exit;
    }
}

$tokensProducts = preg_split("/[=;]/", readline(),-1,PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($tokensProducts) - 1; $i += 2) {
    $productName = $tokensProducts[$i];
    $cost = floatval($tokensProducts[$i + 1]);
    $product = new Product($productName, $cost);
    $products[$productName] = $product;

}

$line = readline();

//$result=[];
while ($line !== 'END') {
    $tokens = explode(' ', $line);
    $personName = $tokens[0];
    $productName = $tokens[1];

    try{
        if(array_key_exists($personName,$persons) && array_key_exists($productName,$products)){
            $persons[$personName]->buyProduct($products[$productName]);
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }

    $line = readline();
}


foreach ($persons as $personName => $personObj) {
    echo $personObj;
}


?>