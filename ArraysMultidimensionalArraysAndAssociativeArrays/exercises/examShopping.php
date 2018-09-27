<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 27.9.2018 г.
 * Time: 15:06
 */

$input=readline();
$map=[];
while ($input!=='shopping time'){
    $tokens=explode(' ', $input);
    $product=$tokens[1];
    $quantity=intval($tokens[2]);

    if(!array_key_exists($product,$map)){
        $map[$product]=0;
    }
    $map[$product]+=$quantity;
    $input=readline();
}

$input=readline();
while ($input!=='exam time'){
    $tokens=explode(' ', $input);
    $product=$tokens[1];
    $quantity=intval($tokens[2]);

    if(!array_key_exists($product,$map)){
        echo "$product doesn't exist" . PHP_EOL;
    }elseif ($map[$product]<1){
        echo "$product out of stock" . PHP_EOL;
    }else{
        $map[$product]-=$quantity;
    }

    $input=readline();
}

foreach ($map as $key=>$value){
    if($value>0){
        echo "$key -> $value" . PHP_EOL;
    }
}

?>