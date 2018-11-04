<?php

spl_autoload_register();

$pizzaTokens=array_filter(explode(' ',trim(readline())));
$pizzaName=$pizzaTokens[1];
$numberToppings=$pizzaTokens[2];
if($numberToppings>10){
    echo 'Number of toppings should be in range [0..10].';
    exit;
}
try{
    $pizza= new $pizzaTokens[0]($pizzaName);
}catch (Exception $e){
    echo $e->getMessage();
    exit;
}


$doughTokens=array_filter(explode(' ',trim(readline())));
try{
    $dough = new $doughTokens[0](strtolower($doughTokens[1]),strtolower($doughTokens[2]),
        floatval($doughTokens[3]));
    $pizza->setDough($dough);
}catch (Exception $e){
    echo $e->getMessage();
    exit;
}
//$numberToppings=['Topping Meat 50','Topping Cheese 50','Topping meat 20','Topping sauce 10','Topping Meat 30','END'];
for ($i=0; $i<$numberToppings; $i++){
    $line=array_filter(explode(' ',trim(readline())));
    if($line[0]=="END"){
        break;
    }
    try{
        $topping=new $line[0](strtolower($line[1]),floatval($line[2]));
    }catch (Exception $e){
        $code=$e->getCode();
        if($code==1){
            echo $e->getMessage() . "{$line[1]} on top of your pizza.";
        }else{
            echo "{$line[1]} " . $e->getMessage();
        }
        exit;
    }

    try{
        $pizza->addTopping($topping);
    }catch (Exception $e){
        echo $e->getMessage();
        exit;
    }
}

echo $pizza;
