<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 17:16
 */

$arr=explode(' ',readline());
$occurrences=array();

for ($i=0;$i<count($arr);$i++){
    if(!array_key_exists($arr[$i],$occurrences)){
        $occurrences[$arr[$i]]=0;
    }
    $occurrences[$arr[$i]]++;
}

ksort($occurrences);
foreach ($occurrences as $key=>$value){
    echo $key . " -> " . $value . PHP_EOL;
}


?>