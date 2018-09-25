<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 18:08
 */

$arr=explode(', ', readline());
$map=array();
for ($i=0; $i<count($arr);$i+=2){
    $town=$arr[$i];
    $income=intval($arr[$i+1]);

    if(!array_key_exists($town,$map)){
        $map[$town]=$income;
    }else{
        $map[$town]+=$income;
    }

}

foreach ($map as $key=>$value){
    echo $key . " => " . $value . PHP_EOL;
}


?>