<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 18:33
 */
$arr=explode(', ', readline());

$map=array();
for($i=0; $i<count($arr); $i++){
    $element=$arr[$i];
    if(!array_key_exists($element,$map)){
        $map[$element]=0;
    }
    $map[$element]++;
}

foreach ($map as $key=>$value){
    if($value===1){
        echo $key . " ";
    }
}

?>